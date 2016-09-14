<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bewerbung->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bewerbung->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bewerbung'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Stellen'), ['controller' => 'Stellen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stellen'), ['controller' => 'Stellen', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Abschluesse'), ['controller' => 'Abschluesse', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Abschluesse'), ['controller' => 'Abschluesse', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bewerbung Status'), ['controller' => 'BewerbungStatus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bewerbung Status'), ['controller' => 'BewerbungStatus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bewerbung form large-9 medium-8 columns content">
    <?= $this->Form->create($bewerbung) ?>
    <fieldset>
        <legend><?= __('Edit Bewerbung') ?></legend>
        <?php
            echo $this->Form->input('vorname');
            echo $this->Form->input('nachname');
            echo $this->Form->input('email');
            echo $this->Form->input('benachrichtigung', ['empty' => true]);
            echo $this->Form->input('abschluss_note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
