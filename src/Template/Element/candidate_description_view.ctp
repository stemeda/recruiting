<?php

use Cake\Utility\Hash;

?>

<?= $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.candidate_description_values_id', ['empty' => 'Wenn vorhanden, bitte wählen', 'options' => Hash::combine($candidateDescription->candidate_description_values, '{n}.id', '{n}.name'), 'label' => 'Angabe']) ?>
<?php foreach ($candidateDescription->candidate_description_extras as $key => $extra): ?>
    <?= $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.candidate_description_extras_id', ['type' => 'hidden', 'value' => $extra->id]) ?>
    <?php if ($extra->type === 'bool'): ?>
        <?= $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.value', ['type' => 'checkbox', 'label' => $extra->name]); ?>
    <?php elseif ($extra->type === 'checkbox'): ?>
        <?= $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.value', ['empty' => 'Wenn vorhanden, bitte wählen', 'type' => 'select', 'label' => $extra->name, 'options' => Hash::extract(json_decode($extra->settings), '{n}.value')]); ?>
    <?php elseif ($extra->type === 'text'): ?>
        <?= $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.value', ['label' => $extra->name]); ?>
    <?php elseif ($extra->type === 'date'): ?>
        <?= $this->Form->input('candidate.candidates_candidate_description_values.' . $number . '.cans_can_des_values_can_des_extras.' . $key . '.value', ['label' => $extra->name, 'class' => 'addDatePicker']); ?>

        <script type="text/javascript">
            $(function () {
                $('.addDatePicker').datetimepicker({
                    format: 'DD.MM.YYYY'
                });
            });
        </script>
    <?php endif; ?>
<?php endforeach; ?>
<span class="hidden counterForCandidateDesciptions" />