<!doctype html>
<html>
<head>

    <script src="{!! url('js/jquery-1.11.1.min.js') !!}"></script>
    <script src="{!! url('js/bootstrap.min.js') !!}"></script>
    <script src="{!! url('js/jquery-ui.min.js') !!}"></script>
    <script src="{!! url('js/datepicker-it.js') !!}"></script>

    <link rel="stylesheet" href="{!! url('css/jquery-ui.css') !!}">
    <link rel="stylesheet" href="{!! url('css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! url('css/style.css') !!}">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <script>
        $(function () {
            $("#datepicker").datepicker({
                regional: 'it',
                 defaultDate: new Date()
            });
        });
        </script>

</head>
<body>
<div class="container">

    <header class="row">

        @include('includes.header')

    </header>

    <div id="main" class="row">

            @yield('content')

    </div>

    <footer class="row">

        @include('includes.footer')

    </footer>

</div>
</body>
</html>
