<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bewerbung Status'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bewerbungStatus index large-9 medium-8 columns content">
    <h3><?= __('Bewerbung Status') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('abgeschlossen') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bewerbungStatus as $bewerbungStatus): ?>
            <tr>
                <td><?= $this->Number->format($bewerbungStatus->id) ?></td>
                <td><?= h($bewerbungStatus->name) ?></td>
                <td><?= h($bewerbungStatus->abgeschlossen) ?></td>
                <td><?= h($bewerbungStatus->created) ?></td>
                <td><?= h($bewerbungStatus->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bewerbungStatus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bewerbungStatus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bewerbungStatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bewerbungStatus->id)]) ?>
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
