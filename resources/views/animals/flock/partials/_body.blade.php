<td>
    <img src="<?php echo asset('animals/' . $animal->profile) ?>"
         alt="image"
         width="50"
         height="50"
         class="rounded">
</td>
<td> {{ $animal->id }}</td>
<td> {{$animal->nome }} </td>
<td> {{$animal->dt_nascimento}} </td>
<td>@if ($animal->sexo == 'Fêmea')
        <i class="fa fa-venus"></i>
        <span>F</span>
    @else <i class="fa fa-mars"></i>
        <span>M</span>
    @endif
</td>
<td>{{ $animal->classificacao }}</td>
@if($animal->status == 'ativo')
    <td class="text-success text-uppercase">
        {{ $animal->status }} </td>
@elseif($animal->status == 'morto')
    <td class="text-danger text-uppercase">
        {{ $animal->status }} </td>
@elseif($animal->status == 'vendido')
    <td class="text-warning text-uppercase">
        {{ $animal->status }} </td>
@endif
<td class="btn-group">@include('animals.flock.partials._actionButton')</td>
