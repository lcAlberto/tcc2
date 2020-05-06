<div class="card">
    <div class="card-header">
        Fazendas
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush table-bordered">
            <thead class="thead-light text-center">
            <tr>
                <td>ID</td>
                <td>Nome Da Fazenda</td>
                <td>Cidade</td>
                <td>UF</td>
                <td>Criação</td>
                <td>Última edição</td>
            </tr>
            </thead>
{{--            @include('layouts.modals.destroyFarm')--}}
            <tbody>
            <tr>
                <th>{{$farm->id}}</th>
                <th>{{$farm->name}}</th>
                <th>{{$farm->city}}</th>
                <th>{{$farm->state}}</th>
                <th>{{$farm->created_at}}</th>
                <th>{{$farm->updated_at}}</th>
                {{--                    @endif--}}
            </tr>
            {{--            @endforeach--}}
            </thead>
        </table>
    </div>
</div>
