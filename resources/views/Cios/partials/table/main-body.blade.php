@foreach($cios as $cio)
    @foreach ($animals as $animal)
    @endforeach
    <tr>
        @include('Cios.partials.table._body')
    </tr>
@endforeach
