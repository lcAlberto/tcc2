@extends('layouts.app')

@section('content')
    @include('medicaments.partials.header')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                Editar Medicamento
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ URL::previous() }}"
                                   class="btn btn btn-primary">
                                    <i class="fa fa-arrow-left mr-2"></i>@lang('labels.Back')
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <label>@lang('labels.fields with')
                            <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                            @lang('labels.are required')
                        </label>
                        <div class="col-12">
                            <form class="form-horizontal"
                                  method="POST"
                                  enctype="multipart/form-data"
                                  name="medicament-edit-form"
                                  action="{{route('medicament.update', $medicament->id)}}"
                                  autocomplete="off">
                                @include('medicaments.partials.forms._edit-form')
                                <div class="col-5">
                                    <button class="btn btn-success btn-block" type="submit">
                                        <i class="fa fa-check mr-2"></i>@lang('labels.Edit')
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>

@endsection
