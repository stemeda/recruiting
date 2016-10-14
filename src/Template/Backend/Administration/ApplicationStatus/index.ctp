<?php
/* @var $this \Cake\View\View */
$this->start('tb_actions');
?>
    <li><?= $this->Html->link('Status hinzufügen', ['action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>
    
<?= $this->SearchForm->form('application_status'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('name'); ?></th>
            <th><?= $this->Paginator->sort('closes_application '); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($application_status as $application_status): ?>
        <tr>
            <td><?= $this->Number->format($application_status->id) ?></td>
            <td><?= h($application_status->name) ?></td>
            <td><?= h($application_status->closes_application) ?></td>
            <td><?= h($application_status->created) ?></td>
            <td><?= h($application_status->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $application_status->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $application_status->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $application_status->id], ['confirm' => __('Are you sure you want to delete # {0}?', $application_status->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
