<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Abschluesse'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Abschluesse Has Stellen'), ['controller' => 'AbschluesseHasStellen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Abschluesse Has Stellen'), ['controller' => 'AbschluesseHasStellen', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="abschluesse index large-9 medium-8 columns content">
    <h3><?= __('Abschluesse') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('active') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($abschluesse as $abschluesse): ?>
            <tr>
                <td><?= $this->Number->format($abschluesse->id) ?></td>
                <td><?= h($abschluesse->name) ?></td>
                <td><?= h($abschluesse->active) ?></td>
                <td><?= h($abschluesse->created) ?></td>
                <td><?= h($abschluesse->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $abschluesse->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $abschluesse->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $abschluesse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $abschluesse->id)]) ?>
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
