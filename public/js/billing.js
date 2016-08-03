/**
 * Created by kaleb on 1/18/2016.
 */
(function () {
    var StripeBilling = {
        init: function () {
            this.form = $('#register-form');
            this.submitButton = this.form.find('input[type=submit]');
            this.submitButtonValue = this.submitButton.val();

            var stripekey = $('meta[name="publishable-key"]').attr('content');
            Stripe.setPublishableKey(stripekey);

            this.bindEvents();
        },

        bindEvents: function () {

            this.form.on('submit', $.proxy(this.sendToken, this));

            //Enable the add new billing checkbox func
            $('input[name="enable-billing"]').on('change', $.proxy(this.enable_billing,this));

            //Enable the Copy shipping checkbox
            var add = $('.reg-add');
            var add2 = $('.reg-add2');
            var city = $('.reg-city');
            var state = $('.reg-state');
            var zip = $('.reg-zip');
            var country = $('.reg-country');
            $('.copy-shipping').change(function () {

                if (this.checked) {
                    add.val($('input[name="address"]').val());
                    add2.val($('input[name="address_2"]').val());
                    city.val($('input[name="city"]').val());
                    state.val($('input[name="state"]').val());
                    zip.val($('input[name="postal"]').val());
                    country.val($('#country option:selected').val().toUpperCase());
                } else {
                    add.val('');
                    add2.val('');
                    city.val('');
                    state.val('');
                    zip.val('');
                    country.val('');
                }
            });
        },

        sendToken: function (event) {
            //Only Send to stripe if there is no token
            //  Otherwise, just submit it.
            if (!$('input[name=stripe-token]').val()) {
                this.submitButton.val('One Moment').prop('disabled', true);
                Stripe.createToken(this.form, $.proxy(this.stripeResponseHandler, this));
                event.preventDefault();
            }
        },

        stripeResponseHandler: function (status, response) {

            if (response.error) {
                this.form.find('.payment-errors').show().text(response.error.message);
                return this.submitButton.prop('disabled', false).val(this.submitButtonValue);
            }

            $('<input>', {
                    type: 'hidden',
                    name: 'stripe-token',
                    value: response.id
                }
            ).appendTo(this.form);

            this.form[0].submit();
        },

        enable_billing: function(event) {
            if($('input[name="enable-billing"]').prop('checked')){
                $('.billing-info').removeClass('hidden');
                $('.saved-billing').addClass('hidden');
                $('input[name="stripe-token"]').remove();
            }
        }

    };
    StripeBilling.init();
})();