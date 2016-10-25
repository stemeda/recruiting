
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
        <?php foreach ($candidate as $candidateDescription): ?>
        <tr>
            <td><?= $this->Number->format($candidateDescription->id) ?></td>
            <td><?= h($candidateDescription->name) ?></td>
            <td><?=
            $this->Text->truncate(
                $candidateDescription->description,
                500,
                [
                    'ellipsis' => '...',
                    'exact' => false,
                    'html' => true
                ]
            );
            ?></td>
            <td><?= h($candidateDescription->awailable_from) ?></td>
            <td><?= h($candidateDescription->awaibale_until) ?></td>
            <td><?= h($candidateDescription->active) ?></td>
            <td><?= h($candidateDescription->created) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $candidateDescription->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $candidateDescription->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $candidateDescription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $candidateDescription->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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
