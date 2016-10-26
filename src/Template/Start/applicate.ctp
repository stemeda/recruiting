
<?= $this->Form->create($candidate, ['type' => 'file', 'novalidate' => true]) ?>
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

<?php foreach ($candidateDescriptions as $key => $candidateDescription): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <?php if ($candidateDescription->multiple): ?>
                <div class="pull-right">
                    <span class="btn btn-default btn-xs glyphicon glyphicon-plus addCandidateDescription" title="Wert hinzufügen" data-count="1" data-id="<?= $candidateDescription->id ?>"></span>
                </div>
            <?php endif; ?>
            <?= $candidateDescription->name ?>
        </div>
        <div class="panel-body">
            <?php
            foreach ($candidate->candidate->candidates_candidate_description_values as $candidatesCandidateDescriptionValue) {
                debug($candidatesCandidateDescriptionValue);
                debug($candidateDescription);
            }
            ?>
            <?= $this->element('candidate_description_view', ['candidateDescription' => $candidateDescription, 'number' => $key, 'candidate' => $candidate->candidate]) ?>
        </div>
    </div>
<?php endforeach; ?>

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

<?php
echo $this->element(
    'Attachments.attachmentList',
    [
        'entity' => null
    ]
);
?>

<?= $this->Form->button('Speichern') ?>
<?= $this->Form->end() ?>

