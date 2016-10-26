<?php

$this->start('tb_actions');
?>
    <li><?= $this->Html->link('Liste', ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link('Liste', ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($user); ?>
<fieldset>
    <legend><?= 'Benutzer hinzufügen'?></legend>
    <?php
    echo $this->Form->input('username');
    echo $this->Form->input('firstname');
    echo $this->Form->input('surname');
    echo $this->Form->input('email');
    echo $this->Form->input('password');
    echo $this->Form->input('type', ['type' => 'select', 'options' =>[ 'Administrator' => 'admin', 'Rekruter' => 'recruiter']]);
    ?>
</fieldset>
<?= $this->Form->button('Speichern'); ?>
<?= $this->Form->end() ?>
