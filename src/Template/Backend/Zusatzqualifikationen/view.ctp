<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Zusatzqualifikationen'), ['action' => 'edit', $zusatzqualifikationen->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Zusatzqualifikationen'), ['action' => 'delete', $zusatzqualifikationen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zusatzqualifikationen->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Zusatzqualifikationen'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zusatzqualifikationen'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bewerbung Has Zusatzqualifikationen'), ['controller' => 'BewerbungHasZusatzqualifikationen', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bewerbung Has Zusatzqualifikationen'), ['controller' => 'BewerbungHasZusatzqualifikationen', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stellen Has Zusatzqualifikationen'), ['controller' => 'StellenHasZusatzqualifikationen', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stellen Has Zusatzqualifikationen'), ['controller' => 'StellenHasZusatzqualifikationen', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="zusatzqualifikationen view large-9 medium-8 columns content">
    <h3><?= h($zusatzqualifikationen->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($zusatzqualifikationen->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($zusatzqualifikationen->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($zusatzqualifikationen->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($zusatzqualifikationen->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($zusatzqualifikationen->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bewerbung Has Zusatzqualifikationen') ?></h4>
        <?php if (!empty($zusatzqualifikationen->bewerbung_has_zusatzqualifikationen)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Bewerbung Id') ?></th>
                <th><?= __('Zusatzqualifikationen Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($zusatzqualifikationen->bewerbung_has_zusatzqualifikationen as $bewerbungHasZusatzqualifikationen): ?>
            <tr>
                <td><?= h($bewerbungHasZusatzqualifikationen->id) ?></td>
                <td><?= h($bewerbungHasZusatzqualifikationen->bewerbung_id) ?></td>
                <td><?= h($bewerbungHasZusatzqualifikationen->zusatzqualifikationen_id) ?></td>
                <td><?= h($bewerbungHasZusatzqualifikationen->created) ?></td>
                <td><?= h($bewerbungHasZusatzqualifikationen->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'BewerbungHasZusatzqualifikationen', 'action' => 'view', $bewerbungHasZusatzqualifikationen->bewerbung_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'BewerbungHasZusatzqualifikationen', 'action' => 'edit', $bewerbungHasZusatzqualifikationen->bewerbung_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'BewerbungHasZusatzqualifikationen', 'action' => 'delete', $bewerbungHasZusatzqualifikationen->bewerbung_id], ['confirm' => __('Are you sure you want to delete # {0}?', $bewerbungHasZusatzqualifikationen->bewerbung_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Stellen Has Zusatzqualifikationen') ?></h4>
        <?php if (!empty($zusatzqualifikationen->stellen_has_zusatzqualifikationen)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Stellen Id') ?></th>
                <th><?= __('Zusatzqualifikationen Id') ?></th>
                <th><?= __('Priotitaet') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($zusatzqualifikationen->stellen_has_zusatzqualifikationen as $stellenHasZusatzqualifikationen): ?>
            <tr>
                <td><?= h($stellenHasZusatzqualifikationen->id) ?></td>
                <td><?= h($stellenHasZusatzqualifikationen->stellen_id) ?></td>
                <td><?= h($stellenHasZusatzqualifikationen->zusatzqualifikationen_id) ?></td>
                <td><?= h($stellenHasZusatzqualifikationen->priotitaet) ?></td>
                <td><?= h($stellenHasZusatzqualifikationen->created) ?></td>
                <td><?= h($stellenHasZusatzqualifikationen->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StellenHasZusatzqualifikationen', 'action' => 'view', $stellenHasZusatzqualifikationen->stellen_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StellenHasZusatzqualifikationen', 'action' => 'edit', $stellenHasZusatzqualifikationen->stellen_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StellenHasZusatzqualifikationen', 'action' => 'delete', $stellenHasZusatzqualifikationen->stellen_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stellenHasZusatzqualifikationen->stellen_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
