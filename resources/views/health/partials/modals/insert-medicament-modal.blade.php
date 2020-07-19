<!-- Modal -->
<div class="modal fade" id="insert-medicament-modal" tabindex="-1" role="dialog"
     aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Selecione o medicamento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Não encontrou o medicamento?</h3>
                            </div>
                            <div class="card-body">
                            <form class="form-horizontal"
                                  method="post"
                                  enctype="multipart/form-data"
                                  name="medicament-form"
                                  action="{{route('medicament.store')}}">
                                @include('medicaments.partials.forms._create-form')
                                <button class="btn btn-success btn-lg" id="submit" type="submit">
                                    <i class="fa fa-check mr-2"></i>@lang('labels.Create')
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
