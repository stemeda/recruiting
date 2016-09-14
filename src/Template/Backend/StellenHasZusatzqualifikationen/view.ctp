<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Stellen Has Zusatzqualifikationen'), ['action' => 'edit', $stellenHasZusatzqualifikationen->stellen_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Stellen Has Zusatzqualifikationen'), ['action' => 'delete', $stellenHasZusatzqualifikationen->stellen_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stellenHasZusatzqualifikationen->stellen_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Stellen Has Zusatzqualifikationen'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stellen Has Zusatzqualifikationen'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Stellen'), ['controller' => 'Stellen', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Stellen'), ['controller' => 'Stellen', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Zusatzqualifikationen'), ['controller' => 'Zusatzqualifikationen', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zusatzqualifikationen'), ['controller' => 'Zusatzqualifikationen', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="stellenHasZusatzqualifikationen view large-9 medium-8 columns content">
    <h3><?= h($stellenHasZusatzqualifikationen->stellen_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Stellen') ?></th>
            <td><?= $stellenHasZusatzqualifikationen->has('stellen') ? $this->Html->link($stellenHasZusatzqualifikationen->stellen->name, ['controller' => 'Stellen', 'action' => 'view', $stellenHasZusatzqualifikationen->stellen->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Zusatzqualifikationen') ?></th>
            <td><?= $stellenHasZusatzqualifikationen->has('zusatzqualifikationen') ? $this->Html->link($stellenHasZusatzqualifikationen->zusatzqualifikationen->name, ['controller' => 'Zusatzqualifikationen', 'action' => 'view', $stellenHasZusatzqualifikationen->zusatzqualifikationen->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($stellenHasZusatzqualifikationen->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Priotitaet') ?></th>
            <td><?= $this->Number->format($stellenHasZusatzqualifikationen->priotitaet) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($stellenHasZusatzqualifikationen->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($stellenHasZusatzqualifikationen->modified) ?></td>
        </tr>
    </table>
</div>
