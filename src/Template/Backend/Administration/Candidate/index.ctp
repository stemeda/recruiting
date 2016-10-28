
<?= $this->SearchForm->form('User'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('username', 'Benutzername'); ?></th>
            <th><?= $this->Paginator->sort('firstname', 'Vorname'); ?></th>
            <th><?= $this->Paginator->sort('surname', 'Nachname'); ?></th>
            <th><?= $this->Paginator->sort('email', 'E-Mail'); ?></th>
            <th><?= $this->Paginator->sort('type', 'Typ'); ?></th>
            <th><?= $this->Paginator->sort('created', 'Erstellt am'); ?></th>
            <th><?= $this->Paginator->sort('modified', 'Bearbeitet am'); ?></th>
            <th class="actions"><?= 'Aktionen'; ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($user as $user): ?>
        <tr>
            <td><?= $this->Number->format($user->id) ?></td>
            <td><?= h($user->username) ?></td>
            <td><?= h($user->firstname) ?></td>
            <td><?= h($user->surname) ?></td>
            <td><?= h($user->email) ?></td>
            <td><?= h($user->type) ?></td>
            <td><?= h($user->created) ?></td>
            <td><?= h($user->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $user->id], ['title' => 'Ansehen', 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . 'Zurück') ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next('Vor' . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>