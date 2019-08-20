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
<td>{{$cio->father}}</td>
<td>{{$cio->dt_parto_previsto}}</td>
@if($cio->status == "pendente")
    <td class="bg-yellow text-center">
        <h2><i class="fa fa-clock"></i></h2>
    </td>
@endif
@if($cio->status == "sucesso")
    <td class="bg-sucess text-center">
        <h2><i class="fa fa-check-circle"></i></h2>
    </td>
@endif
@if($cio->status == "falha")
    <td class="bg-danger text-center">
        <h2><i class="fa fa-exclamation-triangle"></i></h2>
    </td>
@endif
<td>{{$cio->dt_parto}}</td>
<td class="btn-group-lg">@include('animals.flock.cios.partials._actionButton')</td>