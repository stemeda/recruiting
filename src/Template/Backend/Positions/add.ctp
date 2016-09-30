
<?= $this->Form->create($positionDescription); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Position']) ?></legend>
    <?php
    echo $this->Form->input('name');
    echo $this->Form->input('description');
    echo $this->Form->input('awailable_from');
    echo $this->Form->input('awaibale_until');
    echo $this->Form->input('active');
    //echo $this->Form->input('candidate_description_values._ids', ['options' => $candidateDescriptionValues]);
    //echo $this->Form->input('position_description_values._ids', ['options' => $positionDescriptionValues]);
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
