<td>
    <img src="<?php echo asset('animals/' . $animal->profile) ?>"
         alt="image"
         width="50"
         height="50"
         class="rounded">
</td>
<td><?php echo $animal->id ?></td>
<td><?php echo $animal->nome?></td>
<td><?php echo $animal->dt_nascimento?></td>
<td>@if ($animal->sexo == 'Fêmea')
        <i class="fa fa-venus"></i>
        <span>F</span>
    @else <i class="fa fa-mars"></i>
        <span>M</span>
    @endif
</td>
<td><?php echo $animal->classificacao?></td>
<td><a href="#"> <?php echo $animal->mother?> </a></td>
<td><a href="#"> <?php echo $animal->father?> </a></td>
<td class="btn-group-vertical">@include('animals.flock.partials._actionButton')</td>
