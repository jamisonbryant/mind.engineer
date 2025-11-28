<?php
declare(strict_types=1);

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\I18n\DateTime;
use Migrations\BaseSeed;

/**
 * InitialData seed.
 */
class InitialDataSeed extends BaseSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/migrations/4/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $now = DateTime::now();

        // Seed admin user
        $hasher = new DefaultPasswordHasher();
        $usersData = [
            [
                'email' => 'admin@mindengineer.com',
                'password' => $hasher->hash('admin123'),
                'created' => $now,
                'modified' => $now,
            ],
        ];

        $usersTable = $this->table('users');
        $usersTable->insert($usersData)->save();

        // Seed core pages
        $pagesData = [
            [
                'slug' => 'home',
                'title' => 'The Mind Engineer',
                'subtitle' => 'Systems Architecture, Built from Human Thought',
                'content' => '<div class="hero">
<h1>Systems Architecture, Built from Human Thought</h1>
<p class="subtitle">Human-designed systems, shaped by experience and engineering judgment — not auto-generated slop.</p>
</div>

<section class="intro">
<p>The Mind Engineer is a home for serious engineering thinking. Not hype, not productivity hacks, and definitely not another AI-generated content mill. Just clear, battle-tested perspectives on how to design, evolve, and operate systems that don\'t fall over the moment reality shows up.</p>
</section>

<section class="what-this-is">
<h2>What This Is</h2>
<p>This isn\'t a guru brand. This isn\'t a hustle. This is a space for thinking deeply about systems architecture, senior-level engineering judgment, and the craft of building software that lasts.</p>
<p>The focus here is on <strong>human-designed systems</strong> — systems that emerge from experience, thoughtful design, and understanding the trade-offs that matter in real-world contexts.</p>
<p>Every piece of content here is <strong>engineered, not generated</strong>. No shortcuts, no AI-written filler. Just honest, technical writing from someone who\'s been in the trenches.</p>
</section>

<section class="why-this-matters">
<h2>Why This Matters</h2>
<ul>
<li><strong>Juniors aren\'t getting hired.</strong> The traditional path from junior to senior engineer is collapsing. Companies expect instant productivity, leaving no room for growth.</li>
<li><strong>The senior pipeline is breaking.</strong> Without juniors becoming mid-level engineers, and mid-level engineers becoming seniors, we\'re headed toward a shortage of experienced architects who can make sound technical decisions.</li>
<li><strong>AI can\'t replace judgment.</strong> Tools can generate code, but they can\'t architect systems. They can\'t weigh trade-offs, anticipate failure modes, or design for the long term. Senior engineering judgment isn\'t going out of style — it\'s becoming more valuable.</li>
</ul>
</section>

<section class="email-signup">
<h2>Stay in the Loop</h2>
<p>Get occasional essays and resources on real systems architecture and senior-level engineering judgment. No spam, no drip funnel, just thoughtful writing when there\'s something worth saying.</p>
<!-- Email form will be added here -->
</section>',
                'is_published' => true,
                'created' => $now,
                'modified' => $now,
            ],
            [
                'slug' => 'manifesto',
                'title' => 'The Coming Senior Engineering Shortage',
                'subtitle' => 'Why the collapse of the junior-to-senior pipeline threatens the future of software',
                'content' => '<article class="manifesto">
<section>
<h2>The Pipeline Problem</h2>
<p>For decades, the software industry operated on a simple pipeline: juniors got hired, learned on the job, became mid-level engineers, and eventually grew into senior roles. Companies invested in training. Seniors mentored juniors. The system worked.</p>
<p>That pipeline is breaking.</p>
<p>Today, juniors struggle to get hired. Companies want instant productivity. They want engineers who can ship code on day one, without ramp-up time, without mentorship overhead, without the "cost" of training.</p>
<p>The result? Fewer juniors in the pipeline. And fewer juniors today means fewer senior engineers tomorrow.</p>
</section>

<section>
<h2>AI as a Crutch, Not a Mentor</h2>
<p>Enter AI coding tools. The promise is seductive: why hire juniors when AI can write the code? Why invest in training when a language model can generate a pull request in seconds?</p>
<p>But here\'s the problem: AI doesn\'t teach. It doesn\'t explain trade-offs. It doesn\'t help junior engineers <em>understand</em> why one approach is better than another.</p>
<p>AI can be a powerful tool in the hands of an experienced engineer. But it\'s a crutch for someone still learning the fundamentals. And when companies rely on AI to replace the learning process, they\'re not just failing to train the next generation — they\'re actively preventing it.</p>
</section>

<section>
<h2>Why Senior Judgment Won\'t Go Out of Style</h2>
<p>AI can generate code. It can autocomplete functions. It can even write entire modules based on a prompt.</p>
<p>What it can\'t do:</p>
<ul>
<li>Architect a system that scales gracefully under load.</li>
<li>Anticipate failure modes and design for resilience.</li>
<li>Weigh trade-offs between performance, maintainability, and time-to-market.</li>
<li>Navigate organizational dynamics to get a technical decision across the line.</li>
<li>Mentor the next generation of engineers.</li>
</ul>
<p>These are the skills of a senior engineer. And they can\'t be automated.</p>
</section>

<section>
<h2>What Companies Are Going to Miss</h2>
<p>In five years, companies will realize they have a problem. The senior engineers they relied on will retire, move on, or burn out. And there won\'t be enough mid-level or senior engineers to replace them.</p>
<p>Why? Because the juniors who should have been learning and growing over the past five years were never hired. The pipeline dried up.</p>
<p>The cost of this short-sightedness will be steep: projects will fail, systems will collapse, and companies will scramble to find experienced engineers who no longer exist in the numbers they need.</p>
</section>

<section>
<h2>The Case for Engineering Craft</h2>
<p>The future of software isn\'t AI-generated code. It\'s thoughtful, well-architected systems designed by engineers who understand the craft.</p>
<p>That means:</p>
<ul>
<li><strong>Investing in juniors.</strong> Hiring them, training them, and giving them space to grow.</li>
<li><strong>Valuing senior judgment.</strong> Recognizing that experience and architectural thinking can\'t be replaced by a language model.</li>
<li><strong>Building for the long term.</strong> Designing systems that are maintainable, scalable, and resilient — not just "good enough for now."</li>
</ul>
<p>This is the path forward. And it starts with taking engineering seriously again.</p>
</section>
</article>',
                'is_published' => true,
                'created' => $now,
                'modified' => $now,
            ],
            [
                'slug' => 'about',
                'title' => 'About',
                'subtitle' => 'Who\'s behind The Mind Engineer',
                'content' => '<article class="about">
<section>
<h2>Who I Am</h2>
<p>I\'m a VP of Platform Engineering with over a decade of experience designing, building, and scaling systems that matter. I\'ve worked across industries, led engineering teams, and navigated the messy reality of software development in organizations of all sizes.</p>
<p>This isn\'t a personal brand. This isn\'t a side hustle. This is a space for thinking out loud about the craft of engineering — the kind of thinking that doesn\'t fit into a tweet or a LinkedIn post.</p>
</section>

<section>
<h2>What I Believe</h2>
<p><strong>Measure twice, architect once.</strong> Good systems are designed with intention. They\'re not hacked together and refactored endlessly. They\'re thought through, planned, and built to last.</p>
<p><strong>Senior judgment over hype.</strong> The industry is full of noise: hot takes, framework wars, and people selling courses on "the one true way." I\'m not interested in hype. I\'m interested in what actually works.</p>
<p><strong>Craft over convenience.</strong> Engineering is a craft. It requires skill, experience, and thoughtfulness. Shortcuts and quick fixes might work in the short term, but they don\'t build systems that endure.</p>
</section>

<section>
<h2>What This Is (And Isn\'t)</h2>
<p>The Mind Engineer is a writing outlet. A place to publish essays, share ideas, and explore the deeper questions of systems architecture and engineering leadership.</p>
<p>This is <strong>not</strong> a course platform. I\'m not here to sell you a program, a masterclass, or a "proven system for success." If you\'re looking for that, you won\'t find it here.</p>
<p>What you will find: honest, technical writing. Long-form essays. Deep dives into architectural decisions. Perspectives on what it means to be a senior engineer in an industry that\'s changing fast.</p>
</section>

<section>
<h2>Get in Touch</h2>
<p>If you want to stay updated on new essays and resources, you can subscribe on the <a href="/">homepage</a>. No spam, no drip campaigns, just occasional emails when there\'s something worth sharing.</p>
</section>
</article>',
                'is_published' => true,
                'created' => $now,
                'modified' => $now,
            ],
        ];

        $pagesTable = $this->table('pages');
        $pagesTable->insert($pagesData)->save();
    }
}
