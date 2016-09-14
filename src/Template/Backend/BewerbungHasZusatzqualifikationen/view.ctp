<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bewerbung Has Zusatzqualifikationen'), ['action' => 'edit', $bewerbungHasZusatzqualifikationen->bewerbung_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bewerbung Has Zusatzqualifikationen'), ['action' => 'delete', $bewerbungHasZusatzqualifikationen->bewerbung_id], ['confirm' => __('Are you sure you want to delete # {0}?', $bewerbungHasZusatzqualifikationen->bewerbung_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bewerbung Has Zusatzqualifikationen'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bewerbung Has Zusatzqualifikationen'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bewerbung'), ['controller' => 'Bewerbung', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Zusatzqualifikationen'), ['controller' => 'Zusatzqualifikationen', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zusatzqualifikationen'), ['controller' => 'Zusatzqualifikationen', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bewerbungHasZusatzqualifikationen view large-9 medium-8 columns content">
    <h3><?= h($bewerbungHasZusatzqualifikationen->bewerbung_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Bewerbung') ?></th>
            <td><?= $bewerbungHasZusatzqualifikationen->has('bewerbung') ? $this->Html->link($bewerbungHasZusatzqualifikationen->bewerbung->id, ['controller' => 'Bewerbung', 'action' => 'view', $bewerbungHasZusatzqualifikationen->bewerbung->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Zusatzqualifikationen') ?></th>
            <td><?= $bewerbungHasZusatzqualifikationen->has('zusatzqualifikationen') ? $this->Html->link($bewerbungHasZusatzqualifikationen->zusatzqualifikationen->name, ['controller' => 'Zusatzqualifikationen', 'action' => 'view', $bewerbungHasZusatzqualifikationen->zusatzqualifikationen->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($bewerbungHasZusatzqualifikationen->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($bewerbungHasZusatzqualifikationen->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($bewerbungHasZusatzqualifikationen->modified) ?></td>
        </tr>
    </table>
</div>
