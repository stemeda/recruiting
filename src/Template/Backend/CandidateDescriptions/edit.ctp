
<?= $this->Form->create($candidateDescription); ?>
<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#generall" aria-controls="generall" role="tab" data-toggle="tab">Generell</a></li>
        <li role="presentation"><a href="#values" aria-controls="values" role="tab" data-toggle="tab">Mögliche Werte</a></li>
        <li role="presentation"><a href="#extra" aria-controls="extra" role="tab" data-toggle="tab">Extra Felder</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="generall">
            An dieser Stelle kann das Feld benannt werden:
            <fieldset>
                <?php
                echo $this->Form->input('name');
                echo $this->Form->input('multiple');
                ?>
            </fieldset>
        </div>
        <div role="tabpanel" class="tab-pane" id="values">
            <div class="pull-right">
                <span class="btn btn-default glyphicon glyphicon-plus" id="addValue" title="Wert hinzufügen"></span>
            </div>
            <br/>
            An dieser Stelle können mögliche Werte eingetragen werden:
            <fieldset>
                <?php
                foreach ($candidateDescription['candidate_description_values'] as $key => $value) {
                    echo $this->Form->input('candidate_description_values.' . $key . '.name', ['label' => 'Wert #' . ($key + 1), 'required' => false]);
                    echo $this->Form->input('candidate_description_values.' . $key . '.id', ['type' => 'hidden', 'required' => false]);
                }

                ?>
            </fieldset>
        </div>
        <div role="tabpanel" class="tab-pane" id="extra">
            <div class="pull-right">
                <span class="btn btn-default glyphicon glyphicon-plus" id="addExtra" title="Extra hinzufügen"></span>
            </div>
            <br/>
            Sollen zusätzlich weitere Auswahlfelder angezeigt werden?
            <fieldset>
                <?php foreach ($candidateDescription['candidate_description_extras'] as $key => $value): ?>
                    <?=$this->Form->input('candidate_description_extras.' . $key . '.id', ['type' => 'hidden', 'required' => false]);?>
                    Wert #<?= $key + 1 ?>
                    <?= $this->Form->input('candidate_description_extras.' . $key . '.settings', ['type' => 'hidden', 'data-currentid' => $key, 'class' => 'extraValueSettings']); ?>
                    <div class="row">
                        <div class="col-sm-5">
                            <?= $this->Form->input('candidate_description_extras.' . $key . '.name', ['required' => false]); ?>
                        </div>
                        <div class="col-sm-5">
                            <?= $this->Form->input('candidate_description_extras.' . $key . '.type', ['required' => false, 'empty' => 'Bitte wählen', 'data-currentid' => $key, 'class' => 'extraValueSelect', 'options' => ['bool' => 'Wahr/Falsch', 'checkbox' => 'Auswahlbox', 'text' => 'Text', 'date' => 'Datum']]); ?>
                        </div>
                        <div class="col-sm-2">
                            <span class="extraValueSettingButton btn btn-default glyphicon glyphicon-filter <?= $value->type === 'checkbox' ? '' : 'disabled'?>" title="Weitere Einstellungen" data-currentid="<?=$key?>"></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </fieldset>
        </div>
    </div>

</div>

<?= $this->Form->button('Speichern'); ?>
<?= $this->Form->end() ?>

<?= $this->element('candidate_descriptions_templates')?>