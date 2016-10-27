
<?= $this->SearchForm->form('PositionDescriptions'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('multiple', 'Mehrfachauswahl'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($positionDescriptions as $positionDescription): ?>
        <tr>
            <td><?= $this->Number->format($positionDescription->id) ?></td>
            <td><?= h($positionDescription->name) ?></td>
            <td><?= h($positionDescription->multiple) ?></td>
            <td><?= h($positionDescription->created) ?></td>
            <td><?= h($positionDescription->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $positionDescription->id], ['title' => 'Anzeige', 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $positionDescription->id], ['title' => 'Bearbeiten', 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <!--<?= $this->Form->postLink('', ['action' => 'delete', $positionDescription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $positionDescription->id), 'title' => 'Löschen', 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>-->
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
