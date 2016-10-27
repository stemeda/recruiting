<h1>Ihre offenen Bewerbungen</h1>
<?php foreach ($applications as $key => $application): ?>
    <div class="panel panel-default">
        <div class="panel-heading">Stelle: <?= $application->position->name ?></div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>Aktueller Status:</td>
                    <td><?= $application->application_status->name ?></td>
                </tr>
                <tr>
                    <td>Bewerbungsverfahren geschlossen:</td>
                    <td><?= $application->application_status->closes_application ? 'Ja' : 'Nein' ?></td>
                </tr>
            </table>
            <?php if (!$application->application_status->closes_application): ?>
            <br>
            <div class="pull-right">
                <?= $this->Html->link(' Zurückziehen', ['action' => 'cancel', $application->id], ['title' => 'Zurückziehen', 'class' => 'btn btn-default glyphicon glyphicon-remove']) ?>
            </div>

            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>
