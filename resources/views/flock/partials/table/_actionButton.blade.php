<div class="dropdown-menu" aria-label="animals-options-menu">
{{--    <a class="dropdown-item text-primary" href="{{ route('animals.show', $animal->id) }}">--}}
{{--        <span> <i class="fa fa-eye"></i> Ver Detalhes </span>--}}
{{--    </a>--}}
{{--    <a class="dropdown-item text-danger" href="{{ route('animals.show', $animal->id) }}">--}}
{{--        <span> <i class="fa fa-eraser"></i> Excluir </span>--}}
{{--    </a>--}}
    <a class="dropdown-item text-success" href="{{ route('animals.edit',  $animal->id) }}">
        <span> <i class="fa fa-edit"></i> Editar </span>
    </a>
    @if(($animal->sex == 'femeale') && ($animal->class != 'she-calves'))
        <a class="dropdown-item text-warning" href="{{ route('cio.create', $animal->id) }}">
            <span> <i class="fa fa-venus-mars"></i> Ciclo Reprodutivo </span>
        </a>
    @endif
</div>
