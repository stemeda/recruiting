Frontend.AppController = Frontend.Controller.extend({
    baseComponents: [],
    _initialize: function() {
        this.startup();
    },
    /**
     * If the current request was made via ajax, bind the submit event, make an ajax
     * POST request and update the dialog
     * @return {void}
     */
    openDialog: function (url, onClose, onComplete) {
        if (onComplete === void 0) {
            onComplete = function() {};
        }

        this._dialog = new Frontend.Dialog({
            onClose: onClose
        });
        this._dialog.blockUi();
        App.Main.loadJsonAction(url, {
            parentController: this,
            dialog: this._dialog,
            target: this._dialog.getContent(),
            onComplete: function () {
                this._dialog.show();
                this._dialog.unblockUi();
                onComplete();
            }.bind(this)
        });
    },
});