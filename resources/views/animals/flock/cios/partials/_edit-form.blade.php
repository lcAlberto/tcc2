@csrf
<div class="row">
    <div class="col-5 text-black">
        <div class="ml-2 form-group">
            <div class="form-group mb-3 {{ $errors->has('id') ? ' has-danger' : 'Este ID já existe!' }}">
                <label class="form-control-label" for="id">
                    Selecione o animal que apresentou Cio
                </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                <select name="id_animals" id="id" class="form-control">
                    <option value="{{ $cio->id }}" selected>
                        [ {{ $cio->id }} ] - {{ $animal->nome }}
                    </option>
                </select>
                <small>
                    Qual animal apresentou cio?
                </small>
            </div>
            <div class="form-group mb-3{{ $errors->has('nome') ? ' has-danger' : 'Nome Inválido!' }}">
                <label class="form-control-label" for="dt_cio">
                    Data do Cio
                </label>
                <input name="dt_cio"
                       type="date"
                       id="dt_cio"
                       class="form-control {{ $errors->has('dt_cio') ? ' is-invalid' : '' }}"
                       placeholder="Nome ou apelido do animal"
                       value="{{old('dt_cio') ?? $cio->dt_cio ?? '' }}"/>
                <small class="form-text">
                    Data em que o animal apresentou Cio
                </small>
            </div>
            <div class="form-group mb-3">
                <label class="form-control-label" for="dt_cobertura">
                    Data de Cobertura
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                </label>
                <input name="dt_cobertura"
                       type="date"
                       id="dt_cobertura"
                       class="form-control {{ $errors->has('dt_cobertura') ? ' is-invalid' : '' }}"
                       placeholder="Data da Cobertura"
                       value="{{old('dt_nascimento') ?? $cio->dt_cobertura ?? '' }}" required/>
                <small class="form-text">
                    Data da Cobertura
                </small>
            </div>
        </div>
    </div>
    <div class="col-5 text-black">
        <div class="ml-2 form-group">
            <div class="form-group mb-3">
                <label class="form-control-label" for="tipo">
                    Tipo de cobertura
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                </label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option value="{{old('tipo') ?? $cio->tipo ?? '' }}" selected>
                        {{ $cio->tipo }}
                    </option>
                    <option value="Inseminaçao" name="Inseminaçao">
                        Inseminaçao Artificial
                    </option>
                    <option value="Natural" name="Natural">
                        Monta Natural
                    </option>
                </select>
                <small>
                    De maneira foi a cobertura?
                </small>
            </div>
        </div>

        <div class="form-group mb-3" id="current-bull">
            <fieldset class="p-2 bg-translucent-white border border-top border-light border-dashed">
                <label class="form-control-label" for="touro">
                    Nome do touro
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                </label>
                <select name="pai" class="form-control mb-3" id="touro">
                    <option value="Desconhecido">
                        Desconhecido
                    </option>
                    <option value="{{$cio->pai}}">
                        {{ $cio->pai }}
                    </option>
                    @if(isset($animal->pai))
                        <option value="{{$animal->pai}}">
                            {{$animal->pai}}
                        </option>
                    @endif
                </select>
                <button class="btn btn-white text-primary" type="button" id="add-input">
                    <i class="fa fa-plus"></i>
                    Adicionar um Touro nao listado
                </button>
            </fieldset>
        </div>

        <div class="form-group mb-3" style="display: none;" id="new-bull">
            <fieldset class="p-2 bg-translucent-white border border-top border-light border-dashed">
                <label class="form-control-label" for="pai">
                    O Nome do Touro fica na palheta do sêmen
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup><br>
                    <div>
                        <img src="{{asset('/argon/palhetas-semen.jpg')}}" width="350">
                    </div>
                </label>
                <br>
                <label class="form-control-label" for="pai">
                    Digite o nome do Touro
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                </label>
                <input type="text" class="form-control" id="pai" name="pai"  value="{{old('pai') ?? $cio->pai ?? '' }}">
                <button
                    class="btn btn-white text-primary mt-3"
                    style="display: none;" type="button" id="add-select">
                    <i class="fa fa-plus"></i>
                    Adicionar um Touro da propriedade
                </button>
                <!-- -->
            </fieldset>
        </div>

    </div>
</div>

<!--/filiação -->
<script>
    $("#add-input").click(function () {
        $("#new-bull").show();
        $("#current-bull").hide();
        $("#add-select").show();
        // alert('okey');
    });
    $("#add-select").click(function () {
        $("#new-bull").hide();
        $("#current-bull").show();
    });
</script>
