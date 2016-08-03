/**
 * Created by kaleb on 1/26/2016.
 */
(function () {
    var Calculator = {
        init: function () {
            this.form = $('#calculator-form');

            this.submitButton = this.form.find('input[type=submit]');
            this.submitButtonValue = this.submitButton.val();

            this.bindEvents();
        },

        bindEvents: function () {
            this.form.on('submit', $.proxy(this.calcShipping, this));
            $('.close-shipping').click(function () {
                    $(".calculated-amount").removeClass("activated");
                }
            );
        },

        calcShipping: function (event) {
            //Prevent the submit
            event.preventDefault();

            //Gather our info
            var data = this.form.serialize();

            //Save the info as json
            $.ajaxSetup({
                headers: {
                    'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });

            //ajax the calc
            $.ajax({
                    type: 'POST',
                    url: '/calculate',
                    data: data,
                    dataType: 'json',
                    success: function(data){
                        $('.calculated-amount').addClass('activated');
                        $('.fast_amount').text('$'+data.fast);
                        $('.slow_amount').text('$'+data.slow);
                        $('.bigbox_amount').text('$250');
                    },
                    error: function(data){
                        $('.calculated-amount').show();
                        $('.small').text('Could not calculate based on the provided data');
                    }
            }) ;
        },


    };

    Calculator.init();
})();
