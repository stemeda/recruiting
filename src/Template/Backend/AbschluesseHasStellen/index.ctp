<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Abschluesse Has Stellen'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Abschluesse'), ['controller' => 'Abschluesse', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Abschluesse'), ['controller' => 'Abschluesse', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stellen'), ['controller' => 'Stellen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stellen'), ['controller' => 'Stellen', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="abschluesseHasStellen index large-9 medium-8 columns content">
    <h3><?= __('Abschluesse Has Stellen') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('abschluesse_id') ?></th>
                <th><?= $this->Paginator->sort('stellen_id') ?></th>
                <th><?= $this->Paginator->sort('priotitaet') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($abschluesseHasStellen as $abschluesseHasStellen): ?>
            <tr>
                <td><?= $this->Number->format($abschluesseHasStellen->id) ?></td>
                <td><?= $abschluesseHasStellen->has('abschluesse') ? $this->Html->link($abschluesseHasStellen->abschluesse->name, ['controller' => 'Abschluesse', 'action' => 'view', $abschluesseHasStellen->abschluesse->id]) : '' ?></td>
                <td><?= $abschluesseHasStellen->has('stellen') ? $this->Html->link($abschluesseHasStellen->stellen->name, ['controller' => 'Stellen', 'action' => 'view', $abschluesseHasStellen->stellen->id]) : '' ?></td>
                <td><?= $this->Number->format($abschluesseHasStellen->priotitaet) ?></td>
                <td><?= h($abschluesseHasStellen->created) ?></td>
                <td><?= h($abschluesseHasStellen->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $abschluesseHasStellen->abschluesse_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $abschluesseHasStellen->abschluesse_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $abschluesseHasStellen->abschluesse_id], ['confirm' => __('Are you sure you want to delete # {0}?', $abschluesseHasStellen->abschluesse_id)]) ?>
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
