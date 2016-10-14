<h1>Login</h1>
Bitte geben Sie Ihre Login-Daten an, damit wir Ihre Freischaltung überprüfen können.
<?= $this->Form->create() ?>
<?= $this->Form->input('username') ?>
<?= $this->Form->input('password') ?>
<?= $this->Form->input('key', ['value' => $key, 'type' => 'hidden']) ?>
<?= $this->Form->button('Registrieren') ?>
<?= $this->Form->end() ?>