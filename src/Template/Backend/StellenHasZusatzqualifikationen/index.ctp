<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stellen Has Zusatzqualifikationen'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stellen'), ['controller' => 'Stellen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stellen'), ['controller' => 'Stellen', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Zusatzqualifikationen'), ['controller' => 'Zusatzqualifikationen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Zusatzqualifikationen'), ['controller' => 'Zusatzqualifikationen', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stellenHasZusatzqualifikationen index large-9 medium-8 columns content">
    <h3><?= __('Stellen Has Zusatzqualifikationen') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('stellen_id') ?></th>
                <th><?= $this->Paginator->sort('zusatzqualifikationen_id') ?></th>
                <th><?= $this->Paginator->sort('priotitaet') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stellenHasZusatzqualifikationen as $stellenHasZusatzqualifikationen): ?>
            <tr>
                <td><?= $this->Number->format($stellenHasZusatzqualifikationen->id) ?></td>
                <td><?= $stellenHasZusatzqualifikationen->has('stellen') ? $this->Html->link($stellenHasZusatzqualifikationen->stellen->name, ['controller' => 'Stellen', 'action' => 'view', $stellenHasZusatzqualifikationen->stellen->id]) : '' ?></td>
                <td><?= $stellenHasZusatzqualifikationen->has('zusatzqualifikationen') ? $this->Html->link($stellenHasZusatzqualifikationen->zusatzqualifikationen->name, ['controller' => 'Zusatzqualifikationen', 'action' => 'view', $stellenHasZusatzqualifikationen->zusatzqualifikationen->id]) : '' ?></td>
                <td><?= $this->Number->format($stellenHasZusatzqualifikationen->priotitaet) ?></td>
                <td><?= h($stellenHasZusatzqualifikationen->created) ?></td>
                <td><?= h($stellenHasZusatzqualifikationen->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $stellenHasZusatzqualifikationen->stellen_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stellenHasZusatzqualifikationen->stellen_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stellenHasZusatzqualifikationen->stellen_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stellenHasZusatzqualifikationen->stellen_id)]) ?>
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
