@foreach($cios as $cio)
    @foreach ($animals as $animal)
    @endforeach
    <tr>
        @include('cios.partials.table._body')
    </tr>
@endforeach
