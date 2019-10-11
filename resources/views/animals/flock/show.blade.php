@extends('layouts.app')

@section('content')
    @include('layouts.headers.flock-card')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-7 float-lg-left">
                                <h3>Status:
                                @if($animal->status == 'ativo')
                                    <h3 class="text-primary">Ativo</h3>
                                @elseif($animal->status == 'vendido')
                                    <h3 class="text-warning">Vendido</h3>
                                @elseif($animal->status == 'morto')
                                    <h3 class="text-danger">Morto</h3>
                                @endif
                                </h3>
                            </div>
                            <div class="col-5 float-lg-right">
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
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-6 float-lg-left">
                                        <ul class="list-group">
                                            @if($animal->status == 'ativo')
                                                <li class="list-group-item active">
                                            @elseif($animal->status == 'vendido')
                                                <li class="list-group-item bg-warning text-white">
                                            @elseif($animal->status == 'morto')
                                                <li class="list-group-item bg-danger text-white">
                                                    @endif

                                                    ID: <strong> {{ $animal->id }} </strong>
                                                    @if($animal->sexo == 'Fêmea')
                                                        <strong class="ml-3">
                                                            <i class="fa fa-mars"></i>
                                                            {{$animal->sexo}}
                                                        </strong>
                                                    @elseif($animal->sexo == 'Macho')
                                                        <strong class="ml-3"><i class="fa fa-male"></i></strong>
                                                    @endif
                                                    <a href="{{ route('flock.edit', $animal->id) }}"
                                                       class="text-white float-right">
                                                        <i class="fa fa-edit"></i> Editar
                                                    </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <img src="{{ asset('animals/' . $animal->profile) }}"
                                                         alt="image" width="500" height="auto" class="img-thumbnail">
                                                </li>
                                                {{--                                        <div class="form-group">--}}
                                                {{--                                        </div>--}}
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 float-lg-right">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                Nome:
                                                <strong>{{ $animal->nome }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                Idade:
                                                <strong>{{ $animal->idade }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                Data de Nascimento:
                                                <strong>{{ $animal->dt_nascimento }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                Pai:
                                                <strong>{{ $animal->pai }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                Mãe:
                                                <strong>{{ $animal->mae }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                Classificação:
                                                <strong>{{ $animal->classificacao }}</strong>
                                            </li>
                                            <li class="list-group-item">
                                                Raça:
                                                <strong>{{ $animal->raca }}</strong>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            Criado em:
                                            <strong>{{$animal->created_at}}</strong>
                                        </li>
                                        <li class="list-group-item">
                                            Última modificação:
                                            <strong>{{ $animal->updated_at }}</strong>
                                        </li>
                                        <li class="list-group-item">
                                            Criado por:
                                            <strong>{{ $animal->created_by }}</strong>
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
