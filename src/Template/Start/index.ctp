An dieser Stelle werden alle verfügbaren Stellen aufgelistet.

<?php foreach ($positions as $key => $position): ?>
    <div class="panel panel-default">
        <div class="panel-heading">Stelle <?= $key + 1 ?>: <b><?= $position->name ?></b></div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6"><b>Verfügbar seit</b>: <?= $position->awailable_from ?></div>
                <div class="col-sm-6"><b>Verfügbar bis</b>: <?= $position->awailable_until ?></div>
            </div>
            <b>Beschreibung</b>:<br/>
            <?=
            $this->Text->truncate(
                $position->description,
                500,
                [
                    'ellipsis' => '...',
                    'exact' => false,
                    'html' => true
                ]
            );
            ?>
            <br/>
            <div class="pull-right">
                <?= $this->Html->link(' Ansehen', ['action' => 'view', $position->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php if (count($positions) === 0 ): ?>
    <div class="alert alert-warning" role="alert">Zur Zeit sind keine Stellen verfügbar.</div>
<?php endif; ?>
