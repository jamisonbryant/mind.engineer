<?php
declare(strict_types=1);

use Migrations\BaseSeed;

/**
 * Pages seed.
 *
 * Seeds the initial pages: home, about, manifesto.
 */
class PagesSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * @return void
     */
    public function run(): void
    {
        $now = date('Y-m-d H:i:s');

        $data = [
            [
                'slug' => 'home',
                'title' => 'Systems Architecture, Built from Human Thought',
                'subtitle' => 'Human-designed systems, shaped by experience and engineering judgment — not auto-generated slop.',
                'content' => $this->getHomeContent(),
                'is_published' => true,
                'created' => $now,
                'modified' => $now,
            ],
            [
                'slug' => 'about',
                'title' => 'About The Mind Engineer',
                'subtitle' => null,
                'content' => $this->getAboutContent(),
                'is_published' => true,
                'created' => $now,
                'modified' => $now,
            ],
            [
                'slug' => 'manifesto',
                'title' => 'The Coming Senior Engineering Shortage',
                'subtitle' => 'Why the pipeline is broken and what it means for the industry',
                'content' => $this->getManifestoContent(),
                'is_published' => true,
                'created' => $now,
                'modified' => $now,
            ],
        ];

        $table = $this->table('pages');
        $table->insert($data)->save();
    }

    private function getHomeContent(): string
    {
        return <<<'MARKDOWN'
The Mind Engineer is a home for serious engineering thinking. Not hype, not productivity hacks, and definitely not another AI-generated content mill. Just clear, battle-tested perspectives on how to design, evolve, and operate systems that don't fall over the moment reality shows up.

## What This Is

This isn't a guru brand. It's not a hustle. It's a place for architecture, senior-level thinking, and real-world experience.

The focus here is on the craft of building systems — the judgment calls, the trade-offs, the patterns that actually work when you're operating at scale with real constraints and real consequences.

## Why This Matters

- Juniors aren't getting hired. The entry-level pipeline is collapsing.
- Without juniors becoming mids becoming seniors, the senior engineering shortage will only get worse.
- AI-generated architecture without human judgment is a recipe for brittle, unmaintainable systems.
- The industry needs engineers who can think, not just prompt.
MARKDOWN;
    }

    private function getAboutContent(): string
    {
        return <<<'MARKDOWN'
## The Person Behind the Brand

The Mind Engineer is the work of a VP of Platform Engineering with years of experience building and scaling systems across multiple industries.

## Philosophy

- **Measure twice, architect once.** Planning and design matter.
- **Senior judgment over hype.** Experience and craft trump trends.
- **Engineering, not generation.** Human thought creates lasting systems.

## What This Is

This is a side project and writing outlet. A place to share perspectives on systems architecture, engineering leadership, and the craft of building software that actually works.

It's not a cult. It's not a course funnel. Just thoughtful writing when there's something worth saying.
MARKDOWN;
    }

    private function getManifestoContent(): string
    {
        return <<<'MARKDOWN'
## The Pipeline Problem

The engineering pipeline is broken. Companies stopped hiring juniors. Bootcamps churned out candidates with no paths forward. The result: a generation of would-be engineers who never got the chance to grow into seniors.

Without juniors becoming mids, and mids becoming seniors, where do the next generation of technical leaders come from?

## AI as a Crutch, Not a Mentor

AI tools can generate code. They cannot generate judgment. They cannot understand why a system was designed a certain way, or what will happen when requirements change, or how to balance competing concerns.

When juniors use AI to skip the learning, they miss the struggle that builds understanding. When companies use AI to replace seniors, they lose the judgment that prevents disasters.

## Why Senior Judgment Won't Go Out of Style

Systems don't fail in predictable ways. They fail in ways that require someone who has seen failures before. Someone who understands not just what the code does, but why it was written that way.

That judgment comes from experience. From debugging production incidents at 3 AM. From making architectural decisions that aged well — and some that didn't. From working with real systems under real constraints.

## What Companies Are Going to Miss

When the senior shortage hits, companies will discover that not everything can be generated. Architecture requires thought. Operations require judgment. Leadership requires experience.

The companies that invested in growing engineers will have them. The rest will be scrambling.

## The Case for Engineering Craft

Software engineering is a craft. Like any craft, it requires practice, mentorship, and time. There are no shortcuts to experience.

The best engineers aren't the ones who can prompt the fastest. They're the ones who understand systems deeply enough to know what questions to ask.

That's what The Mind Engineer is about: the craft of engineering, the value of experience, and the irreplaceable role of human judgment in building systems that work.
MARKDOWN;
    }
}
