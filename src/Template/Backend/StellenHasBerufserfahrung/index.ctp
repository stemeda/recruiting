<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stellen Has Berufserfahrung'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stellen'), ['controller' => 'Stellen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stellen'), ['controller' => 'Stellen', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Berufserfahrung'), ['controller' => 'Berufserfahrung', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Berufserfahrung'), ['controller' => 'Berufserfahrung', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stellenHasBerufserfahrung index large-9 medium-8 columns content">
    <h3><?= __('Stellen Has Berufserfahrung') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('stellen_id') ?></th>
                <th><?= $this->Paginator->sort('berufserfahrung_id') ?></th>
                <th><?= $this->Paginator->sort('priotitaet') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stellenHasBerufserfahrung as $stellenHasBerufserfahrung): ?>
            <tr>
                <td><?= $this->Number->format($stellenHasBerufserfahrung->id) ?></td>
                <td><?= $stellenHasBerufserfahrung->has('stellen') ? $this->Html->link($stellenHasBerufserfahrung->stellen->name, ['controller' => 'Stellen', 'action' => 'view', $stellenHasBerufserfahrung->stellen->id]) : '' ?></td>
                <td><?= $stellenHasBerufserfahrung->has('berufserfahrung') ? $this->Html->link($stellenHasBerufserfahrung->berufserfahrung->name, ['controller' => 'Berufserfahrung', 'action' => 'view', $stellenHasBerufserfahrung->berufserfahrung->id]) : '' ?></td>
                <td><?= $this->Number->format($stellenHasBerufserfahrung->priotitaet) ?></td>
                <td><?= h($stellenHasBerufserfahrung->created) ?></td>
                <td><?= h($stellenHasBerufserfahrung->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $stellenHasBerufserfahrung->stellen_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stellenHasBerufserfahrung->stellen_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stellenHasBerufserfahrung->stellen_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stellenHasBerufserfahrung->stellen_id)]) ?>
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
