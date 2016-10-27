App.Controllers.CandidateRegisterController = Frontend.AppController.extend({
    startup: function() {
        $('#dataSecurityButtom').off('click').on('click', function() {
            var url = {
                controller: 'Candidate',
                action: 'datasecurity'
            };
            this.openDialog(url);
        }.bind(this))
    }
});