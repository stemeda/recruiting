<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stellen Has Berufserfahrung'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stellen'), ['controller' => 'Stellen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stellen'), ['controller' => 'Stellen', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Berufserfahrung'), ['controller' => 'Berufserfahrung', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Berufserfahrung'), ['controller' => 'Berufserfahrung', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stellenHasBerufserfahrung form large-9 medium-8 columns content">
    <?= $this->Form->create($stellenHasBerufserfahrung) ?>
    <fieldset>
        <legend><?= __('Add Stellen Has Berufserfahrung') ?></legend>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('priotitaet');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
