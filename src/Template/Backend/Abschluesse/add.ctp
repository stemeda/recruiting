<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Abschluesse'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Abschluesse Has Stellen'), ['controller' => 'AbschluesseHasStellen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Abschluesse Has Stellen'), ['controller' => 'AbschluesseHasStellen', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="abschluesse form large-9 medium-8 columns content">
    <?= $this->Form->create($abschluesse) ?>
    <fieldset>
        <legend><?= __('Add Abschluesse') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('active',["type" => "checkbox"]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
