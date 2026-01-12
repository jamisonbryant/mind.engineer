<?php
/**
 * Public Layout - The Mind Engineer
 *
 * @var \App\View\AppView $this
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->fetch('title') ?> - The Mind Engineer</title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'site']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header class="site-header">
        <div class="container">
            <nav class="site-nav">
                <a href="<?= $this->Url->build('/') ?>" class="site-brand">The Mind Engineer</a>
                <ul class="nav-links">
                    <li><?= $this->Html->link('Home', '/') ?></li>
                    <li><?= $this->Html->link('About', '/about') ?></li>
                    <li><?= $this->Html->link('Manifesto', '/manifesto') ?></li>
                    <li><?= $this->Html->link('Articles', '/articles') ?></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="site-main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>&copy; <?= date('Y') ?> The Mind Engineer</p>
        </div>
    </footer>
</body>
</html>
