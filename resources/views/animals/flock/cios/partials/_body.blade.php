<td>
    <a href="{{route('flock.show', $cio->id_animals)}}">
        {{$cio->id_animals}}
    </a>
</td>
<td>{{$cio->dt_cio}}</td>
<td>{{$cio->dt_cobertura}}</td>
<td>
    @if($cio->tipo == "Inseminaçao")
        IA
    @else
        Natural
    @endif
</td>
<td>{{$cio->pai}}</td>
<td>{{$cio->dt_parto_previsto}}</td>
<td class="text-center">
    @if($cio->status == "pendente")
        <h2><i class="text-warning fa fa-clock"></i><br></h2>
        Pendente
    @endif
    @if($cio->status == "sucesso")
        <h2><i class="text-success fa fa-check-circle"></i><br></h2>
        Sucesso
    @endif
    @if($cio->status == "falha")
        <h2><i class="text-danger fa fa-exclamation-triangle"></i><br></h2>
        Falha
    @endif
</td>
<td>{{$cio->dt_parto}}</td>
<td>
    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle"
                type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
            <i class="fa fa-list"></i>
        </button>
        @include('animals.flock.cios.partials._actionButton')
    </div>
</td>

