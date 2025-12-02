# The Mind Engineer - MVP Site

A content-first, CMS-powered site built on CakePHP 5.2 for The Mind Engineer brand.

## Project Overview

**Philosophy**: Systems Architecture, Built from Human Thought

**Stack**:
- CakePHP 5.2
- PHP 8.1+
- PostgreSQL (MySQL also supported)
- Server-rendered templates (no heavy JS frameworks)
- Minimal, engineering-flavored design

**Non-Goals**: This is NOT a course platform, NOT a sales funnel, NOT a WordPress clone. Simple, maintainable, KISS principles throughout.

---

## What's Been Built

### ✅ Core Foundation (Complete)

1. **Database Schema** - 4 tables:
   - `users` - Admin authentication
   - `pages` - CMS pages (home, manifesto, about)
   - `articles` - Blog/essay posts
   - `email_subscriptions` - Email capture

2. **Authentication & Authorization**
   - CakePHP Authentication & Authorization plugins configured
   - Password hashing in User entity
   - Admin user seeded: `admin@mindengineer.com` / `admin123`

3. **Initial Content**
   - Home page with brand messaging
   - Manifesto: "The Coming Senior Engineering Shortage"
   - About page
   - All seeded with placeholder content matching brand voice

4. **Models**
   - All Table classes and Entities generated
   - Validation rules on Users
   - Password hashing on save
   - Timestamp behavior enabled

5. **Routes**
   - `/` - Home page
   - `/manifesto` - Manifesto page
   - `/about` - About page
   - `/articles` - Articles listing
   - `/articles/{slug}` - Article detail
   - `/admin/*` - Admin area routes

6. **Controllers**
   - `PagesController` - Displays CMS pages from database
   - `ArticlesController` - Public articles (generated)
   - `AppController` - Authentication/Authorization configured

---

## What Needs to Be Built

### 🚧 Remaining MVP Features

1. **Public Controllers & Views**
   - [ ] Customize `ArticlesController` for public access (index, view)
   - [ ] Create `EmailSubscriptionsController` for subscription form
   - [ ] Build view templates for Pages (display.php)
   - [ ] Build view templates for Articles (index.php, view.php)

2. **Admin Area**
   - [ ] `Admin/UsersController` - Login/logout
   - [ ] `Admin/PagesController` - CRUD for pages
   - [ ] `Admin/ArticlesController` - CRUD for articles
   - [ ] `Admin/EmailSubscriptionsController` - View subscriptions
   - [ ] `Admin/DashboardController` - Admin home
   - [ ] Admin layout template
   - [ ] Admin views for all CRUD operations

3. **WYSIWYG Editor Integration**
   - [ ] Add TinyMCE via CDN to admin forms
   - [ ] Configure for Pages.content and Articles.content

4. **Styling**
   - [ ] Create minimal CSS with brand colors:
     - Primary: deep navy / charcoal
     - Accent: brass / burnt orange
     - Background: off-white / cream
   - [ ] Typography: Clean sans-serif for body, optional serif for headlines
   - [ ] Responsive layout (single-column or simple two-column)
   - [ ] Custom 404 page

5. **Email Subscription**
   - [ ] Public form on homepage
   - [ ] Controller logic to save subscriptions
   - [ ] Flash message on success

6. **Testing & Polish**
   - [ ] Test authentication flow
   - [ ] Test public pages rendering
   - [ ] Test admin CRUD operations
   - [ ] Verify all seeded content displays correctly

---

## Setup Instructions

### Prerequisites

- PHP 8.1 or higher
- PostgreSQL 16 (or MySQL 8.0+)
- Composer

### Installation

1. **Clone the repository**
   ```bash
   cd /path/to/project
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Configure environment**

   The `.env` file is already configured for PostgreSQL. Update if needed:
   ```bash
   vim config/.env
   ```

   Key settings:
   - `DATABASE_URL` - Database connection string
   - `SECURITY_SALT` - Generate a new one for production
   - `APP_FULL_BASE_URL` - Your domain in production

4. **Set up the database**

   If PostgreSQL is not running:
   ```bash
   service postgresql start
   ```

   Create the database (if not already created):
   ```bash
   psql -U postgres -c "CREATE DATABASE mind_engineer;"
   ```

   Run migrations:
   ```bash
   bin/cake migrations migrate
   ```

   Seed initial data:
   ```bash
   bin/cake migrations seed --seed InitialDataSeed
   ```

5. **Start the development server**
   ```bash
   bin/cake server
   ```

   Visit: http://localhost:8765

6. **Admin access**
   - URL: http://localhost:8765/admin/login
   - Email: `admin@mindengineer.com`
   - Password: `admin123`

   **IMPORTANT**: Change this password in production!

---

## Development Workflow

### Database Migrations

Create a new migration:
```bash
bin/cake bake migration DescriptiveName field1:type field2:type
```

Run migrations:
```bash
bin/cake migrations migrate
```

Rollback:
```bash
bin/cake migrations rollback
```

### Bake (Code Generation)

Generate a controller:
```bash
bin/cake bake controller ControllerName
```

Generate a model:
```bash
bin/cake bake model ModelName
```

Generate templates:
```bash
bin/cake bake template ControllerName
```

### Code Style

Check code style:
```bash
composer cs-check
```

Fix code style:
```bash
composer cs-fix
```

### Running CI Checks

Run the complete CI pipeline (code style, tests, static analysis):

```bash
# Run with current PHP version
./bin/ci-check.sh

