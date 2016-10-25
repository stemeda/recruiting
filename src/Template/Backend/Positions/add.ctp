
<?= $this->Form->create($position); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Position']) ?></legend>
    <?= $this->Form->input('name'); ?>
    <?= $this->Form->textarea('description'); ?>
    <?= $this->Form->input('awailable_from'); ?>
    <?= $this->Form->input('awailable_until'); ?>
    <?= $this->Form->input('active'); ?>
    Kandidatenbeschreibungen:
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <?php foreach ($candidateDescriptions as $key => $description): ?>
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
                            <?=$this->Form->input('positions_candidate_description_values.' . $value->id . '.candidate_description_values_id', ['value' => $value->id, 'type' => 'hidden'])?>
                            <tr>
                                <td><?=$value->name?></td>
                                <td><?=$this->Form->checkbox('positions_candidate_description_values.' . $value->id . '.needed');?></td>
                                <td><?=$this->Form->input('positions_candidate_description_values.' . $value->id . '.importance', ['type' => 'number', 'min' => 0, 'max' => 100, 'step' => 1, 'value' => 0, 'label' => false]);?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>



    Positionsbeschreibungen:
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <?php foreach ($positionDescriptions as $key => $description): ?>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingPositionDescriptions<?=$key?>">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsePositionDescriptions<?=$key?>" aria-expanded="true" aria-controls="collapsePositionDescriptions<?=$key?>">
                        <?=$description->name?>
                    </a>
                </h4>
            </div>
            <div id="collapsePositionDescriptions<?=$key?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPositionDescriptions<?=$key?>">
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
                        <?php foreach ($description->position_description_values as $valueKey => $value): ?>
                            <?=$this->Form->input('positions_position_description_values.' . $value->id . '.positions_description_values_id', ['value' => $value->id, 'type' => 'hidden'])?>
                            <tr>
                                <td><?=$value->name?></td>
                                <td><?=$this->Form->checkbox('positions_position_description_values.' . $value->id . '.needed');?></td>
                                <td><?=$this->Form->input('positions_position_description_values.' . $value->id . '.importance', ['type' => 'number', 'min' => 0, 'max' => 100, 'step' => 1, 'value' => 0, 'label' => false]);?></td>
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
