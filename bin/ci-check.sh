#!/usr/bin/env bash
set -e

###############################################################################
# CI Check Script
# Runs the complete CI pipeline: code style, tests, and static analysis
# Usage:
#   ./bin/ci-check.sh              # Run with current PHP version
#   ./bin/ci-check.sh --all-php    # Run with all available PHP versions
#   ./bin/ci-check.sh 8.1 8.2 8.3  # Run with specific PHP versions
###############################################################################

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Track overall status
OVERALL_STATUS=0

# Function to print section headers
print_header() {
    echo ""
    echo -e "${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo -e "${BLUE}  $1${NC}"
    echo -e "${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo ""
}

# Function to run a check and track status
run_check() {
    local name="$1"
    local command="$2"

    echo -e "${YELLOW}▶ Running: $name${NC}"
    if eval "$command"; then
        echo -e "${GREEN}✅ $name: PASSED${NC}"
        return 0
    else
        echo -e "${RED}❌ $name: FAILED${NC}"
        OVERALL_STATUS=1
        return 1
    fi
}

# Function to run full CI pipeline
run_ci_pipeline() {
    local php_version="$1"
    local php_binary="${2:-php}"

    print_header "Running CI Pipeline with $php_version"

    echo "PHP Version:"
    $php_binary --version | head -1
    echo ""

    # 1. Code Style Check
    run_check "Code Style (phpcs)" "$php_binary vendor/bin/phpcs --colors -p"

    # 2. PHPUnit Tests
    run_check "PHPUnit Tests" "$php_binary vendor/bin/phpunit --colors=always"

    # 3. PHPStan Static Analysis
    run_check "PHPStan Analysis" "$php_binary vendor/bin/phpstan analyze --no-progress"

    echo ""
    if [ $OVERALL_STATUS -eq 0 ]; then
        echo -e "${GREEN}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
        echo -e "${GREEN}  ✅ All checks PASSED for $php_version${NC}"
        echo -e "${GREEN}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    else
        echo -e "${RED}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
        echo -e "${RED}  ❌ Some checks FAILED for $php_version${NC}"
        echo -e "${RED}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    fi
}

# Function to find available PHP versions
find_php_versions() {
    local versions=()

    # Check for common PHP version binaries
    for version in 8.1 8.2 8.3 8.4; do
        if command -v "php$version" &> /dev/null; then
            versions+=("$version")
        fi
    done

    # If no specific versions found, check if default php meets minimum requirement
    if [ ${#versions[@]} -eq 0 ] && command -v php &> /dev/null; then
        local php_ver=$(php -r 'echo PHP_VERSION;' | cut -d. -f1,2)
        if (( $(echo "$php_ver >= 8.1" | bc -l) )); then
            versions+=("$php_ver")
        fi
    fi

    echo "${versions[@]}"
}

# Main script logic
main() {
    cd "$(dirname "$0")/.." || exit 1

    # Ensure PostgreSQL is running for tests
    if ! pgrep -x postgres > /dev/null; then
        echo -e "${YELLOW}Starting PostgreSQL...${NC}"
        service postgresql start 2>&1 | grep -E "(done|already)"
    fi

    # Parse arguments
    if [ "$1" = "--all-php" ]; then
        # Run with all available PHP versions
        available_versions=($(find_php_versions))

        if [ ${#available_versions[@]} -eq 0 ]; then
            echo -e "${RED}No PHP 8.1+ versions found${NC}"
            exit 1
        fi

        echo -e "${BLUE}Found PHP versions: ${available_versions[*]}${NC}"

        for version in "${available_versions[@]}"; do
            if command -v "php$version" &> /dev/null; then
                run_ci_pipeline "PHP $version" "php$version"
            else
                run_ci_pipeline "PHP $version" "php"
            fi
            echo ""
        done
    elif [ $# -gt 0 ]; then
        # Run with specific PHP versions
        for version in "$@"; do
            if command -v "php$version" &> /dev/null; then
                run_ci_pipeline "PHP $version" "php$version"
            else
                echo -e "${RED}PHP $version not found${NC}"
                OVERALL_STATUS=1
            fi
            echo ""
        done
    else
        # Run with current PHP version
        local current_version=$(php -r 'echo PHP_VERSION;' | cut -d. -f1,2)
        run_ci_pipeline "PHP $current_version (current)" "php"
    fi

    # Final summary
    echo ""
    if [ $OVERALL_STATUS -eq 0 ]; then
        echo -e "${GREEN}╔════════════════════════════════════════════════════════════╗${NC}"
        echo -e "${GREEN}║                  🎉 ALL CHECKS PASSED 🎉                   ║${NC}"
        echo -e "${GREEN}╚════════════════════════════════════════════════════════════╝${NC}"
    else
        echo -e "${RED}╔════════════════════════════════════════════════════════════╗${NC}"
        echo -e "${RED}║                  ❌ SOME CHECKS FAILED ❌                   ║${NC}"
        echo -e "${RED}╚════════════════════════════════════════════════════════════╝${NC}"
    fi

    exit $OVERALL_STATUS
}

main "$@"
