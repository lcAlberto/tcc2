@foreach($medicaments as $medicament)
    <option value="{{$medicament->id}}" id="db-option">
        [ {{$medicament->id}} ] - {{$medicament->name}}
    </option>
@endforeach
