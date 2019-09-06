<a class="btn btn-sm btn-white text-primary" href="{{route('cio.show', $cio->id)}}">
    <i class="fa fa-list"></i>
</a>
<a class="btn btn-sm btn-white" href="{{route('cio.edit', $cio->id)}}">
    <i class="fa fa-edit text-success"></i>
</a>
<a class="btn btn-sm btn-white" href="{{route('cio.destroy', $cio->id )}}">
    <i class="fa fa-eraser text-danger"></i>
</a>