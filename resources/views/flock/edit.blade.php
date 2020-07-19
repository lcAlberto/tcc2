@extends('layouts.app')

@section('content')
    @include('layouts.headers.flock.index-card')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8 col-sm-">
                                <h3 class="mb-0">{{ __('Editar Animal') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ URL::previous() }}"
                                   class="btn btn btn-primary">
                                    <i class="fa fa-arrow-left mr-2"></i>@lang('labels.Back')
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body mx-5">
                        <form class="form-horizontal"
                              method="POST"
                              enctype="multipart/form-data"
                              name="user-form"
                              action="{{ route('animals.update', $animals) }}">
                        @method('PUT')
                        @include('flock.partials.forms._edit-form')
                    </div>
                    <div class="card-body">
                        <button class="btn btn-success btn-lg" type="submit">Editar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
