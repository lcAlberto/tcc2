@foreach($cios as $cio)
    @foreach ($animals as $animal)
    @endforeach
    <tr>
        @include('animals.flock.cios.partials._body')
    </tr>
@endforeach
