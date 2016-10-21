
<script type="text/html" id="tmpl-addValue">
    <div class="form-group text">
        <label class="control-label" for="candidate-description-values-{%=o.current%}-name">
            Wert #{%=(o.current+1)%}
        </label>
        <input id="candidate-description-values-{%=o.current%}-name" class="form-control" name="candidate_description_values[{%=o.current%}][name]" maxlength="255" type="text">
    </div>
</script>

<script type="text/html" id="tmpl-addExtra">
    Wert #{%=(o.current+1)%}
    <input id="candidate-description-extras-{%=o.current%}-settings" name="candidate_description_extras[{%=o.current%}][settings]" type="hidden">
    <div class="row">
        <div class="col-sm-5">
            <div class="form-group text">
                <label class="control-label" for="candidate-description-extras-{%=o.current%}-name">Name</label>
                <input id="candidate-description-extras-{%=o.current%}-name" class="form-control" name="candidate_description_extras[{%=o.current%}][name]" maxlength="255" type="text">
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group text">
                <label class="control-label" for="candidate-description-extras-{%=o.current%}-type">Type</label>
                <select id="candidate-description-extras-{%=o.current%}-type" class="extraValueSelect form-control" name="candidate_description_extras[{%=o.current%}][type]" data-currentid="{%=o.current%}">
                    <option value="">Bitte wählen</option>
                    <option value="bool">Wahr/Falsch</option>
                    <option value="checkbox">Auswahlbox</option>
                    <option value="text">Text</option>
                    <option value="date">Datum</option>
                </select>
            </div>
        </div>
        <div class="col-sm-2">
            <span class="extraValueSettingButton btn btn-default glyphicon glyphicon-filter disabled" title="Weitere Einstellungen" data-currentid="{%=o.current%}"></span>
        </div>
    </div>
</script>

<script type="text/html" id="tmpl-modalOptionSettings">
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Optionswerte</h4>
                </div>
                <div class="modal-body">
                    <div class="pull-right">
                        <span class="btn btn-default glyphicon glyphicon-plus" id="addExtraValue" title="Extra hinzufügen"></span>
                    </div>
                    <br/>
                    <form name="extraSettingsValues">
                        {% if (o.existringSettings.length > 0) { %}
                            {% for (var i=0; i<o.existringSettings.length; i++) { %}
                                {% include('tmpl-modalOptionSettingsValue', {current: i, value: o.existringSettings[i].value}); %}
                            {% } %}
                        {% } else { %}
                            {% include('tmpl-modalOptionSettingsValue', {current: 0, value: ""}); %}
                        {% } %}

                    </form>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</script>

<script type="text/html" id="tmpl-modalOptionSettingsValue">
    <label class="control-label" for="extra-setting-{%=o.current%}">
        Wert #{%=(o.current+1)%}
    </label>
    <input id="extra-setting-{%=o.current%}" class="form-control" name="value" value="{%=o.value%}" maxlength="255" type="text">
</script>