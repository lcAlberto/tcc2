@extends('layouts.app')

@section('content')
    @include('layouts.headers.flock-card')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card">
                        <div class="card-header">
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
                                    <img src="<?php echo asset('animals/' . $cio->profile) ?>"
                                         alt="image"
                                         width="500"
                                         height="auto">
                                    <div class="form-group">
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <ul class="list-group">
                                        <li class="list-group-item active">
                                            Cio Nº: <strong> <?php echo $cio->id ?> </strong>
                                            <a href="{{ route('flock.edit', $cio->id) }}"
                                               class="text-white float-right">
                                                <i class="fa fa-edit"></i> Editar
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            Animal:
                                            <strong> {{ $cio->id_animals }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Data do Cio:
                                            <strong>{{ $cio->dt_cio }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Data da Cobertura:
                                            <strong>{{ $cio->dt_cobertura }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Tipo:
                                            <strong> {{ $cio->tipo }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Pai:
                                            <strong> {{ $cio->father }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Mãe:
                                            <strong> {{ $cio->mother }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Sexo:
                                            <strong> {{ $cio->dt_parto_previsto }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Status:
                                            <strong class="text-warning"> {{ $cio->status }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Data do Parto:
                                                @if($cio->dt_parto == " - ")
                                                    <label class="text-warning">Aguardando...</label>
                                                @endif
                                                {{--{{ $cio->dt_parto }}--}}
                                        </li>
                                        <li class="list-group-item">
                                            Criado em:
                                            <strong> <?php echo $cio->created_at ?> </strong>
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