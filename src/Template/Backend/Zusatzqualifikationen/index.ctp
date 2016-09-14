<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Zusatzqualifikationen'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bewerbung Has Zusatzqualifikationen'), ['controller' => 'BewerbungHasZusatzqualifikationen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bewerbung Has Zusatzqualifikationen'), ['controller' => 'BewerbungHasZusatzqualifikationen', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stellen Has Zusatzqualifikationen'), ['controller' => 'StellenHasZusatzqualifikationen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stellen Has Zusatzqualifikationen'), ['controller' => 'StellenHasZusatzqualifikationen', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="zusatzqualifikationen index large-9 medium-8 columns content">
    <h3><?= __('Zusatzqualifikationen') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($zusatzqualifikationen as $zusatzqualifikationen): ?>
            <tr>
                <td><?= $this->Number->format($zusatzqualifikationen->id) ?></td>
                <td><?= h($zusatzqualifikationen->name) ?></td>
                <td><?= h($zusatzqualifikationen->description) ?></td>
                <td><?= h($zusatzqualifikationen->created) ?></td>
                <td><?= h($zusatzqualifikationen->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $zusatzqualifikationen->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $zusatzqualifikationen->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $zusatzqualifikationen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zusatzqualifikationen->id)]) ?>
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
