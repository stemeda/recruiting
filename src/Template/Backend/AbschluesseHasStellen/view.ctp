<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Abschluesse Has Stellen'), ['action' => 'edit', $abschluesseHasStellen->abschluesse_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Abschluesse Has Stellen'), ['action' => 'delete', $abschluesseHasStellen->abschluesse_id], ['confirm' => __('Are you sure you want to delete # {0}?', $abschluesseHasStellen->abschluesse_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Abschluesse Has Stellen'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Abschluesse Has Stellen'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Abschluesse'), ['controller' => 'Abschluesse', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Abschluesse'), ['controller' => 'Abschluesse', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stellen'), ['controller' => 'Stellen', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stellen'), ['controller' => 'Stellen', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="abschluesseHasStellen view large-9 medium-8 columns content">
    <h3><?= h($abschluesseHasStellen->abschluesse_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Abschluesse') ?></th>
            <td><?= $abschluesseHasStellen->has('abschluesse') ? $this->Html->link($abschluesseHasStellen->abschluesse->name, ['controller' => 'Abschluesse', 'action' => 'view', $abschluesseHasStellen->abschluesse->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Stellen') ?></th>
            <td><?= $abschluesseHasStellen->has('stellen') ? $this->Html->link($abschluesseHasStellen->stellen->name, ['controller' => 'Stellen', 'action' => 'view', $abschluesseHasStellen->stellen->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($abschluesseHasStellen->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Priotitaet') ?></th>
            <td><?= $this->Number->format($abschluesseHasStellen->priotitaet) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($abschluesseHasStellen->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($abschluesseHasStellen->modified) ?></td>
        </tr>
    </table>
</div>
