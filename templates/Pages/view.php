<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Page $page
 */
$this->assign('title', $page->title);
?>

<div class="page-content">
    <h1><?= h($page->title) ?></h1>
    <?php if ($page->subtitle): ?>
        <p class="subtitle"><?= h($page->subtitle) ?></p>
    <?php endif; ?>

    <?= $this->Markdown->render($page->content) ?>
</div>
