App.Components.CandidateDescriptionsViewComponent = Frontend.Component.extend({
    startup: function () {
        $('.addCandidateDescription').off('click').on('click', function () {
            $this = $(this);
            var count = $('.counterForCandidateDesciptions').length;
            $this.data('count', count + 1);
            var url = {
                controller: 'Ajax',
                action: 'load_candidate_description_view',
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