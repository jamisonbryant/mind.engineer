<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Page> $pages
 */
?>
<h1>Pages</h1>

<table class="admin-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Slug</th>
            <th>Status</th>
            <th>Modified</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pages as $page): ?>
        <tr>
            <td><?= h($page->title) ?></td>
            <td><code><?= h($page->slug) ?></code></td>
            <td>
                <?php if ($page->is_published): ?>
                    <span class="badge badge-published">Published</span>
                <?php else: ?>
                    <span class="badge badge-draft">Draft</span>
                <?php endif; ?>
            </td>
            <td><?= $page->modified->format('M j, Y') ?></td>
            <td class="actions">
                <?= $this->Html->link('Edit', ['action' => 'edit', $page->id]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
