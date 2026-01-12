<?php
/**
 * Admin Layout
 *
 * @var \App\View\AppView $this
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - <?= $this->fetch('title') ?> - The Mind Engineer</title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'admin']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="admin">
    <div class="admin-wrapper">
        <nav class="admin-sidebar">
            <div class="admin-brand">
                <a href="<?= $this->Url->build('/admin/pages') ?>">TME Admin</a>
            </div>
            <ul class="admin-nav">
                <li><?= $this->Html->link('Pages', '/admin/pages') ?></li>
                <li><?= $this->Html->link('Articles', '/admin/articles') ?></li>
                <li><?= $this->Html->link('Subscriptions', '/admin/email-subscriptions') ?></li>
                <li class="admin-nav-divider"></li>
                <li><?= $this->Html->link('View Site', '/', ['target' => '_blank']) ?></li>
                <li><?= $this->Html->link('Logout', '/admin/logout') ?></li>
            </ul>
        </nav>
        <main class="admin-main">
            <div class="admin-content">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </main>
    </div>
</body>
</html>
