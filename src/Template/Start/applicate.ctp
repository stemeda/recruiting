
<?= $this->Form->create($candidate) ?>
<?= $this->Form->hidden('id') ?>
<?= $this->Form->input('candidate.applications.0.positions_id', ['value' => $position->id, 'type' => 'hidden']) ?>
<?= $this->Form->input('firstname') ?>
<?= $this->Form->input('surname') ?>
<?= $this->Form->input('email') ?>
<?= $this->Form->input('candidate.street') ?>
<?= $this->Form->input('candidate.zip') ?>
<?= $this->Form->input('candidate.city') ?>
<?= $this->Form->input('candidate.mobile') ?>
<?= $this->Form->input('candidate.phone') ?>
<?= $this->Form->input('candidate.applications.0.earliest_start', ['type' => 'date']) ?>
<?php foreach ($positionDescriptions as $key => $positionDescription): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php if ($positionDescription->multiple): ?>
                <div class="pull-right">
                    <span class="btn btn-default btn-xs glyphicon glyphicon-plus addPositionDescription" title="Wert hinzufügen" data-count="1" data-id="<?= $positionDescription->id ?>"></span>
                </div>
            <?php endif; ?>
            <?= $positionDescription->name ?>
        </div>
        <div class="panel-body">
            <?= $this->element('position_description_view', ['positionDescription' => $positionDescription, 'number' => $key]) ?>
        </div>
    </div>
<?php endforeach; ?>

<?= $this->Form->button('Speichern') ?>
<?= $this->Form->end() ?>

