<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bewerbungHasZusatzqualifikationen->bewerbung_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bewerbungHasZusatzqualifikationen->bewerbung_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bewerbung Has Zusatzqualifikationen'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Zusatzqualifikationen'), ['controller' => 'Zusatzqualifikationen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Zusatzqualifikationen'), ['controller' => 'Zusatzqualifikationen', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bewerbungHasZusatzqualifikationen form large-9 medium-8 columns content">
    <?= $this->Form->create($bewerbungHasZusatzqualifikationen) ?>
    <fieldset>
        <legend><?= __('Edit Bewerbung Has Zusatzqualifikationen') ?></legend>
        <?php
            echo $this->Form->input('id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
