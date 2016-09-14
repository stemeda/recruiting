<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Filestorage'), ['action' => 'edit', $filestorage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Filestorage'), ['action' => 'delete', $filestorage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filestorage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Filestorage'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Filestorage'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="filestorage view large-9 medium-8 columns content">
    <h3><?= h($filestorage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Path') ?></th>
            <td><?= h($filestorage->path) ?></td>
        </tr>
        <tr>
            <th><?= __('Hash') ?></th>
            <td><?= h($filestorage->hash) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($filestorage->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Model') ?></th>
            <td><?= $this->Number->format($filestorage->model) ?></td>
        </tr>
        <tr>
            <th><?= __('Model Id') ?></th>
            <td><?= $this->Number->format($filestorage->model_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Size') ?></th>
            <td><?= $this->Number->format($filestorage->size) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($filestorage->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($filestorage->modified) ?></td>
        </tr>
    </table>
</div>
