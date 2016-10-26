

<h1>Bewerbungen mit erfüllten Bedingungen</h1>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Score</th>
            <th>Status</th>
            <th>Aktionen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($valuesAllNeestedSet as $key => $application): ?>
        <tr>
            <td><?= $application['application']->candidate->user->firstname?> <?= $application['application']->candidate->user->surname?></td>
            <td><?= $application['value']?></td>
            <td><?= $application['application']->application_status->name?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'applicationView', $application['application']->id], ['title' => 'Anzeige', 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h1>Bewerbungen ohne erfüllte Bedingungen</h1>
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Score</th>
            <th>Score</th>
            <th>Status</th>
            <th>Aktionen</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($valuesNotAllNeestedSet as $key => $application): ?>
        <tr>
            <td><?= $application['application']->candidate->user->firstname?> <?= $application['application']->candidate->user->surname?></td>
            <td><?= $application['value']?></td>
            <td><?= $application['application']->application_status->name?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'applicationView', $application['application']->id], ['title' => 'Anzeige', 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
