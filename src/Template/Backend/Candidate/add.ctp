
<?= $this->Form->create($candidate); ?>
<fieldset
    <legend><?= __('Add {0}', ['Candidate']) ?></legend>
    <?= $this->Form->input('name'); ?>
    <?= $this->Form->textarea('description'); ?>
    <?= $this->Form->input('awailable_from'); ?>
    <?= $this->Form->input('awailable_until'); ?>
    <?= $this->Form->input('active'); ?>
    Candidatesbeschreibungen:
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <?php foreach ($candidateDescription as $key => $description): ?>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingCandidateDescriptions<?=$key?>">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseCandidateDescriptions<?=$key?>" aria-expanded="true" aria-controls="collapseCandidateDescriptions<?=$key?>">
                        <?=$description->name?>
                    </a>
                </h4>
            </div>
            <div id="collapseCandidateDescriptions<?=$key?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingCandidateDescriptions<?=$key?>">
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Wert</th>
                                <th>Voraussetzug für die Stelle</th>
                                <th>Wichtigkeit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($description->candidate_description_values as $valueKey => $value): ?>
                            <?=$this->Form->input('candidates_position_description_values.' . $value->id . '.candidates_description_values_id', ['value' => $value->id, 'type' => 'hidden'])?>
                            <tr>
                                <td><?=$value->name?></td>
                                <td><?=$this->Form->checkbox('candidates_position_description_values.' . $value->id . '.needed');?></td>
                                <td><?=$this->Form->input('candidates_position_description_values.' . $value->id . '.importance', ['type' => 'number', 'min' => 0, 'max' => 100, 'step' => 1, 'value' => 0, 'label' => false]);?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
<?= $this->CKEditor->replace('description'); ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>
