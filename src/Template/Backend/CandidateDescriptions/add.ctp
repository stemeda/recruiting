
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
                echo $this->Form->input('candidate_description_values.0.name', ['label' => 'Wert #1', 'required' => false]);
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
                Wert #1
                <?= $this->Form->input('candidate_description_extras.0.settings', ['type' => 'hidden', 'data-currentid' => 0, 'class' => 'extraValueSettings']); ?>
                <div class="row">
                    <div class="col-sm-5">
                        <?= $this->Form->input('candidate_description_extras.0.name', ['required' => false]); ?>
                    </div>
                    <div class="col-sm-5">
                        <?= $this->Form->input('candidate_description_extras.0.type', ['required' => false, 'empty' => 'Bitte wählen', 'data-currentid' => 0, 'class' => 'extraValueSelect', 'options' => ['bool' => 'Wahr/Falsch', 'checkbox' => 'Auswahlbox', 'text' => 'Text', 'date' => 'Datum']]); ?>
                    </div>
                    <div class="col-sm-2">
                        <span class="extraValueSettingButton btn btn-default glyphicon glyphicon-filter disabled" title="Weitere Einstellungen" data-currentid="0"></span>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>

</div>

<?= $this->Form->button('Speichern'); ?>
<?= $this->Form->end() ?>


<?= $this->element('candidate_descriptions_templates')?>