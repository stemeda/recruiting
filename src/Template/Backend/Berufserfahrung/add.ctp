<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Berufserfahrung'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stellen Has Berufserfahrung'), ['controller' => 'StellenHasBerufserfahrung', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stellen Has Berufserfahrung'), ['controller' => 'StellenHasBerufserfahrung', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="berufserfahrung form large-9 medium-8 columns content">
    <?= $this->Form->create($berufserfahrung) ?>
    <fieldset>
        <legend><?= __('Add Berufserfahrung') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>