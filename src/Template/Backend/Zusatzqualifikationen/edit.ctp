<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $zusatzqualifikationen->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $zusatzqualifikationen->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Zusatzqualifikationen'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bewerbung Has Zusatzqualifikationen'), ['controller' => 'BewerbungHasZusatzqualifikationen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bewerbung Has Zusatzqualifikationen'), ['controller' => 'BewerbungHasZusatzqualifikationen', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stellen Has Zusatzqualifikationen'), ['controller' => 'StellenHasZusatzqualifikationen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stellen Has Zusatzqualifikationen'), ['controller' => 'StellenHasZusatzqualifikationen', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="zusatzqualifikationen form large-9 medium-8 columns content">
    <?= $this->Form->create($zusatzqualifikationen) ?>
    <fieldset>
        <legend><?= __('Edit Zusatzqualifikationen') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
