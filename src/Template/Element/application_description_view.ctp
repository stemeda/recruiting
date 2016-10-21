<?php
use Cake\Utility\Hash;

?>

<?= $this->Form->input('candidate.applications.0.applications_application_description_values.' . $number . '.applications_description_values_id', ['empty' => 'Wenn vorhanden, bitte wählen', 'options' => Hash::combine($applicationDescription->application_description_values, '{n}.id', '{n}.name'), 'label' => 'Angabe']) ?>
<?php foreach ($applicationDescription->application_description_extras as $key => $extra): ?>
    <?= $this->Form->input('candidate.applications.0.applications_application_description_values.' . $number . '.appls_pos_des_values_pos_des_extras.' . $key . '.application_description_extras_id', ['type' => 'hidden', 'value' => $extra->id]) ?>
    <?php if ($extra->type === 'bool'): ?>
        <?= $this->Form->input('candidate.applications.0.applications_application_description_values.' . $number . '.appls_pos_des_values_pos_des_extras.' . $key . '.value', ['type' => 'checkbox', 'label' => $extra->name]); ?>
    <?php elseif ($extra->type === 'checkbox'): ?>
        <?= $this->Form->input('candidate.applications.0.applications_application_description_values.' . $number . '.appls_pos_des_values_pos_des_extras.' . $key . '.value', ['empty' => 'Wenn vorhanden, bitte wählen', 'type' => 'select', 'label' => $extra->name, 'options' => Hash::extract(json_decode($extra->settings), '{n}.value')]); ?>
    <?php elseif ($extra->type === 'text'): ?>
        <?= $this->Form->input('candidate.applications.0.applications_application_description_values.' . $number . '.appls_pos_des_values_pos_des_extras.' . $key . '.value', ['label' => $extra->name]); ?>
    <?php elseif ($extra->type === 'date'): ?>
        <?= $this->Form->input('candidate.applications.0.applications_application_description_values.' . $number . '.appls_pos_des_values_pos_des_extras.' . $key . '.value', ['type' => 'date', 'label' => $extra->name]); ?>
    <?php endif; ?>
<?php endforeach; ?>
<span class="hidden counterForApplicationDesciptions" />