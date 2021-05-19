<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PIXELS EGYPT</title>

        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <!-- Material Kit CSS -->
        <link href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet" />

    </head>
    <body class="dark-edition ">

        <main>

            @include('admin.partials.sidebar')

            @include('admin.partials.navbar')

            <div class="content">
                <div class="container-fluid">

                    @yield('content')

                </div>
            </div>

            <!-- Footer Started -->

            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="https://www.pixelseg.com">
                                    Pixels Egypt
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        &copy;
                        2021
                        made with <i class="material-icons text-info">favorite</i> by
                        <a href="https://www.pixelseg.com" target="_blank">Pixels IT Team</a> for a better web.
                    </div>
                    <!-- your footer here -->
                </div>
            </footer>
            <!-- Footer Ended last -->


        </main>

        <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
{{--        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>--}}
        <script src="{{asset('admin/js/ajax.js')}}">


        <!--   Core JS Files   -->
        <script src="{{ asset('admin/js/core/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/js/core/popper.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('admin/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>


        <!-- Plugin for the Perfect Scrollbar -->
        <script src="{{ asset('admin/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>

        <!-- Plugin for the momentJs  -->
        <script src="{{ asset('admin/js/plugins/moment.min.js') }}"></script>

        <!--  Plugin for Sweet Alert -->
        <script src="{{ asset('admin/js/plugins/sweetalert2.js') }}"></script>

        <!-- Forms Validations Plugin -->
        <script src="{{ asset('admin/js/plugins/jquery.validate.min.js') }}"></script>

        <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <script src="{{ asset('admin/js/plugins/jquery.bootstrap-wizard.js') }}"></script>

        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="{{ asset('admin/js/plugins/bootstrap-selectpicker.js') }}" ></script>

        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="{{ asset('admin/js/plugins/bootstrap-datetimepicker.min.js') }}"></script>

        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
        <script src="{{ asset('admin/js/plugins/jquery.datatables.min.js') }}"></script>

        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="{{ asset('admin/js/plugins/bootstrap-tagsinput.js') }}"></script>

        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="{{ asset('admin/js/plugins/jasny-bootstrap.min.js') }}"></script>

        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
        <script src="{{ asset('admin/js/plugins/fullcalendar.min.js') }}"></script>

        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        <script src="{{ asset('admin/js/plugins/jquery-jvectormap.js') }}"></script>

        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="{{ asset('admin/js/plugins/nouislider.min.js') }}" ></script>

        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

        <!-- Library for adding dinamically elements -->
        <script src="{{ asset('admin/js/plugins/arrive.min.js') }}"></script>

        <!--  Notifications Plugin    -->
        <script src="{{ asset('admin/js/plugins/bootstrap-notify.js') }}"></script>

        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('admin/js/material-dashboard.min.js') }}" type="text/javascript"></script>


    </body>
</html>
