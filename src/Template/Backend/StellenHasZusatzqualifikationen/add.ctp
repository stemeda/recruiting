<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stellen Has Zusatzqualifikationen'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stellen'), ['controller' => 'Stellen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stellen'), ['controller' => 'Stellen', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Zusatzqualifikationen'), ['controller' => 'Zusatzqualifikationen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Zusatzqualifikationen'), ['controller' => 'Zusatzqualifikationen', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stellenHasZusatzqualifikationen form large-9 medium-8 columns content">
    <?= $this->Form->create($stellenHasZusatzqualifikationen) ?>
    <fieldset>
        <legend><?= __('Add Stellen Has Zusatzqualifikationen') ?></legend>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('priotitaet');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
