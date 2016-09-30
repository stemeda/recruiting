<?php
use Cake\Utility\Hash;

?>
<?php echo $this->Form->create($positionDescriptions); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <?php if ($positionDescriptions->multiple): ?>
            <div class="pull-right">
                <span class="btn btn-default btn-xs glyphicon glyphicon-plus" id="addValue" title="Wert hinzufügen"></span>
            </div>
        <?php endif; ?>
        <?= $positionDescriptions->name ?>
    </div>
    <div class="panel-body">
        <?= $this->Form->input('value', ['options' => Hash::combine($positionDescriptions->position_description_values, '{n}.id', '{n}.name'), 'label' => 'Angabe']) ?>
        <?php foreach ($positionDescriptions->position_description_extras as $key => $extra): ?>
            <?php if ($extra->type === 'bool'): ?>
                <?= $this->Form->input('extra.' . $key, ['type' => 'checkbox', 'label' => $extra->name]); ?>
            <?php elseif ($extra->type === 'checkbox'): ?>
                <?= $this->Form->input('extra.' . $key, ['type' => 'select', 'label' => $extra->name, 'options' => Hash::extract(json_decode($extra->settings), '{n}.value')]); ?>
            <?php elseif ($extra->type === 'text'): ?>
                <?= $this->Form->input('extra.' . $key, ['label' => $extra->name]); ?>
            <?php elseif ($extra->type === 'date'): ?>
                <?= $this->Form->input('extra.' . $key, ['type' => 'date', 'label' => $extra->name]); ?>

            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

<?php echo $this->Form->end(); ?>