# Run with all available PHP versions (8.1+)
./bin/ci-check.sh --all-php

# Run with specific PHP versions
./bin/ci-check.sh 8.1 8.2 8.3
```

Individual checks:
```bash
# Code style only
composer cs-check

# Tests only
vendor/bin/phpunit

# Static analysis only
vendor/bin/phpstan analyze
```

---

## Project Structure

```
mind.engineer/
├── config/
│   ├── .env                  # Environment configuration
│   ├── app.php               # Main app config
│   ├── routes.php            # Routes configuration
│   ├── Migrations/           # Database migrations
│   └── Seeds/                # Database seeders
├── src/
│   ├── Controller/           # Controllers
│   │   ├── AppController.php
│   │   ├── PagesController.php
│   │   └── ArticlesController.php
│   ├── Model/
│   │   ├── Entity/           # Entities
│   │   └── Table/            # Table classes
│   └── Application.php       # App bootstrap with auth
├── templates/                # View templates
│   ├── layout/               # Layouts
│   ├── Pages/                # Pages views
│   └── Articles/             # Articles views
├── webroot/                  # Public assets (CSS, JS, images)
└── vendor/                   # Composer dependencies
```

---

## Next Steps

### Immediate Priorities

1. **Build Admin Authentication**
   - Create `Admin/UsersController` with login/logout
   - Create login form view
   - Test authentication flow

2. **Build Public Templates**
   - Create `templates/Pages/display.php`
   - Create `templates/Articles/index.php`
   - Create `templates/Articles/view.php`

3. **Add Basic Styling**
   - Create `webroot/css/site.css`
   - Apply brand colors and typography
   - Make responsive

4. **Build Admin CRUD**
   - Use bake to generate admin controllers
   - Customize for authentication requirements
   - Add TinyMCE to content fields

### Future Enhancements (Post-MVP)

- Article categories/tags
- Search functionality
- RSS feed for articles
- Email confirmation for subscriptions
- Email sending integration (for newsletters)
- Analytics integration
- Performance optimization (caching, CDN)
- Security hardening for production

---

## Troubleshooting

### PostgreSQL Connection Issues

If migrations fail with connection errors:

1. Ensure PostgreSQL is running:
   ```bash
   service postgresql status
   ```

2. Check authentication in `/etc/postgresql/16/main/pg_hba.conf`

   For development, you may need `trust` authentication:
   ```
   local   all             all                                     trust
   ```

3. Reload PostgreSQL:
   ```bash
   service postgresql reload
   ```

### Permission Issues

If you encounter permission errors:
```bash
chmod -R 775 tmp logs
chown -R www-data:www-data tmp logs
```

---

## Production Deployment

Before deploying to production:

1. **Security**
   - [ ] Generate new `SECURITY_SALT`
   - [ ] Change admin password
   - [ ] Set `DEBUG=false` in `.env`
   - [ ] Set proper `APP_FULL_BASE_URL`
   - [ ] Review PostgreSQL authentication (use password, not trust)
   - [ ] Enable HTTPS
   - [ ] Review CSRF and Form Protection settings

2. **Performance**
   - [ ] Enable caching in `config/app.php`
   - [ ] Set up database connection pooling
   - [ ] Configure CDN for static assets
   - [ ] Enable gzip compression

3. **Monitoring**
   - [ ] Set up error logging
   - [ ] Configure email alerts for errors
   - [ ] Add analytics

---

## License

MIT License

---

## Credits

Built with:
- [CakePHP 5.2](https://cakephp.org)
- [CakePHP Authentication Plugin](https://book.cakephp.org/authentication/3/en/)
- [CakePHP Authorization Plugin](https://book.cakephp.org/authorization/3/en/)
