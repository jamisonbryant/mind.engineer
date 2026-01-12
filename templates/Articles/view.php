<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
$this->assign('title', $article->title);
?>

<article class="article-content">
    <h1><?= h($article->title) ?></h1>
    <p class="article-meta"><?= $article->published_at->format('F j, Y') ?></p>

    <?= $this->Markdown->render($article->content) ?>

    <footer class="article-footer">
        <p>If this resonates, you can <?= $this->Html->link('subscribe on the homepage', '/') ?> for more essays.</p>
    </footer>
</article>
