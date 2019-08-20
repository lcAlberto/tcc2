@extends('layouts.app')

@section('content')
    @include('layouts.headers.flock-card')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card">
                        <div class="card-header">
                            <h3>Detalhes de:</h3><br>
                            <label>Animal Nº</label>
                            <strong> <?php echo $animal->id ?> </strong>
                            <a href="{{ route('flock.create') }}"
                               class="btn btn-primary float-right">
                                Cadastrar outro
                                <i class="fa fa-redo ml-3"></i>
                            </a>
                            <a href="{{ route('flock.index') }}"
                               class="btn btn-outline-primary float-right mr-2">
                                <i class="fa fa-chevron-left mr-2"></i>
                                Voltar
                            </a>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-sm">
                                    <img src="<?php echo asset('animals/' . $animal->profile) ?>"
                                         alt="image"
                                         width="500"
                                         height="auto">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <ul class="list-group">
                                        <li class="list-group-item active">
                                            Animal: <strong> <?php echo $animal->id ?> </strong>
                                            <a href="{{ route('flock.edit', $animal->id) }}"
                                               class="text-white float-right">
                                                <i class="fa fa-edit"></i> Editar
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            ID:
                                            <strong> <?php echo $animal->id ?> </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Nome:
                                            <strong><?php echo $animal->nome ?> </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Idade:
                                            <strong><?php echo $animal->age ?> </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Data de Nascimento:
                                            <strong><?php echo $animal->dt_nascimento ?> </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Pai:
                                            <strong><?php echo $animal->father ?> </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Mãe:
                                            <strong><?php echo $animal->mother ?> </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Sexo:
                                            <strong><?php echo $animal->sexo ?> </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Classificação:
                                            <strong><?php echo $animal->classificacao ?> </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Raça:
                                            <strong><?php echo $animal->raca ?> </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Criado em:
                                            <strong> <?php echo $animal->created_at ?> </strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

@endsection