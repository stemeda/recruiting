<?php
use Cake\Utility\Hash;

?>

<?= $this->Form->input('value.' . $number, ['options' => Hash::combine($positionDescription->position_description_values, '{n}.id', '{n}.name'), 'label' => 'Angabe']) ?>
<?php foreach ($positionDescription->position_description_extras as $key => $extra): ?>
    <?php if ($extra->type === 'bool'): ?>
        <?= $this->Form->input('extra.' . $number . '.' . $key, ['type' => 'checkbox', 'label' => $extra->name]); ?>
    <?php elseif ($extra->type === 'checkbox'): ?>
        <?= $this->Form->input('extra.' . $number . '.' . $key, ['type' => 'select', 'label' => $extra->name, 'options' => Hash::extract(json_decode($extra->settings), '{n}.value')]); ?>
    <?php elseif ($extra->type === 'text'): ?>
        <?= $this->Form->input('extra.' . $number . '.' . $key, ['label' => $extra->name]); ?>
    <?php elseif ($extra->type === 'date'): ?>
        <?= $this->Form->input('extra.' . $number . '.' . $key, ['type' => 'date', 'label' => $extra->name]); ?>

    <?php endif; ?>
<?php endforeach; ?>