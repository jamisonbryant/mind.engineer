<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Article> $articles
 */
$this->assign('title', 'Articles');
?>

<h1>Articles</h1>

<ul class="article-list">
    <?php foreach ($articles as $article): ?>
    <li class="article-item">
        <h2><?= $this->Html->link(h($article->title), ['action' => 'view', $article->slug]) ?></h2>
        <p class="article-meta"><?= $article->published_at->format('F j, Y') ?></p>
        <p class="article-summary"><?= h($article->summary) ?></p>
    </li>
    <?php endforeach; ?>
</ul>

<?php if (empty(iterator_to_array($articles))): ?>
<p>No articles yet. Check back soon!</p>
<?php endif; ?>
