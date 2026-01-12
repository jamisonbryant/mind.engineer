<div class="users form">
    <h1>Admin Login</h1>
    <?= $this->Flash->render() ?>
    <?= $this->Form->create() ?>
    <fieldset>
        <?= $this->Form->control('email', ['type' => 'email', 'required' => true]) ?>
        <?= $this->Form->control('password', ['type' => 'password', 'required' => true]) ?>
    </fieldset>
    <?= $this->Form->button('Login', ['class' => 'button-primary']) ?>
    <?= $this->Form->end() ?>
</div>
