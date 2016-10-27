<?= $this->Form->create($user); ?>
<fieldset>
    <legend><?= __('register') ?></legend>
    <?php
    echo $this->Form->input('username');
    echo $this->Form->input('firstname', ['label' => 'Vorname']);
    echo $this->Form->input('surname', ['label' => 'Nachname']);
    echo $this->Form->input('email');
    echo $this->Form->input('password', ['value' => '']);
    echo $this->Form->input('password_check', ['type' => 'password', 'value' => '', 'label' => 'Passwort zur Prüfung']);
    echo $this->Form->input('accept_datasecurity', ['type' => 'checkbox', 'label' => 'Ich akzeptiere die Datenschutzbestimmungen']);
    ?>
    Mit dem Hacken <i>Ich akzeptiere die Datenschutzbestimmungen</i> akzeptieren Sie die Datenschutzbestimmungen. Mehr Infos <a href="#" id="dataSecurityButtom">hier</a>.
</fieldset>
<?= $this->Form->button(__("register")); ?>
<?= $this->Form->end() ?>
