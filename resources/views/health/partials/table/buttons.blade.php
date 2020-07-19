<div class="dropdown-menu" aria-label="animals-options-menu">
    <a class="dropdown-item text-success" href="{{ route('health.edit',  $healt->id) }}">
        <span> <i class="fa fa-edit"></i> Editar </span>
    </a>
    <a class="dropdown-item text-danger" href="{{ route('health.create', $healt->id) }}">
        <span> <i class="fa fa-eraser"></i> Excluir </span>
    </a>
    <a class="dropdown-item text-primary" href="{{ route('health.show', $healt->id) }}">
        <span> <i class="fa fa-eye"></i> Detalhes </span>
    </a>
</div>
