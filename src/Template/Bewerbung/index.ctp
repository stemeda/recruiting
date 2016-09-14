<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bewerbung'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stellen'), ['controller' => 'Stellen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stellen'), ['controller' => 'Stellen', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Abschluesse'), ['controller' => 'Abschluesse', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Abschluesse'), ['controller' => 'Abschluesse', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bewerbung Status'), ['controller' => 'BewerbungStatus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bewerbung Status'), ['controller' => 'BewerbungStatus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bewerbung index large-9 medium-8 columns content">
    <h3><?= __('Bewerbung') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('stellen_id') ?></th>
                <th><?= $this->Paginator->sort('abschluesse_id') ?></th>
                <th><?= $this->Paginator->sort('bewerbung_status_id') ?></th>
                <th><?= $this->Paginator->sort('vorname') ?></th>
                <th><?= $this->Paginator->sort('nachname') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('benachrichtigung') ?></th>
                <th><?= $this->Paginator->sort('abschluss_note') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bewerbung as $bewerbung): ?>
            <tr>
                <td><?= $this->Number->format($bewerbung->id) ?></td>
                <td><?= $bewerbung->has('stellen') ? $this->Html->link($bewerbung->stellen->name, ['controller' => 'Stellen', 'action' => 'view', $bewerbung->stellen->id]) : '' ?></td>
                <td><?= $bewerbung->has('abschluesse') ? $this->Html->link($bewerbung->abschluesse->name, ['controller' => 'Abschluesse', 'action' => 'view', $bewerbung->abschluesse->id]) : '' ?></td>
                <td><?= $bewerbung->has('bewerbung_status') ? $this->Html->link($bewerbung->bewerbung_status->name, ['controller' => 'BewerbungStatus', 'action' => 'view', $bewerbung->bewerbung_status->id]) : '' ?></td>
                <td><?= h($bewerbung->vorname) ?></td>
                <td><?= h($bewerbung->nachname) ?></td>
                <td><?= h($bewerbung->email) ?></td>
                <td><?= h($bewerbung->benachrichtigung) ?></td>
                <td><?= $this->Number->format($bewerbung->abschluss_note) ?></td>
                <td><?= h($bewerbung->created) ?></td>
                <td><?= h($bewerbung->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bewerbung->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bewerbung->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bewerbung->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bewerbung->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
