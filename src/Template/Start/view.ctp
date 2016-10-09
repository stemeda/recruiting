<div class="panel panel-default">
    <div class="panel-heading">Stelle: <b><?= $position->name ?></b></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6"><b>Verfügbar seit</b>: <?= $position->awailable_from ?></div>
                <div class="col-sm-6"><b>Verfügbar bis</b>: <?= $position->awailable_until ?></div>
            </div>
            <b>Beschreibung</b>:<br/>
            <?=$position->description?>
            <br/>
            <div class="pull-right">
                <?= $this->Html->link(' Bewerben', ['action' => 'applicate', $position->id], ['title' => 'Bewerben', 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
            </div>
        </div>
    </div>