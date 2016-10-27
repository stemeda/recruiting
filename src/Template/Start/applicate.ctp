
<?= $this->Form->create($candidate, ['type' => 'file', 'novalidate' => true]) ?>
<?= $this->Form->hidden('id') ?>
<?= $this->Form->input('candidate.applications.0.positions_id', ['value' => $position->id, 'type' => 'hidden']) ?>
<?= $this->Form->input('firstname', ['label' => 'Vorname']) ?>
<?= $this->Form->input('surname', ['label' => 'Nachname']) ?>
<?= $this->Form->input('email', ['label' => 'E-Mail']) ?>
<?= $this->Form->input('candidate.street', ['label' => 'Straße']) ?>
<?= $this->Form->input('candidate.zip', ['label' => 'PLZ']) ?>
<?= $this->Form->input('candidate.city', ['label' => 'Ort']) ?>
<?= $this->Form->input('candidate.mobile', ['label' => 'Mobiltelefon']) ?>
<?= $this->Form->input('candidate.phone', ['label' => 'Festnetz']) ?>
<?= $this->Form->input('candidate.applications.0.earliest_start', ['type' => 'text', 'label' => 'Frühester Start am', 'class' => 'addDatePicker']) ?>
<?= $this->Form->input('candidate.applications.0.minimal_pay', ['type' => 'text', 'label' => 'Mindestgehalt in € pro Jahr']) ?>

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
            $found = false;
            foreach ($candidate->candidate->candidates_candidate_description_values as $existingCandidatesCandidateDescriptionValue) {
                $existingId = $existingCandidatesCandidateDescriptionValue->candidate_description_value->candidate_description->id;
                $currentId = $candidateDescription->id;
                if ($existingId === $currentId) {
                    echo $this->element('candidate_description_view', ['candidateDescription' => $candidateDescription, 'number' => $key, 'existing' => $existingCandidatesCandidateDescriptionValue]);
                    $found = true;
                }
            }
            if (!$found) {
                echo $this->element('candidate_description_view', ['candidateDescription' => $candidateDescription, 'number' => $key]);
            }
            ?>
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

 <script type="text/javascript">
     $(function () {
         $('.addDatePicker').datetimepicker({
             format: 'DD.MM.YYYY'
         });
     });
 </script>
