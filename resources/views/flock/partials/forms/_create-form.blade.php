@csrf
<div class="row">
    <div class="col-lg-5 col-12 text-black">
        <div class="ml-2 form-group">
            <div class="form-group mb-3">
                <!-- ID -->
                <label class="form-control-label" for="id"> Código do Animal </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('code'))
                    <br>
                    <div class="float-lg-right badge badge-danger mb-2">
                        Campo ID é Necessário! Insira um número válido
                    </div>
                @endif
                <input name="code"
                       type="number"
                       id="id"
                       class="form-control form-control-alternative
                       {{$errors->has('code') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Número de Identificação, número do brinco"
                       value="{{old('code') ?? $item->code ?? '' }}" required/>
                <small class="form-text"> Número do Brinco do animal. Não pode ficar em branco!</small>
            </div>
            <div class="form-group mb-3">
                <!-- Nome -->
                <label class="form-control-label" for="nome"> Nome </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('name'))
                    <br>
                    <div class="float-lg-right badge badge-danger mb-2">
                        Insira um nome válido com no mínimo 5 caracteres
                    </div>
                @endif
                <input name="name"
                       type="text"
                       id="nome"
                       class="form-control border {{$errors->has('name') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Nome ou apelido do animal"
                       value="{{old('name') ?? $item->name ?? '' }}" required/>
                <small class="form-text"> Nome do animal, apelido</small>
            </div>
            <div class="form-group mb-3">
                <!-- Data de Nascimento -->
                <label class="form-control-label" for="born_date">
                    Data de Nascimento
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                    @if($errors->has('born_date'))
                        <br>
                        <div class="float-lg-right badge badge-danger mb-2">
                            Insira uma data entre 01/01/2005 e hoje.
                        </div>
                    @endif
                </label>
                <input name="born_date"
                       type="text"
                       id="born_date"
                       class="form-control border {{$errors->has('born_date') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Data no formato dd/mm/aaaa"
                       value="{{old('born_date') ?? $item->name ?? '' }}" required/>
                <small class="form-text"> Dia, mês e ano que o animal nasceu</small>
            </div>
            <div class="form-group mb-3">
                <!-- Raça -->
                <label class="form-control-label" for="raca">
                    Raça
                </label>
                @if($errors->has('breed'))
                    <br>
                    <div class="float-lg-right badge badge-danger mb-2">
                        Selecione uma Raça!
                    </div>
                @endif
                <select
                    class="form-control border {{$errors->has('breed') ? 'text-danger border-danger is-invalid' : ''}}"
                    id="raca" name="breed">
                    <option value=" - ">Selecione</option>
                    <option value="Jersey" {{old('breed') == 'Jersey' ? 'selected' : ''}}>Jersey</option>
                    <option value="Nelore" {{old('breed') == 'Nelore' ? 'selected' : ''}}>Nelore</option>
                    <option value="Zebu" {{old('breed') == 'Zebu' ? 'selected' : ''}}>Zebu</option>
                    <option value="Guzera" {{old('breed') == 'Guzera' ? 'selected' : ''}}>Guzera</option>
                    <option value="Sindi" {{old('breed') == 'Sindi' ? 'selected' : ''}}>Sindi</option>
                    <option value="Pardo Suiço" {{old('breed') == 'Pardo Suiço' ? 'selected' : ''}}>Pardo Suiço</option>
                    <option value="Holandesa" {{old('breed') == 'Holandesa' ? 'selected' : ''}}>Holandesa</option>
                    <option value="Gir Leiteiro" {{old('breed') == 'Gir Leiteiro' ? 'selected' : ''}}>Gir Leiteiro
                    </option>
                    <option value="Girolando" {{old('breed') == 'Girolando' ? 'selected' : ''}}>Girolando</option>
                    <option value="Mestiça" {{old('breed') == 'Mestiça' ? 'selected' : ''}}>Mestiça</option>
                    <option value="Outra" {{old('breed') == 'Outra' ? 'selected' : ''}}>Outra</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <!-- SEXO -->
                <label class="form-control-label" for="sexo"> Sexo </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup><br>
                @if($errors->has('sex'))
                    <br>
                    <div class="float-lg-right badge badge-danger mb-2">
                        Selecione este campo com "Macho" ou "Fêmea"
                    </div>
                @endif
                <script type="text/javascript">
                    function showMale() {
                        $("#bull-reproductive").show();
                        $("#bull-castrated").show();
                        $("#bull-ruffian").show();
                        $("#heifer").hide();
                        $("#cow-lactating").hide();
                        $("#cow-non-lactating").hide();
                        $("#cow-dry").hide();
                        $("#she-calves").hide();
                        $("#class-selected").hide();
                    }

                    function showFemeale() {
                        $("#heifer").show();
                        $("#cow-lactating").show();
                        $("#cow-non-lactating").show();
                        $("#cow-dry").show();
                        $("#she-calves").show();
                        $("#bull-reproductive").hide();
                        $("#bull-castrated").hide();
                        $("#bull-ruffian").hide();
                        $("#class-selected").hide();
                    }
                </script>
                <input
                    type="radio"
                    id="femeale"
                    name="sex"
                    value="femeale"
                    {{old('sex') == 'femeale' ? 'checked' : '' }}
                    onchange="showFemeale()"
                    class="radio custom-radio
                                    {{$errors->has('sex') ? 'text-danger is-invalid' : ''}}">
                <label for="femeale">Fêmea</label>
                <input
                    type="radio"
                    id="male"
                    name="sex"
                    value="male"
                    {{old('sex') == 'male' ? 'checked' : '' }}
                    onchange="showMale()"
                    class="radio custom-radio
                                    {{$errors->has('sex') ? 'text-danger is-invalid' : ''}}">
                <label for="preventive">Macho</label>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col-lg-5 col-12 text-black">
        <div class="form-group mb-3">
            <label class="form-control-label" for="classificacao">
                Classificação
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('class'))
                    <br>
                    <div class="float-lg-right badge badge-danger mb-2">
                        Campo Classificação é Necessário!
                    </div>
                @endif
            </label>
            <select
                class="form-control border {{$errors->has('class') ? 'text-danger border-danger is-invalid' : ''}}"
                id="classificacao" name="class" required
                data-value="{{old('class') ?? $item->class ?? '' }}">
                <option value="" id="class-selected" selected>Para liberar as opçoes, selecione Sexo primeiro</option>
                <option id="heifer" value="heifer" style="display: none"
                    {{old('class') == 'heifer' ? 'selected' : ''}}>
                    Novilha (Fêmea que já atingiu a maturidade sexual mas ainda não criou)
                </option>
                <option id="cow-lactating" value="cow-lactating" style="display: none"
                    {{old('class') == 'cow-lactating' ? 'selected' : ''}}>
                    Vaca Lactante (Fêmea sexualmente ativa e que está produzindo leite)
                </option>
                <option id="cow-non-lactating" value="cow-non-lactating" style="display: none"
                    {{old('class') == 'cow-non-lactating' ? 'selected' : ''}}>
                    Vaca Não Lactante (Fêmea sexualmente ativa mas que não está produzindo leite)
                </option>
                <option id="cow-dry" value="cow-dry" style="display: none"
                    {{old('class') == 'cow-dry' ? 'selected' : ''}}>
                    Vaca Seca (Fêmea sexualmente ativa que não está lactando por quanto)
                </option>
                <option id="she-calves" value="she-calves" style="display: none"
                    {{old('class') == 'she-calves' ? 'selected' : ''}}>
                    Bezerra (Fêmea recém nascida até o desmame)
                </option>
                <option id="bull-reproductive" value="bull-reproductive" style="display: none"
                    {{old('class') == 'bull-reproductive' ? 'selected' : ''}}>
                    Touro (Macho sexualmente ativo)
                </option>
                <option id="bull-castrated" value="bull-castrated" style="display: none"
                    {{old('class') == 'bull-castrated' ? 'selected' : ''}}>
                    Capão (Macho castrado)
                </option>
                <option id="bull-ruffian" value="bull-ruffian" style="display: none"
                    {{old('class') == 'bull-ruffian' ? 'selected' : ''}}>
                    Bezerro (Macho recém nascido até o desmame)
                </option>
            </select>
            <small class="form-text">exemplo: novilha</small>
        </div>
        <div class="form-group">
            <div class="form-group mb-3">
                <label class="form-control-label" for="thumbnail">
                    Imagem do animal
                </label>
                @if($errors->has('thumbnail'))
                    <br>
                    <div class="float-lg-right badge badge-danger mb-2">
                        Insira uma imagem válida!
                    </div>
                @endif
                <input name="thumbnail"
                       type="file"
                       id="thumbnail"
                       class="form-control border {{$errors->has('thumbnail') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="file"
                       value="{{old('thumbnail') ?? $item->thumbnail ?? '' }}"/>
                <small class="form-text"> Por favor, escolha uma imagem no formato jpg, jpeg, gif ou png</small>
            </div>
        </div>
        <!-- filiação -->
        <div class="form-group mb-3">
            <label class="form-control-label" for="father">
                Filiação Paterna, (Pai)
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('father'))
                    <br>
                    <div class="float-lg-right badge badge-danger mb-2">
                        Campo Pai é Necessário!
                    </div>
                @endif
            </label>
            <select
                name="father" id="father"
                class="form-control border{{$errors->has('father') ? 'text-danger border-danger is-invalid' : ''}}">
                <option value="unknow" selected> Selecione</option>
                <option value="unknow" {{old('father') == 'unknow' ? 'selected' : ''}}>
                    Touro Desconhecido
                </option>
                @foreach ($animals as $item)
                    @if (($item->sex == 'male') && (($item->class == 'bull-reproductive')))
                        <option value="{{ $item->name }}" {{old('father') == $item->id ? 'selected' : ''}}>
                            [ {{ $item->code }} ] - @lang($item->name)
                        </option>
                    @endif
                @endforeach
            </select>
            <small class="text-warning">
                É preciso que o Touro pai esteja cadastrado.<br>
                Se não, cadastre este primeiro como pai desconhecido!
            </small>
        </div>

        <div class="form-group mb-3">
            <label class="form-control-label" for="mother">
                Filiação Materna, (Mãe)
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('mother'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Campo Mãe é Necessário!
                    </div>
                @endif
            </label>
            <select
                name="mother" id="mother"
                class="form-control border {{$errors->has('mother') ? 'text-danger border-danger is-invalid' : ''}}">
                <option value="" selected> Selecione</option>
                <option value="unknow"> Mãe Desconhecida</option>
                @foreach ($animals as $item)
                    @if(auth()->user()->farm_id ==  $item->farm_id)
                        @if((($item->class == 'cow-non-lactating') || ($item->class = 'heifer')) && ($item->sex == 'femeale'))
                            <option value="{{ $item->name }}" {{old('mother') == $item->id ? 'selected' : ''}}>
                                [ {{ $item->code }} ] - {{ $item->name }} - <h5 class="text-black-50">@lang('labels.' . $item->class)</h5>
                            </option>
                        @endif
                    @endif
                @endforeach
            </select>
            <small class="text-warning">
                Se a mãe não estiver cadastrada cadastre-a primeiro<br>
                Se não mantenha "Desconhecida"
            </small>
        </div>
        <!-- /filiacao -->
        <div class="form-group mb-3">
            <label class="form-control-label" for="status">
                Status
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('status'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Campo Status é Necessário!
                    </div>
                @endif
            </label>
            <select
                name="status" id="status" required
                class="form-control {{$errors->has('status') ? 'text-danger border-danger is-invalid' : ''}}">
                <option value="">Selecione</option>
                <option value="alive" {{old('status') == 'alive' ? 'selected' : ''}}>Vivo</option>
                <option value="dead" {{old('status') == 'dead' ? 'selected' : ''}}>Morto</option>
                <option value="sold" {{old('status') == 'sold' ? 'selected' : ''}}>Vendido</option>
            </select>
            <small class="text-warning">
                O status determina o estado atual do animal <br>
                Se Você vendeu ele ou ele morreu, altere este campo.
            </small>
        </div>
    </div>
</div>
