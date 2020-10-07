<td>
    <a href="{{ route('animals.show', $animal->id) }}">
        <img src="{{asset('animals/' . $animal->name) }}"
             alt="image"
             width="50"
             height="50"
             class="rounded">
    </a>
</td>
<td> {{ $animal->code }}</td>
<td> {{$animal->name }} </td>
<td> {{$animal->born_date = date('d/m/Y', strtotime($animal->born_date))}} </td>
<td>
    @if ($animal->sex == 'femeale')
        <i class="fa fa-venus text-red"></i>
        <span>F</span>
    @else <i class="fa fa-mars text-blue"></i>
    <span>M</span>
    @endif
</td>
<td>@lang('labels.' .$animal->class)</td>
@if($animal->status == 'alive')
    <td class="text-success text-uppercase">
        @lang("labels.$animal->status")</td>
@elseif($animal->status == 'dead')
    <td class="text-danger text-uppercase">
        @lang("labels.$animal->status")</td>
@elseif($animal->status == 'sold')
    <td class="text-warning text-uppercase">
        @lang("labels.$animal->status")
    </td>
@endif
<td>
    <div class="dropdown">
        <a class="text-indigo dropdown-toggle"
           type="button" id="animals-options-menu"
           data-toggle="dropdown" aria-haspopup="true"
           aria-expanded="false">
            <i class="fa fa-list"></i>
        </a>
        @include('flock.partials.table._actionButton')
    </div>
</td>
