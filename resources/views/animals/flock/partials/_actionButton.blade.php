<a class="btn btn-group btn-primary" href="{{ route('flock.show', $animal->id) }}">
    <i class="fa fa-eye"></i>
</a>
<a class="btn btn-group btn-success" href="{{ route('flock.edit',  $animal->id) }}">
    <i class="fa fa-edit"></i>
</a>
<a class="btn btn-group btn-danger" href="{{ route('flock.destroy',  $animal->id) }}">
    <i class="fa fa-eraser"></i>
</a>
@if($animal->sexo == 'Fêmea')
    <a class="btn btn-group btn-warning" href="{{ route('cio.create', $animal->id) }}">
        <i class="fa fa-venus-mars"></i>
    </a>
@endif
