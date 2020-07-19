@extends('layouts.app')

@section('content')
    @include('health.header')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card">
                        <div class="card-header">
                            <div class="align-items-sm-center">
                                <div class="float-md-right float-lg-right col-sm-6">
                                    {{--                                    <a href="{{route('health.destroy', $health->id)}}"--}}
                                    {{--                                       class="btn btn-danger col-sm-6">--}}
                                    {{--                                        Excluir este tratamento--}}
                                    {{--                                        <i class="fa fa-eraser mr-2"></i>--}}
                                    {{--                                    </a>--}}
                                    <a href="{{ route('health.edit', $health->id) }}"
                                       class="btn btn-success col-sm-5 float-lg-right">
                                        <i class="fa fa-edit mr-2"></i>Editar
                                    </a>
                                </div>
                                <div class="float-md-left float-lg-right col-sm-6">
                                    <a href="{{ URL::previous() }}"
                                       class="btn btn-outline-primary col-sm-3">
                                        <i class="fa fa-chevron-left"></i>
                                        Voltar
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm">
                                    <ul class="list-group">
                                        <li class="list-group-item bg-gradient-indigo text-white">
                                            Detalhes do Tratamento
                                            <a href="{{route('health.destroy', $health->id)}}"
                                               class="btn btn-sm btn-danger float-right">
                                                <i class="fa fa-eraser mr-2"></i>
                                                Excluir
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            Animal:
                                            <strong> [{{ $animal->code }}] - {{ $animal->name }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Tipo:
                                            <strong>
                                                @lang("labels. $health->treatment_type")
                                            </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Data inícial:
                                            <strong>
                                                {{$health->start_of_treatment  = date('d/m/Y', strtotime($health->start_of_treatment))}}
                                            </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Data final:
                                            <strong>
                                                {{$health->end_of_treatment  = date('d/m/Y', strtotime($health->end_of_treatment))}}
                                            </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Doença Tratada
                                            <strong> {{$health->disease}} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Descrição dos sintomas:
                                            <strong>{{$health->symptom}}</strong>
                                        </li>
                                        <li class="list-group-item">
                                            Data dos sintomas:
                                            <strong>{{$health->date_symptom = date('d/m/Y', strtotime($health->date_symptom))}}</strong>
                                        </li>
                                        <li class="list-group-item">
                                            Agente Causador:
                                            <strong>{{$health->causer_agent}}</strong>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-5 col-sm">
                                    <ul class="list-group">
                                        <li class="list-group-item bg-gradient-indigo text-white">
                                            <strong> Medicamento Utilizado </strong>
                                            <a href="{{route('medicament.show', $health->id)}}"
                                               class="text-white float-right">
                                                <i class="fa fa-search mr-2"></i> Consultar
                                            </a>
                                        </li>
                                        @foreach($medicaments as $medicament)
                                        @endforeach
                                        <li class="list-group-item">
                                            Medicamento:
                                            <strong> {{ $medicament->id }} | </strong>
                                            <strong> {{ $medicament->name }} | </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Princípio Ativo:
                                            <strong>
                                                {{$medicament->active_principle}}
                                            </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Período de carência para corte :
                                            <strong> {{$medicament->grace_period_beef}} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Preríodo de carência para lactação
                                            <strong> {{$medicament->grace_period_dairy}} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Bula:
                                            <a href="#"
                                               class="text-danger">
                                                <i class="fa fa-file-pdf ml-2"></i>
                                                {{$medicament->flyer}}
                                            </a>
                                        </li>
                                    </ul>
                                    <div>
                                        <li class="list-group-item">
                                            Imagem do Produto:
                                        </li>
                                        <img src="{{ asset('medicaments/'. $medicament->thumbnail) }}"
                                             alt="image"
                                             width="auto"
                                             height="auto" class="rounded img-thumbnail">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
    {{--    @include('animals.flock.partials.modals.confirmation')--}}
@endsection
