<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Berufserfahrung'), ['action' => 'edit', $berufserfahrung->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Berufserfahrung'), ['action' => 'delete', $berufserfahrung->id], ['confirm' => __('Are you sure you want to delete # {0}?', $berufserfahrung->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Berufserfahrung'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Berufserfahrung'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stellen Has Berufserfahrung'), ['controller' => 'StellenHasBerufserfahrung', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stellen Has Berufserfahrung'), ['controller' => 'StellenHasBerufserfahrung', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="berufserfahrung view large-9 medium-8 columns content">
    <h3><?= h($berufserfahrung->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($berufserfahrung->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($berufserfahrung->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($berufserfahrung->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($berufserfahrung->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Stellen Has Berufserfahrung') ?></h4>
        <?php if (!empty($berufserfahrung->stellen_has_berufserfahrung)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Stellen Id') ?></th>
                <th><?= __('Berufserfahrung Id') ?></th>
                <th><?= __('Priotitaet') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($berufserfahrung->stellen_has_berufserfahrung as $stellenHasBerufserfahrung): ?>
            <tr>
                <td><?= h($stellenHasBerufserfahrung->id) ?></td>
                <td><?= h($stellenHasBerufserfahrung->stellen_id) ?></td>
                <td><?= h($stellenHasBerufserfahrung->berufserfahrung_id) ?></td>
                <td><?= h($stellenHasBerufserfahrung->priotitaet) ?></td>
                <td><?= h($stellenHasBerufserfahrung->created) ?></td>
                <td><?= h($stellenHasBerufserfahrung->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StellenHasBerufserfahrung', 'action' => 'view', $stellenHasBerufserfahrung->stellen_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StellenHasBerufserfahrung', 'action' => 'edit', $stellenHasBerufserfahrung->stellen_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StellenHasBerufserfahrung', 'action' => 'delete', $stellenHasBerufserfahrung->stellen_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stellenHasBerufserfahrung->stellen_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
