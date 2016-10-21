App.Components.ApplicationDescriptionsViewComponent = Frontend.Component.extend({
    startup: function () {
        $('.addApplicationDescription').off('click').on('click', function () {
            $this = $(this);
            var count = $('.counterForApplicationDesciptions').length;
            $this.data('count', count + 1);
            var url = {
                controller: 'Ajax',
                action: 'load_application_description_view',
                pass: [
                    $this.data('id'),
                    count
                ]
            }

            // create a custom AJAX request with the user input included in the post-data
            App.Main.loadJsonAction(url, {
                onComplete: function (response, options) {
                    $body = $this.closest('.panel').find('.panel-body');
                    $body.append(options.data.html);
                }
            });
        });
    }
});