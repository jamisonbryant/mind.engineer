<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Page $page
 */
?>
<h1>Edit Page: <?= h($page->title) ?></h1>

<div class="admin-form">
    <?= $this->Form->create($page) ?>

    <?= $this->Form->control('title') ?>
    <?= $this->Form->control('subtitle') ?>

    <div class="input">
        <label>Slug</label>
        <input type="text" value="<?= h($page->slug) ?>" disabled>
        <small>Core page slugs cannot be changed.</small>
    </div>

    <?= $this->Form->control('content', [
        'type' => 'textarea',
        'label' => 'Content (Markdown)',
        'rows' => 20,
    ]) ?>

    <?= $this->Form->control('is_published', ['type' => 'checkbox']) ?>

    <?= $this->Form->button('Save', ['class' => 'button-primary']) ?>
    <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'button']) ?>

    <?= $this->Form->end() ?>
</div>

<?php $this->Html->script('https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js', ['block' => true]); ?>
<?php $this->Html->scriptBlock("
    tinymce.init({
        selector: '#content',
        height: 400,
        menubar: false,
        plugins: 'lists link code',
        toolbar: 'undo redo | formatselect | bold italic | bullist numlist | link | code',
    });
", ['block' => true]); ?>
