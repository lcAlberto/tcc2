<td>
    <img src="<?php echo asset('animals/' . $item->profile) ?>"
         alt="image"
         width="50"
         height="50"
         class="rounded">
</td>
<td><?php echo $item->id ?></td>
<td><?php echo $item->nome?></td>
<td><?php echo $item->dt_nascimento?></td>
<td>@if ($item->sexo == 'Fêmea')
        <i class="fa fa-venus"></i>
        <span>F</span>
    @else <i class="fa fa-mars"></i>
        <span>M</span>
    @endif
</td>
<td><?php echo $item->classificacao?></td>
<td><a href="#"> <?php echo $item->mother?> </a></td>
<td><a href="#"> <?php echo $item->father?> </a></td>
<td class="btn-group-vertical">@include('animals.flock.partials._actionButton')</td>