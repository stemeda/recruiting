<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Berufserfahrung'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stellen Has Berufserfahrung'), ['controller' => 'StellenHasBerufserfahrung', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stellen Has Berufserfahrung'), ['controller' => 'StellenHasBerufserfahrung', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="berufserfahrung index large-9 medium-8 columns content">
    <h3><?= __('Berufserfahrung') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($berufserfahrung as $berufserfahrung): ?>
            <tr>
                <td><?= $this->Number->format($berufserfahrung->id) ?></td>
                <td><?= h($berufserfahrung->name) ?></td>
                <td><?= h($berufserfahrung->created) ?></td>
                <td><?= h($berufserfahrung->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $berufserfahrung->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $berufserfahrung->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $berufserfahrung->id], ['confirm' => __('Are you sure you want to delete # {0}?', $berufserfahrung->id)]) ?>
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
