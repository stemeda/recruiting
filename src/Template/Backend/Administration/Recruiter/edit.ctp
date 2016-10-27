<?php

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $user->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List User'), ['action' => 'index']) ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $user->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List User'), ['action' => 'index']) ?></li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($user); ?>
<fieldset>
    <legend><?= 'Bearbeiten' ?></legend>
    <?php
    echo $this->Form->input('username');
    echo $this->Form->input('firstname');
    echo $this->Form->input('surname');
    echo $this->Form->input('email');
    echo $this->Form->input('type', ['type' => 'select', 'options' =>[ __('administration') => 'admin', __('recruiter') => 'recruiter']]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
