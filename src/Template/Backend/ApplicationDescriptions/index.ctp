
<?= $this->SearchForm->form('ApplicationDescriptions'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('multiple'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($applicationDescription as $applicationDescription): ?>
        <tr>
            <td><?= $this->Number->format($applicationDescription->id) ?></td>
            <td><?= h($applicationDescription->name) ?></td>
            <td><?= h($applicationDescription->multiple) ?></td>
            <td><?= h($applicationDescription->created) ?></td>
            <td><?= h($applicationDescription->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $applicationDescription->id], ['title' => 'Anzeige', 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $applicationDescription->id], ['title' => 'Bearbeiten', 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <!--<?= $this->Form->postLink('', ['action' => 'delete', $applicationDescription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicationDescription->id), 'title' => 'Löschen', 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>-->
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
