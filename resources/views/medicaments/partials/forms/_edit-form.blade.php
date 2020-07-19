@csrf
<div class="row">
    @foreach ($errors->all() as $message)
    @endforeach
    <div class="col-lg-5 col-12 text-black">
        <div class="ml-2 form-group">
            <div class="form-group mb-3">
                <!-- Nome -->
                <label class="form-control-label" for="nome"> Nome </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('name'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Insira um nome válido com no mínimo 5 caracteres
                    </div>
                @endif
                <input name="name"
                       type="text"
                       id="nome"
                       class="form-control border {{$errors->has('name') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Nome do Medicamento"
                       value="{{old('name') ?? $item->name ?? $medicament->name }}" required/>
                <small class="form-text"> Nome do medicamento, exemplo, Dectomax</small>
            </div>
            <div class="form-group mb-3">
                <!-- Princípio Ativo -->
                <label class="form-control-label" for="active_principle"> Princípio Ativo </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('active_principle'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Insira um nome válido com no mínimo 5 caracteres
                    </div>
                @endif
                <input name="active_principle"
                       type="text"
                       id="active_principle"
                       class="form-control border {{$errors->has('active_principle') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Princípio Ativo"
                       value="{{old('active_principle') ?? $item->active_principle ?? $medicament->active_principle }}" required/>
                <small class="form-text"> Princípio Ativo, exemplo, Doramectina</small>
            </div>
            <div class="form-group mb-3">
                <!-- Carência - CORTE -->
                <label class="form-control-label" for="grace_period_beef"> Período de Carência - Corte </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('grace_period_beef'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Insira um nome válido com no mínimo 5 caracteres
                    </div>
                @endif
                <input name="grace_period_beef"
                       type="text"
                       id="grace_period_beef"
                       class="form-control border {{$errors->has('grace_period_beef') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Carência para abate"
                       value="{{old('grace_period_beef') ?? $item->grace_period_beef ?? $medicament->grace_period_beef }}" required/>
                <small class="form-text"> Periodo de segurança para consumo de carne</small>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col-lg-5 col-12 text-black">
        <div class="form-group mb-3">
            <!-- Carência - LEITE -->
            <label class="form-control-label" for="grace_period_dairy"> Período de Carência - Leite </label>
            <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
            @if($errors->has('grace_period_dairy'))
                <div class="float-lg-right badge badge-danger mb-2">
                    Insira um nome válido com no mínimo 5 caracteres
                </div>
            @endif
            <input name="grace_period_dairy"
                   type="text"
                   id="grace_period_dairy"
                   class="form-control border {{$errors->has('grace_period_dairy') ? 'text-danger border-danger is-invalid' : ''}}"
                   placeholder="Carência para lactação"
                   value="{{old('grace_period_dairy') ?? $item->grace_period_dairy ?? $medicament->grace_period_dairy }}" required/>
            <small class="form-text"> Periodo de segurança para consumo de leite</small>
        </div>
        <div class="col-1"></div>
        <div class="form-group">
            <div class="form-group mb-3">
                <label class="form-control-label" for="thumbnail">
                    Imagem do Produto
                </label>
                @if($errors->has('thumbnail'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Insira uma imagem válida!
                    </div>
                @endif
                <input name="thumbnail"
                       type="file"
                       id="thumbnail"
                       class="form-control border {{$errors->has('thumbnail') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="file"
                       value="{{old('thumbnail') ?? $item->thumbnail ?? $medicament->thumbnail}}"/>
                <small class="form-text"> Por favor, escolha uma imagem no formato jpg, jpeg, gif ou png</small>
            </div>
            <div class="form-group mb-3">
                <label class="form-control-label" for="flyer">
                    Bula
                </label>
                @if($errors->has('flyer'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Insira uma arquivo PDF, DOC, DOCX válido!
                    </div>
                @endif
                <input name="flyer"
                       type="file"
                       id="flyer"
                       class="form-control border {{$errors->has('flyer') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="file"
                       value="{{old('flyer') ?? $item->flyer ?? $medicament->flyer }}"/>
                <small class="form-text"> Por favor, escolha um arquivo no formato pdf, doc ou docx</small>
            </div>
        </div>
    </div>
</div>
{{--</div>--}}
