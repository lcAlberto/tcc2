<a class="btn btn-group btn-primary" href="{{ route('flock.show', $animal->id) }}">
    <i class="fa fa-eye"></i>
</a>
<a class="btn btn-group btn-success" href="{{ route('flock.edit',  $animal->id) }}">
    <i class="fa fa-edit"></i>
</a>
{{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">--}}
{{--    <i class="fa fa-eraser"></i>--}}
{{--</button>--}}
@if($animal->sexo == 'Fêmea')
    <a class="btn btn-group btn-warning" href="{{ route('cio.create', $animal->id) }}">
        <i class="fa fa-venus-mars"></i>
    </a>
@endif
