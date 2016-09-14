<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Stellen'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Abschluesse Has Stellen'), ['controller' => 'AbschluesseHasStellen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Abschluesse Has Stellen'), ['controller' => 'AbschluesseHasStellen', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stellen Has Berufserfahrung'), ['controller' => 'StellenHasBerufserfahrung', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stellen Has Berufserfahrung'), ['controller' => 'StellenHasBerufserfahrung', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stellen Has Zusatzqualifikationen'), ['controller' => 'StellenHasZusatzqualifikationen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stellen Has Zusatzqualifikationen'), ['controller' => 'StellenHasZusatzqualifikationen', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stellen form large-9 medium-8 columns content">
    <?= $this->Form->create($stellen) ?>
    <fieldset>
        <legend><?= __('Add Stellen') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('description');
            echo $this->Form->input('manuellPruefen');
            echo $this->Form->input('vorstellungsgespraeche');
            echo $this->Form->input('ausschreiben_von');
            echo $this->Form->input('ausschreiben_bis');
            echo $this->Form->input('einstellung_ab');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
