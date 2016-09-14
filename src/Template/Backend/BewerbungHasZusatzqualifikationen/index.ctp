<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bewerbung Has Zusatzqualifikationen'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Zusatzqualifikationen'), ['controller' => 'Zusatzqualifikationen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Zusatzqualifikationen'), ['controller' => 'Zusatzqualifikationen', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bewerbungHasZusatzqualifikationen index large-9 medium-8 columns content">
    <h3><?= __('Bewerbung Has Zusatzqualifikationen') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('bewerbung_id') ?></th>
                <th><?= $this->Paginator->sort('zusatzqualifikationen_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bewerbungHasZusatzqualifikationen as $bewerbungHasZusatzqualifikationen): ?>
            <tr>
                <td><?= $this->Number->format($bewerbungHasZusatzqualifikationen->id) ?></td>
                <td><?= $bewerbungHasZusatzqualifikationen->has('bewerbung') ? $this->Html->link($bewerbungHasZusatzqualifikationen->bewerbung->id, ['controller' => 'Bewerbung', 'action' => 'view', $bewerbungHasZusatzqualifikationen->bewerbung->id]) : '' ?></td>
                <td><?= $bewerbungHasZusatzqualifikationen->has('zusatzqualifikationen') ? $this->Html->link($bewerbungHasZusatzqualifikationen->zusatzqualifikationen->name, ['controller' => 'Zusatzqualifikationen', 'action' => 'view', $bewerbungHasZusatzqualifikationen->zusatzqualifikationen->id]) : '' ?></td>
                <td><?= h($bewerbungHasZusatzqualifikationen->created) ?></td>
                <td><?= h($bewerbungHasZusatzqualifikationen->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bewerbungHasZusatzqualifikationen->bewerbung_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bewerbungHasZusatzqualifikationen->bewerbung_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bewerbungHasZusatzqualifikationen->bewerbung_id], ['confirm' => __('Are you sure you want to delete # {0}?', $bewerbungHasZusatzqualifikationen->bewerbung_id)]) ?>
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
