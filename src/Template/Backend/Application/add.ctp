
<?= $this->Form->create($application); ?>
<fieldset
    <legend><?= __('Add {0}', ['Application']) ?></legend>
    <?= $this->Form->input('name'); ?>
    <?= $this->Form->textarea('description'); ?>
    <?= $this->Form->input('awailable_from'); ?>
    <?= $this->Form->input('awailable_until'); ?>
    <?= $this->Form->input('active'); ?>
    Applicationsbeschreibungen:
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <?php foreach ($applicationDescription as $key => $description): ?>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingApplicationDescriptions<?=$key?>">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseApplicationDescriptions<?=$key?>" aria-expanded="true" aria-controls="collapseApplicationDescriptions<?=$key?>">
                        <?=$description->name?>
                    </a>
                </h4>
            </div>
            <div id="collapseApplicationDescriptions<?=$key?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingApplicationDescriptions<?=$key?>">
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
                        <?php foreach ($description->application_description_values as $valueKey => $value): ?>
                            <?=$this->Form->input('applications_position_description_values.' . $value->id . '.applications_description_values_id', ['value' => $value->id, 'type' => 'hidden'])?>
                            <tr>
                                <td><?=$value->name?></td>
                                <td><?=$this->Form->checkbox('applications_position_description_values.' . $value->id . '.needed');?></td>
                                <td><?=$this->Form->input('applications_position_description_values.' . $value->id . '.importance', ['type' => 'number', 'min' => 0, 'max' => 100, 'step' => 1, 'value' => 0, 'label' => false]);?></td>
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
