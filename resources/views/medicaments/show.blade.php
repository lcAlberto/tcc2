@extends('layouts.app')

@section('content')
    @include('layouts.headers.medicament.header')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card">
                        <div class="card-header">
                            <div class="align-items-sm-center">
                                <div class="float-md-right float-lg-right col-sm-6">
                                    <a href="{{ URL::previous() }}"
                                       class="btn btn-outline-primary col-sm-3">
                                        <i class="fa fa-chevron-left"></i>
                                        Voltar
                                    </a>
                                    <a href="{{ route('medicament.create') }}"
                                       class="btn btn-primary col-sm-6">
                                        Cadastrar outro
                                        <i class="fa fa-redo"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card">
                                        <div class="card-header text-white bg-gradient-indigo">
                                            {{$medicament->name}}
                                            <a href="{{ route('medicament.edit', $medicament->id) }}"
                                               class="text-white float-right">
                                                <i class="fa fa-edit"></i> Editar
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="embed-responsive-item">
                                                @if(isset($medicament->thumbnail))
                                                    <img src="{{ asset('medicaments/'. $medicament->thumbnail) }}"
                                                         alt="image"
                                                         width="auto"
                                                         height="auto" class="rounded img-thumbnail">
                                                @else
                                                    <img src="{{asset('cow-default.png')}}" alt="image" width="500"
                                                         height="auto">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-sm">
                                    <ul class="list-group">
                                        <li class="list-group-item bg-gradient-indigo text-white">
                                            ID do Medicamento: <strong> {{$medicament->id}} </strong>
                                            <a href="{{route('medicament.destroy', $medicament->id)}}"
                                               class="text-white float-right">
                                                <i class="fa fa-eraser mr-2"></i> Excluir
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            Medicamento:
                                            <strong> {{ $medicament->id }} | </strong>
                                            <strong> {{ $medicament->name }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Data de nascimento:
                                            <strong>
                                                {{ $medicament->active_principle }}
                                            </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Período de carência para corte :
                                            <strong> {{ $medicament->grace_period_beef }} </strong>
                                        </li>
                                        <li class="list-group-item">
                                            Preríodo de carência para lactação
                                            <strong> {{ $medicament->grace_period_dairy }}</strong>
                                        </li>
                                        <li class="list-group-item">
                                            Bula:
                                            <a href="{{ asset('flyer/'.$medicament->flyer) }}"
                                               class="text-danger" target="_blank">
                                                <i class="fa fa-file-pdf ml-2"></i> {{ $medicament->flyer }}
                                            </a>
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
    {{--    @include('animals.flock.partials.modals.confirmation')--}}
@endsection
