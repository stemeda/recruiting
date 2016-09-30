App.Components.PositionDescriptionsComponent = Frontend.Component.extend({
    startup: function () {
        var extraValueSettingsSetter;
        extraValueSettingsSetter = function () {
            $('.extraValueSettingButton').off('click')
                    .on('click', function () {
                        if ($(this).hasClass('disabled')) {
                            return;
                        }
                        var currentId = $(this).data('currentid');
                        var settings = {};
                        try {
                            settings = jQuery.parseJSON($('input[name="position_description_extras[' + currentId + '][settings]"]').val());
                        } catch (e) {
                            ;
                        }
                        var templateData = {
                            'existringSettings': settings
                        };
                        var modalText = tmpl('tmpl-modalOptionSettings', templateData);
                        $modal = $(modalText);
                        $modal.find('#addExtraValue')
                                .off('click')
                                .on('click', function () {
                                    var valueCurrent = $modal.find('input').length;
                                    var template = tmpl('tmpl-modalOptionSettingsValue', {'current': valueCurrent, value: ''});
                                    $modal.find('form[name="extraSettingsValues"]').append(template);
                                });
                        $modal.on('hidden.bs.modal', function (e) {
                            $('body').removeClass('modal-open');
                            $('.modal-backdrop').remove();
                            var form = $(this).find('form[name="extraSettingsValues"]').serializeArray();
                            $('input[name="position_description_extras[' + currentId + '][settings]"]').val(JSON.stringify(form));

                        });
                        $modal.modal('show');
                    });
            $('.extraValueSelect').off('change')
                    .on('change', function () {
                        var enableSettings = ['checkbox'];
                        if (jQuery.inArray($(this).val(), enableSettings) !== -1) {
                            $('.extraValueSettingButton[data-currentid="' + $(this).data('currentid') + '"]').removeClass('disabled');
                        } else {
                            $('.extraValueSettingButton[data-currentid="' + $(this).data('currentid') + '"]').addClass('disabled');
                        }
                    });
        };
        extraValueSettingsSetter();
        $('#addValue').off('click')
                .on('click', function () {
                    var currentValues = $('#values').find('input').not(':hidden').length;
                    var text = tmpl("tmpl-addValue", {'current': currentValues});
                    $('#values').find('fieldset').append(text);
                });
        $('#addExtra').off('click')
                .on('click', function () {
                    var currentValues = $('#extra').find('fieldset').children('div').length;
                    var text = tmpl("tmpl-addExtra", {'current': currentValues});
                    $('#extra').find('fieldset').append(text);
                    extraValueSettingsSetter();
                });
    }
});