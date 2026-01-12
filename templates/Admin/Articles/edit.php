<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 * @var array $statuses
 */
?>
<h1>Edit Article: <?= h($article->title) ?></h1>

<div class="admin-form">
    <?= $this->Form->create($article) ?>

    <?= $this->Form->control('title') ?>
    <?= $this->Form->control('slug') ?>
    <?= $this->Form->control('summary', ['type' => 'textarea', 'rows' => 3]) ?>
    <?= $this->Form->control('content', [
        'type' => 'textarea',
        'label' => 'Content (Markdown)',
        'rows' => 20,
    ]) ?>
    <?= $this->Form->control('status', ['options' => $statuses]) ?>
    <?= $this->Form->control('published_at', ['empty' => true]) ?>

    <?= $this->Form->button('Save', ['class' => 'button-primary']) ?>
    <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'button']) ?>

    <?= $this->Form->end() ?>
</div>
