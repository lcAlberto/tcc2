<td>
    @foreach($animals as $animal_item)
    @endforeach
    <a href="{{route('animals.show', $healt->animal_id)}}">
        [{{$animal_item->name = \App\Models\Animal::find($healt->animal_id)->code}}] - {{$animal_item->name = \App\Models\Animal::find($healt->animal_id)->name}}
    </a>
</td>
<td> {{$healt->treatment_type}} </td>
<td> {{$healt->start_of_treatment  = date('d/m/Y', strtotime($healt->start_of_treatment))}} </td>
<td> {{$healt->end_of_treatment = date('d/m/Y', strtotime($healt->end_of_treatment))}} </td>
<td> {{$healt->disease}} </td>
<td>
    @foreach($medicaments as $medicament_item)
    @endforeach
    <a href="{{route('medicament.show', $healt->medicament_id)}}">
    {{$medicament_item->name = \App\Models\Medicament::find($healt->medicament_id)->name}}</a>
</td>
<td>
    <div class="dropdown">
        <a class="text-indigo dropdown-toggle"
           type="button" id="animals-options-menu"
           data-toggle="dropdown" aria-haspopup="true"
           aria-expanded="false">
            <i class="fa fa-list"></i>
        </a>
        @include('health.partials.table.buttons')
    </div>
</td>
