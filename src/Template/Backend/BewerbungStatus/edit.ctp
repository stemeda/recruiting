<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bewerbungStatus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bewerbungStatus->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bewerbung Status'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bewerbungStatus form large-9 medium-8 columns content">
    <?= $this->Form->create($bewerbungStatus) ?>
    <fieldset>
        <legend><?= __('Edit Bewerbung Status') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('abgeschlossen');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
