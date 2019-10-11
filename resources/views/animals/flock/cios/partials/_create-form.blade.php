@csrf
<div class="row">
    <div class="col-lg-5 col-sm-12 text-black">
        <div class="ml-2 form-group">
            <!-- id_animals -->
            <div class="form-group mb-3">
                <label class="form-control-label" for="id">
                    Selecione o animal que apresentou Cio
                </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('dt_cio'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Este campo é necessário!
                    </div>
                @endif
                <select name="id_animals" id="id" class="form-control"
                        data-value="{{old('tipo') ?? $item->tipo ?? 'O campo Tipo está em branco!' }}">
                    <option value="">Selecione</option>
                    <option value="{{ $item->id }}" selected>
                        [ {{ $item->id }} ] - {{ $item->nome }}
                    </option>
                </select>
                <small>
                    Qual animal apresentou cio?
                </small>

            </div>

            <!-- dt_cio -->
            <div class="form-group mb-3">
                <label class="form-control-label" for="dt_cio">
                    Data do Cio
                </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('dt_cio'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Não use uma data superior a hoje!
                    </div>
                @endif
                <input name="dt_cio"
                       type="date"
                       id="dt_cio"
                       class="form-control border {{$errors->has('dt_cio') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Nome ou apelido do animal" required
                       value="{{old('dt_cio') . $errors->has('dt_cio') ? 'is-invalid' : ''}}"/>
                <small class="form-text">
                    Data em que o animal apresentou Cio
                </small>
            </div>
            <!-- dt_cobertura -->
            <div class="form-group mb-3 {{ $errors->has('dt_cobertura') ? ' is-invalid' : 'Data inválida' }}">
                <label class="form-control-label" for="dt_cobertura">
                    Data de Cobertura
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                    @if($errors->has('dt_cobertura'))
                        <div class="float-lg-right badge badge-danger mb-2">
                            É recomenável que a data da cobertura seja a mesma ou um dia depois do cio!
                        </div>
                    @endif
                </label>
                <input name="dt_cobertura"
                       type="date"
                       id="dt_cobertura"
                       class="form-control border {{$errors->has('dt_cobertura') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Data da Cobertura"
                       value="{{old('dt_cobertura') ?? $item->dt_cobertura ?? 'Data inválida!' }}" required/>
                <small class="form-text">
                    Data da Cobertura
                </small>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-sm-12 text-black">
        <div class="ml-2 form-group">
            <!-- tipo -->
            <div class="form-group mb-3 {{old('tipo') ?? $item->tipo ?? 'O campo Tipo está em branco!' }}">
                <label class="form-control-label" for="tipo">
                    Tipo de cobertura
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                    @if($errors->has('tipo'))
                        <div class="float-lg-right badge badge-danger mb-2">
                            Este campo é necessário!
                        </div>
                    @endif
                </label>
                <select
                    class="form-control border {{$errors->has('tipo') ? 'text-danger border-danger is-invalid' : ''}}"
                    id="tipo" name="tipo"
                    data-value="{{old('tipo') ?? $item->tipo ?? 'O campo Tipo está em branco!' }}">
                    <option value="">Selecione</option>
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
        <!-- pai -->
        <div class="form-group mb-3 col-sm-12" id="current-bull">
            <fieldset class="p-2 bg-translucent-white border border-top border-light border-dashed">
                <label class="form-control-label" for="touro">
                    Nome do touro
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                    @if($errors->has('pai'))
                        <div class="float-lg-right badge badge-danger mb-2">
                            Este campo é necessário!
                        </div>
                    @endif
                </label>
                <select name="pai" class="form-control mb-3  border
                        {{$errors->has('dt_cio') ? 'text-danger border-danger is-invalid' : ''}}"
                        id="touro" data-value="{{ $errors->has('pai') ? ' has-danger' : 'Campo Obrigatório' }}">
                    <option value="Desconhecido" selected>
                        Selecione
                    </option>
                    @if ($item->sexo == 'Macho')
                        <option value="{{$item->id}}">
                            [ {{ $item->id }} ] - {{ $item->nome }}
                        </option>
                    @endif
                </select>
                <!-- Adicionar um touro nao listado -->
                <button class="btn btn-white text-primary col-12" type="button" id="add-input">
                    <i class="fa fa-plus"></i>
                    Adicionar Touro nao listado
                </button>
            </fieldset>
        </div>
        <!-- pai_id -->
        <div class="form-group col-sm-12 mb-3" style="display: none;" id="new-bull">
            <fieldset class="p-2 bg-translucent-white border border-top border-light border-dashed">
                <label class="form-control-label col-sm-12" for="pai_id">
                    Digite o ID do Touro (O Número que fica na palheta do sêmen)
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                    <div>
                        <img src="{{asset('/argon/palhetas-semen.jpg')}}" class="col-sm-12" width="350">
                    </div>
                    @if($errors->has('pai_id'))
                        <div class="float-lg-right badge badge-danger">
                            Este campo é necessário!
                        </div>
                    @endif
                </label>
                <input type="number" id="pai_id" name="pai_id" placeholder="exemplo: 212115"
                       class="form-control  border {{$errors->has('pai_id') ? 'text-danger border-danger is-invalid' : ''}}"
                       value="{{ $errors->has('pai_id') ? ' has-danger' : 'campo ID do Touro Inválido!' }}">
                <small>exemplo: 212115</small>
                <br>
                <label class="form-control-label" for="pai_nome">
                    Digite o nome do Touro
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                    @if($errors->has('pai_name'))
                        <div class="float-lg-right badge badge-danger">
                            Este campo é necessário!
                        </div>
                    @endif
                </label>
                <input type="text" class="form-control border
                        {{$errors->has('pai_id') ? 'text-danger border-danger is-invalid' : ''}}"
                       id="pai_nome" name="pai_nome" placeholder="Opcional"
                       value="{{ $errors->has('pai_nome') ? ' has-danger' : 'campo ID do Touro Inválido!' }}">
                <button
                    class="btn btn-white text-primary mt-3 col-sm-12"
                    style="display: none;" type="button" id="add-select">
                    <i class="fa fa-plus"></i>
                    Touro da propriedade
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
