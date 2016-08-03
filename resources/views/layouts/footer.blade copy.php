<footer>
    <div id="btm_ftr">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-xs-12">

                    <ul id="menu-footer" class="pull-left">
                        <li>
                            <a href="{{ url('/terms-and-conditions') }}">{{ trans('general.tos') }}</a>
                            <span>|</span>
                            <a href="{{ url('/faq') }}">{{ trans('general.faq') }}</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6 col-xs-12">
                    <ul class="payment">
                        <li class="visa"></li>
                        <li class="mastercard"></li>
                        <li class="amex"></li>
                        <li class="paypal"></li>
                        <li class="discover"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-12 footer">
                    <img src="/images/shpr_logo.png" alt="Post Shipper"/>
                </div>

                <div class="col-xs-12 mid-footer">
                    <ul class="social">
                        <li><a class="icon-instagram" href="https://www.instagram.com/postshipper/" target="_blank"></a>
                        </li>
                        <li><a class="icon-twitter" href="https://twitter.com/postshipper" target="_blank"></a></li>
                        <li><a class="icon-pinterest" href="https://www.pinterest.com/postshipper/" target="_blank"></a>
                        </li>
                        <li><a class="icon-facebook" href="https://www.facebook.com/postshipperar" target="_blank"></a>
                        </li>
                    </ul>
                    <p>{{ trans('general.copy',['year' => date('Y')]) }}</p>
                </div>
            </div>
        </div>
    </div>

</footer>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="/js/sweetalert.min.js"></script>
<script type="text/javascript" src="/js/moment.min.js"></script>
<script type="text/javascript" src="/js/pikaday.js"></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="//cdn.rawgit.com/noelboss/featherlight/1.3.5/release/featherlight.min.js" type="text/javascript"
        charset="utf-8"></script>
<script>
    $(document).ready(function () {
        var filterByDate = function (column, startDate, endDate) {
            // Custom filter syntax requires pushing the new filter to the global filter array
            $.fn.dataTable.ext.search.push(
                    function (oSettings, aData, iDataIndex) {
                        var min = parseInt($('.min').data('min'), 10);
                        var age = parseFloat(aData[8]) || 0; // use data for the age column

                        if (( isNaN(min)  ) ||
                                ( min <= age )) {
                            return true;
                        }
                        return false;
                    }
            );
        };

        oTable = $('.datatable').DataTable();

        $('.column-filters a').click(function () {
            var table = $(this).closest('ul').data('table');
            var col = $(this).data('column')
            var val = $(this).data('filter');
            $.fn.dataTable.ext.search.length = 0;
            if (val == '> 45') {
                filterByDate(45);
                $('#' + table).DataTable().draw();
            }
            else if (val == 'date-sort') {
                $('#' + table)
                        .DataTable()
                        .column(':contains(' + col + ')')
                        .order()
                        .draw()

            }

            else if (val == '*') {
                $('#' + table)
                        .DataTable()
                        .search('')
                        .columns()
                        .search('')
                        .draw()
                ;
            } else {
                $('#' + table)
                        .DataTable()
                        .column(':contains(' + col + ')')
                        .search(val ? '^' + val + '$' : '', true, false)
                        .draw()
                ;
            }
        });
    })
    ;

    var picker = new Pikaday({
        field: document.getElementById('datetimepicker'),
        format: 'Y-MM-DD HH:mm:ss',
        showTime: true,
        showSeconds: false,
        use24Hour: false,
        incrementHourBy: 1,
        incrementMinuteBy: 10,
        incrementSecondBy: 1,
        autoClose: true
    });
    var picker = new Pikaday({
        field: document.getElementById('datepicker'),
        format: 'Y-MM-DD',
        showTime: false
    });
</script>

<script>
    $('.login-button').click(function () {
                $(".login-section").addClass("activated");
            }
    );

    $('.close-login').click(function () {
                $(".login-section").removeClass("activated");
            }
    );

    if ($("li").hasClass("has-error")) {
        $(".login-section").addClass("activated")
    }
    $('.language-switcher').change(function () {
        $(this).submit();
    });
</script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
@yield('footer')

</body>
</html>
