<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Filestorage'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="filestorage index large-9 medium-8 columns content">
    <h3><?= __('Filestorage') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('model') ?></th>
                <th><?= $this->Paginator->sort('model_id') ?></th>
                <th><?= $this->Paginator->sort('path') ?></th>
                <th><?= $this->Paginator->sort('size') ?></th>
                <th><?= $this->Paginator->sort('hash') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filestorage as $filestorage): ?>
            <tr>
                <td><?= $this->Number->format($filestorage->id) ?></td>
                <td><?= $this->Number->format($filestorage->model) ?></td>
                <td><?= $this->Number->format($filestorage->model_id) ?></td>
                <td><?= h($filestorage->path) ?></td>
                <td><?= $this->Number->format($filestorage->size) ?></td>
                <td><?= h($filestorage->hash) ?></td>
                <td><?= h($filestorage->created) ?></td>
                <td><?= h($filestorage->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $filestorage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $filestorage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $filestorage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filestorage->id)]) ?>
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
