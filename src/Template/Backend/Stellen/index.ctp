<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Stellen'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Abschluesse Has Stellen'), ['controller' => 'AbschluesseHasStellen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Abschluesse Has Stellen'), ['controller' => 'AbschluesseHasStellen', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stellen Has Berufserfahrung'), ['controller' => 'StellenHasBerufserfahrung', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stellen Has Berufserfahrung'), ['controller' => 'StellenHasBerufserfahrung', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Stellen Has Zusatzqualifikationen'), ['controller' => 'StellenHasZusatzqualifikationen', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Stellen Has Zusatzqualifikationen'), ['controller' => 'StellenHasZusatzqualifikationen', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="stellen index large-9 medium-8 columns content">
    <h3><?= __('Stellen') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('manuellPruefen') ?></th>
                <th><?= $this->Paginator->sort('vorstellungsgespraeche') ?></th>
                <th><?= $this->Paginator->sort('ausschreiben_von') ?></th>
                <th><?= $this->Paginator->sort('ausschreiben_bis') ?></th>
                <th><?= $this->Paginator->sort('einstellung_ab') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($stellen as $stellen): ?>
            <tr>
                <td><?= $this->Number->format($stellen->id) ?></td>
                <td><?= h($stellen->name) ?></td>
                <td><?= h($stellen->description) ?></td>
                <td><?= $this->Number->format($stellen->manuellPruefen) ?></td>
                <td><?= $this->Number->format($stellen->vorstellungsgespraeche) ?></td>
                <td><?= h($stellen->ausschreiben_von) ?></td>
                <td><?= h($stellen->ausschreiben_bis) ?></td>
                <td><?= h($stellen->einstellung_ab) ?></td>
                <td><?= h($stellen->created) ?></td>
                <td><?= h($stellen->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $stellen->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stellen->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stellen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $stellen->id)]) ?>
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
