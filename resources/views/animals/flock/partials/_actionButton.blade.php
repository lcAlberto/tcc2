<a class="btn btn-group btn-primary" href="{{ route('flock.show', $item->id) }}">
    <i class="fa fa-eye"></i>
</a>
<a class="btn btn-group btn-success" href="{{ route('flock.edit',  $item->id) }}">
    <i class="fa fa-edit"></i>
</a>
<a class="btn btn-group btn-danger" href="{{ route('flock.destroy',  $item->id) }}">
    <i class="fa fa-eraser"></i>
</a>
@if($item->sexo == 'Fêmea')
    <a class="btn btn-group btn-warning" href="{{ route('cio.create', $item->id) }}">
        <i class="fa fa-venus-mars"></i>
    </a>
@endif