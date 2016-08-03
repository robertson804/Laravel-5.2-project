(function () {
    var Process = {
        init: function () {
            this.form = $('#process-form');

            this.submitButton = this.form.find('input[type=submit]');
            this.submitButtonValue = this.submitButton.val();

            this.checkConsolidation();
            this.bindEvents();
        },

        bindEvents: function () {
            $('.package-check').on('change', $.proxy(this.checkConsolidation, this));
        },

        checkConsolidation: function (event) {
            //Check if all checkboxes are checked
            if($('.package-check').length == $('.package-check:checked').length){
                console.log('asdf');
                this.form.find(':input').prop('disabled',false);
            }else{
                this.form.find(':input').prop('disabled',true);
            }
        }


    };

    Process.init();
})();
