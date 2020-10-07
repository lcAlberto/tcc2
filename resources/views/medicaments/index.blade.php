@extends('layouts.app')

@section('content')
    @include('layouts.headers.medicament.header')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-sm-12 float-left">
                                <h3 class="mb-0">Medicamentos Disponíveis</h3>
                            </div>
                            <div class="col-lg-6 col-12">
                                <form action="{{route('medicament.search')}}" id="pesquisar" method="get" role="search">
                                    {{ csrf_field() }}
                                    <div class="form-group input-group m-0">
                                        <input type="text" class="form-control"
                                               id="search" name="search"
                                               placeholder="Pesquisar" required>
                                        <button type="submit" class="btn btn-outline-light">
                                            <span class="fa fa-search"></span>
                                        </button>
                                        <span class="input-group-btn">
                                    </span>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4 col-sm-12 float-right">
                                @if($title == 'search')
                                    <a href="{{ URL::previous() }}" class="btn btn-block btn-danger">
                                        <i class="fa fa-arrow-left"></i> Voltar
                                    </a>
                                @endif
                                @if($title == 'Medicaments')
                                    <a href="{{ route('medicament.create') }}" class="btn btn-block btn-primary">
                                        <i class="fa fa-plus mr-2"></i> Registrar novo Medicamento
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        @include('layouts.flash-message')
                    </div>
                    <div class="table-responsive p-lg-3">
                        <table class="table align-items-center table-flush" id="user-list-table">
                            <thead>
                            <tr>
                                @include('medicaments.partials.table._head')
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($medicaments as $medicaments)
                                <tr>
                                    @include('medicaments.partials.table._body')
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
{{--                                @if($title == 'Medicaments')--}}
{{--                                    {{$medicaments->links()}}--}}
{{--                                @endif--}}
                                @if($title == 'search')
                                    <a href="{{ URL::previous() }}" class="btn btn-sm btn-danger">
                                        <i class="fa fa-arrow-left"></i> Voltar
                                    </a>
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
