<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Procriare') }}</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <!-- Favicon -->
    <link href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <!-- datatables -->
    <link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css" rel="stylesheet">
{{--    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">--}}
<!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
</head>
<body>
<h1>Este é um relatório de todos os seus animais de sua fazenda.</h1>
<p>
    Com esse arquivo, você pode ter os dados de seu
    rebanho em papel impresso
</p>
<h2>Conferindo...</h2>
<table border="0.1">
    <thead>
    <tr>
        <th class="text-danger">  ID  </th>
        <th>Nome</th>
        <th>Nascimento</th>
        <th>Sexo</th>
        <th>Classisficação</th>
        <th>Status</th>
    </tr>
    @foreach ($animals as $animal)
        @if($animal->farm_id == $farm_item->auth_user)
            <tr>
                <td> {{ $animal->id }} </td>
                <td> {{$animal->name }} </td>
                <td> {{$animal->born_date }} </td>
                <td> {{ $animal->sex == 'femeale' ? 'Femea' : 'Macho' }} </td>
                <td> @if($animal->class == 'cow-lactating')
                        Lactante
                    @elseif($animal->class == 'cow-non-lactating')
                        Não Lactante
                    @elseif($animal->class == 'cow-dry')
                        Seca
                    @elseif($animal->class == 'heifer')
                        Novilha
                    @elseif($animal->class == 'she-calves')
                        Bezerra
                    @elseif($animal->class == 'he-calves')
                        Bezerro
                    @elseif($animal->class == 'bull-reproductive')
                        Touro
                    @elseif($animal->class == 'bull-castrated')
                        Capão/Castrado
                    @elseif($animal->class == 'bull-ruffian')
                        Rufião
                    @endif </td>
                <td>
                    @if($animal->status == 'alive')
                        <strong class="text-primary">Vivo</strong>
                    @elseif($animal->status == 'dead')
                        <strong class="text-warning">Morto</strong>
                    @elseif($animal->status == 'sold')
                        <strong class="text-warning">Vendido</strong>
                    @endif
                </td>
            </tr>
        @endif
    @endforeach
    </thead>
</table>
</body>
</html>
