
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('description'); ?></th>
            <th><?= $this->Paginator->sort('awailable_from'); ?></th>
            <th><?= $this->Paginator->sort('awaibale_until'); ?></th>
            <th><?= $this->Paginator->sort('active'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($application as $applicationDescription): ?>
        <tr>
            <td><?= $this->Number->format($applicationDescription->id) ?></td>
            <td><?= h($applicationDescription->name) ?></td>
            <td><?=
            $this->Text->truncate(
                $applicationDescription->description,
                500,
                [
                    'ellipsis' => '...',
                    'exact' => false,
                    'html' => true
                ]
            );
            ?></td>
            <td><?= h($applicationDescription->awailable_from) ?></td>
            <td><?= h($applicationDescription->awaibale_until) ?></td>
            <td><?= h($applicationDescription->active) ?></td>
            <td><?= h($applicationDescription->created) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $applicationDescription->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $applicationDescription->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $applicationDescription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicationDescription->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
