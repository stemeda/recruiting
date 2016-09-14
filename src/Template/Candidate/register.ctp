<?= $this->Form->create($user); ?>
<fieldset>
    <legend><?= __('register') ?></legend>
    <?php
    echo $this->Form->input('username');
    echo $this->Form->input('firstname');
    echo $this->Form->input('surname');
    echo $this->Form->input('email');
    echo $this->Form->input('password', ['value' => '']);
    echo $this->Form->input('password_check', ['type' => 'password', 'value' => '']);
    ?>
</fieldset>
<?= $this->Form->button(__("register")); ?>
<?= $this->Form->end() ?>
<?=debug($user);?>
