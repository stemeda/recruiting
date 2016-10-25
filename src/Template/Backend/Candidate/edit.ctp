
<?= $this->Form->create($applicationDescription); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Application']) ?></legend>
    <?php
    echo $this->Form->input('name');
    echo $this->Form->input('description');
    echo $this->Form->input('awailable_from');
    echo $this->Form->input('awaibale_until');
    echo $this->Form->input('active');
    //echo $this->Form->input('candidate_description_values._ids', ['options' => $candidateDescriptionValues]);
    //echo $this->Form->input('application_description_values._ids', ['options' => $applicationDescriptionValues]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
