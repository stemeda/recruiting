<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $abschluesseHasStellen->abschluesse_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $abschluesseHasStellen->abschluesse_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Abschluesse Has Stellen'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Abschluesse'), ['controller' => 'Abschluesse', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Abschluesse'), ['controller' => 'Abschluesse', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stellen'), ['controller' => 'Stellen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stellen'), ['controller' => 'Stellen', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="abschluesseHasStellen form large-9 medium-8 columns content">
    <?= $this->Form->create($abschluesseHasStellen) ?>
    <fieldset>
        <legend><?= __('Edit Abschluesse Has Stellen') ?></legend>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('priotitaet');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
