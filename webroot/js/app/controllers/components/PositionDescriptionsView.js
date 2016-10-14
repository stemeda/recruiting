App.Components.PositionDescriptionsViewComponent = Frontend.Component.extend({
    startup: function () {
        $('.addPositionDescription').off('click').on('click', function () {
            $this = $(this);
            var count = $('.counterForPositionDesciptions').length;
            $this.data('count', count + 1);
            var url = {
                controller: 'Ajax',
                action: 'load_position_description_view',
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