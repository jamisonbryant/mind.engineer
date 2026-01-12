<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Article> $articles
 */
?>
<h1>Articles</h1>
<p><?= $this->Html->link('New Article', ['action' => 'add'], ['class' => 'button button-primary']) ?></p>

<table class="admin-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Published</th>
            <th>Modified</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article): ?>
        <tr>
            <td><?= h($article->title) ?></td>
            <td>
                <?php if ($article->status === 'published'): ?>
                    <span class="badge badge-published">Published</span>
                <?php else: ?>
                    <span class="badge badge-draft">Draft</span>
                <?php endif; ?>
            </td>
            <td><?= $article->published_at ? $article->published_at->format('M j, Y') : '-' ?></td>
            <td><?= $article->modified->format('M j, Y') ?></td>
            <td class="actions">
                <?= $this->Html->link('Edit', ['action' => 'edit', $article->id]) ?>
                <?= $this->Form->postLink('Delete', ['action' => 'delete', $article->id], [
                    'confirm' => 'Delete this article?',
                ]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
