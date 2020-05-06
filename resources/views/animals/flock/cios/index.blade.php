@extends('layouts.app')

@section('content')
    @include('layouts.headers.flock-card')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-md-4 col-sm-12 mb-2 mb-lg-0 text-center">
                                <h3 class="mb-0">
                                    Acompanhar ciclo reprodutivo
                                </h3>
                            </div>
                            <div
                                class="col-md-6 {{$title == 'heatByAnimal' ? 'col-md-6' : 'col-md-12'}}col-lg-6 mb-lg-0 mb-2">
                                <form action="{{route('cio.search')}}" id="pesquisar" method="post" role="search">
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                               name="nome" placeholder="Pesquisar">
                                        <span class="input-group-btn">
                                        <button type="submit" class="btn btn-outline-light">
                                            <span class="fa fa-search"></span>
                                         </button>
                                    </span>
                                    </div>
                                </form>
                            </div>
                            @if($title == 'search')
                                <div class="col-md-3 col-sm-12 text-right">

                                    <a href="{{route('cio.index')}}" class="btn btn-block btn-danger">
                                        <i class="fa fa-arrow-left"></i> Voltar
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        @include('layouts.flash-message')
                        @include('animals.flock.cios.flash-message')
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush text-center">
                            <thead>
                            <tr>
                                @include('animals.flock.cios.partials._head')
                            </tr>
                            </thead>
                            <tbody>
                            @if($title == 'Cio')
                                @include('animals.flock.cios.partials.table.main-body')
                            @elseif($title == 'heatByAnimal')
                                @include('animals.flock.cios.partials.table.heat-by-animal')
                            @endif
                            </tbody>
                        </table>
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                                @if($title == 'Cio')
                                    {{$cios->links()}}
                                @endif
                                @if($title == 'search')
                                    <a href="{{route('animals.index')}}" class="btn btn-sm btn-danger">
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
