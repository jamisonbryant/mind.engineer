<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Page $page
 */
$this->assign('title', 'Home');
?>

<section class="hero">
    <h1><?= h($page->title) ?></h1>
    <?php if ($page->subtitle): ?>
        <p class="subtitle"><?= h($page->subtitle) ?></p>
    <?php endif; ?>
</section>

<div class="page-content">
    <?= $this->Markdown->render($page->content) ?>
</div>

<section class="email-capture">
    <h2>Stay in the Loop</h2>
    <p>Get occasional essays and resources on real systems architecture and senior-level engineering judgment. No spam, no drip funnel, just thoughtful writing when there's something worth saying.</p>
    <?= $this->Form->create(null, ['url' => '/subscribe']) ?>
    <?= $this->Form->control('email', [
        'type' => 'email',
        'label' => false,
        'placeholder' => 'your@email.com',
        'required' => true,
    ]) ?>
    <button type="submit">Subscribe</button>
    <?= $this->Form->end() ?>
</section>
