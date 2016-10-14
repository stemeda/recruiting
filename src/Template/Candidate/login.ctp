<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->input('username') ?>
<?= $this->Form->input('password') ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>
<hr/>
Sie haben noch keinen Login? Sie können sich <?= $this->Html->link('hier', ['action' => 'register'])?> registrieren.