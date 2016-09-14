<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bewerbung'), ['action' => 'edit', $bewerbung->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bewerbung'), ['action' => 'delete', $bewerbung->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bewerbung->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bewerbung'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bewerbung'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stellen'), ['controller' => 'Stellen', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stellen'), ['controller' => 'Stellen', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Abschluesse'), ['controller' => 'Abschluesse', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Abschluesse'), ['controller' => 'Abschluesse', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bewerbung Status'), ['controller' => 'BewerbungStatus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bewerbung Status'), ['controller' => 'BewerbungStatus', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bewerbung view large-9 medium-8 columns content">
    <h3><?= h($bewerbung->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Stellen') ?></th>
            <td><?= $bewerbung->has('stellen') ? $this->Html->link($bewerbung->stellen->name, ['controller' => 'Stellen', 'action' => 'view', $bewerbung->stellen->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Abschluesse') ?></th>
            <td><?= $bewerbung->has('abschluesse') ? $this->Html->link($bewerbung->abschluesse->name, ['controller' => 'Abschluesse', 'action' => 'view', $bewerbung->abschluesse->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Bewerbung Status') ?></th>
            <td><?= $bewerbung->has('bewerbung_status') ? $this->Html->link($bewerbung->bewerbung_status->name, ['controller' => 'BewerbungStatus', 'action' => 'view', $bewerbung->bewerbung_status->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Vorname') ?></th>
            <td><?= h($bewerbung->vorname) ?></td>
        </tr>
        <tr>
            <th><?= __('Nachname') ?></th>
            <td><?= h($bewerbung->nachname) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($bewerbung->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($bewerbung->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Abschluss Note') ?></th>
            <td><?= $this->Number->format($bewerbung->abschluss_note) ?></td>
        </tr>
        <tr>
            <th><?= __('Benachrichtigung') ?></th>
            <td><?= h($bewerbung->benachrichtigung) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($bewerbung->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($bewerbung->modified) ?></td>
        </tr>
    </table>
</div>
