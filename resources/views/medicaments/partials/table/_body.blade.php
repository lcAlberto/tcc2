<td>
    <img src="{{asset('medicaments/'. $medicaments->thumbnail)}}" class="rounded" width="50" height="50">
</td>
<td>{{$medicaments->name}}</td>
<td>{{$medicaments->grace_period_beef}}</td>
<td>{{$medicaments->grace_period_dairy}}</td>
<td>
    <a href="{{ route('medicament.loadFlyer', $medicaments->id) }}" class="btn btn-outline-danger" target="_blank">
        <i class="fa fa-file-pdf"></i>
    </a>
</td>
<td>
    <a href="{{ route('medicament.show', $medicaments->id) }}" class="btn btn-primary">
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('medicament.edit', $medicaments->id) }}" class="btn btn-success">
        <i class="fa fa-pencil-alt"></i>
    </a>
</td>
