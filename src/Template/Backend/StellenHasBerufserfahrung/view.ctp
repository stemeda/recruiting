<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stellen Has Berufserfahrung'), ['action' => 'edit', $stellenHasBerufserfahrung->stellen_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stellen Has Berufserfahrung'), ['action' => 'delete', $stellenHasBerufserfahrung->stellen_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stellenHasBerufserfahrung->stellen_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stellen Has Berufserfahrung'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stellen Has Berufserfahrung'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stellen'), ['controller' => 'Stellen', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stellen'), ['controller' => 'Stellen', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Berufserfahrung'), ['controller' => 'Berufserfahrung', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Berufserfahrung'), ['controller' => 'Berufserfahrung', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stellenHasBerufserfahrung view large-9 medium-8 columns content">
    <h3><?= h($stellenHasBerufserfahrung->stellen_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Stellen') ?></th>
            <td><?= $stellenHasBerufserfahrung->has('stellen') ? $this->Html->link($stellenHasBerufserfahrung->stellen->name, ['controller' => 'Stellen', 'action' => 'view', $stellenHasBerufserfahrung->stellen->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Berufserfahrung') ?></th>
            <td><?= $stellenHasBerufserfahrung->has('berufserfahrung') ? $this->Html->link($stellenHasBerufserfahrung->berufserfahrung->name, ['controller' => 'Berufserfahrung', 'action' => 'view', $stellenHasBerufserfahrung->berufserfahrung->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($stellenHasBerufserfahrung->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Priotitaet') ?></th>
            <td><?= $this->Number->format($stellenHasBerufserfahrung->priotitaet) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($stellenHasBerufserfahrung->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($stellenHasBerufserfahrung->modified) ?></td>
        </tr>
    </table>
</div>
