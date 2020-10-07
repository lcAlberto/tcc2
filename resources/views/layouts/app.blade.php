<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Procriare') }}</title>
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>--}}

    <!-- Favicon -->
    <link href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{asset('/css/select2-bootstrap.css')}}" rel="stylesheet">

    <!-- select2 -->
{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />--}}
    <link href="{{asset('/css/select2.min.css')}}" rel="stylesheet">
    <!-- datatables -->
{{--    <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">--}}
{{--    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">--}}
{{--    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">--}}
<!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
</head>
<body class="{{ $class ?? '' }}">
@auth()
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @include('layouts.navbars.sidebar')
@endauth

<div class="main-content" id="app">
    @include('layouts.navbars.navbar')
    @yield('content')
</div>

@guest()
    @include('layouts.footers.guest')
@endguest
<script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>--}}
<script src="{{ asset('/js/jquery.min.js' )}}"></script>
<script src="{{ asset('/js/jquery.mask.min.js' )}}"></script>
<script src="{{ asset('/js/masks.js' )}}"></script>
{{--<script src="https://www.geradordecep.com.br/assets/js/jquery-1.2.6.pack.js" type="text/javascript"></script>--}}
{{--<script src="https://www.geradordecep.com.br/assets/js/jquery.maskedinput-1.1.4.pack.js" type="text/javascript"></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>--}}
<script src="{{ asset('/js/cep.js') }}"></script>
<script src="{{asset('js/select2.min.js')}}" type="text/javascript"></script>
<!-- Datatables -->
{{--<script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>--}}

@stack('js')

<!-- Argon JS -->
<script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
<script src="https://kit.fontawesome.com/64ad3789c4.js" crossorigin="anonymous"></script>

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>--}}

<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
{{--<script src="https://cdn.jsdelivr.net/npm/vue"></script>--}}


<script type="text/javascript">
    $(document).ready(function() {
        $("#medicament_id").select2({
            theme: "bootstrap"
        });
        $.fn.select2.defaults.set( "theme", "bootstrap" );
        $("#touro_id").select2({
            theme: "bootstrap"
        });
        $.fn.select2.defaults.set( "theme", "bootstrap" );
        $("#animal_id").select2({
            theme: "bootstrap"
        });
        $.fn.select2.defaults.set( "theme", "bootstrap" );
        $("#father").select2({
            theme: "bootstrap"
        });
        $.fn.select2.defaults.set( "theme", "bootstrap" );
        $("#mother").select2({
            theme: "bootstrap"
        });
        $.fn.select2.defaults.set( "theme", "bootstrap" );

    });
</script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            message: 'Olá Vue!'
        }
    })
</script>
</body>
</html>
