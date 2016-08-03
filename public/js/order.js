/**
 * Created by kaleb on 1/26/2016.
 */
(function () {
    var Order = {
        init: function () {
            this.form = $('#order-form');
            this.form[0].reset();
            this.submitButton = this.form.find('input[type=submit]');
            this.submitButtonValue = this.submitButton.val();
            this.bindEvents();
        },

        bindEvents: function () {
            this.form.on('submit', $.proxy(this.confirm, this));
        },

        confirm: function (event) {
            event.preventDefault();

            var cost = $('input[name=shipping_method]:checked').data('cost');
            var title = $('#confirm_title').val();
            var text = cost + ' ' + $('#confirm_text').val();
            var cancel = $('#confirm_cancel').val();
            var confirm = $('#confirm_button').val();

            swal({
                    title: title,
                    text: text+ "<br><br><b>Confirm</b>",
                    type: "input",
                    html: true,
                    inputType: "checkbox",
                    inputValue: "0",
                    inputLabel: 'Confirm',
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: confirm,
                    cancelButtonText: cancel,
                closeOnConfirm: false,
                    customClass: 'order-alert'
                },
                    $.proxy(this.submit, this)
            )
        },

        submit: function () {
             if($('.order-alert input').is(':checked')){
                 this.form[0].submit();
             }else{
                 swal.showInputError('');
             }
        },

    };

    Order.init();
})();
