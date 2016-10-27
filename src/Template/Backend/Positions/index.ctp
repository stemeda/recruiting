
<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('description'); ?></th>
            <th><?= $this->Paginator->sort('awailable_from'); ?></th>
            <th><?= $this->Paginator->sort('awailable_until'); ?></th>
            <th><?= $this->Paginator->sort('active'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($positions as $positionDescription): ?>
        <tr>
            <td><?= $this->Number->format($positionDescription->id) ?></td>
            <td><?= h($positionDescription->name) ?></td>
            <td><?=
            $this->Text->truncate(
                $positionDescription->description,
                500,
                [
                    'ellipsis' => '...',
                    'exact' => false,
                    'html' => true
                ]
            );
            ?></td>
            <td><?= h($positionDescription->awailable_from) ?></td>
            <td><?= h($positionDescription->awailable_until) ?></td>
            <td><?= h($positionDescription->active) ?></td>
            <td><?= h($positionDescription->created) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'applications', $positionDescription->id], ['title' => 'Bewerbungen', 'class' => 'btn btn-default glyphicon glyphicon-sort-by-attributes-alt']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $positionDescription->id], ['title' => 'Bearbeiten', 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
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
