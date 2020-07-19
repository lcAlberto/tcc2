<!-- Modal -->
<div class="modal fade" id="deleteAnimalModal" data-backdrop="static" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-danger">
                <h3 class="modal-title text-white" id="exampleModalLabel">Atenção!</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12 text-center">
                    <h1 class="font-weight-bold text-capitalize"><i class="fa fa-exclamation-triangle"></i></h1>
                </div>
                <div class="col-lg-12">
                    <p>
                        Você está prestes á excluir um animal e não terá mais acesso
                        a ele.
                        Não será mais possível registrar novos registros de ciclos
                        reprodutivos desse animal.<br>
                        Você tem que quer prosseguir?
                    </p>
                    <form action="#" class="form-check-input">
                        <label for="check" class="form-check-label">Tenho certeza</label>
                        <input type="checkbox" class="my-checkbox" id="check" required>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Não, cancelar</button>
                <a href="{{ route('animals.destroy',  $animals->id) }}" class="btn btn-danger">Sim, por minha conta e
                    risco</a>
            </div>
        </div>
    </div>
</div>
