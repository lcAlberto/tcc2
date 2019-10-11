@csrf
<div class="row">
    <div class="col-lg-5 col-12 text-black">
        <div class="ml-2 form-group">
            <div class="form-group mb-3">
                <!-- ID -->
                <label class="form-control-label" for="id"> ID </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('id'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Campo ID é Necessário! Insira um número válido
                    </div>
                @endif
                <input name="id"
                       type="number"
                       id="id"
                       class="form-control form-control-alternative
                       {{$errors->has('id') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Número de Identificação, número do brinco"
                       value="{{old('id') ?? $item->id ?? '' }}" required/>
                <small class="form-text"> Número do Brinco do animal. Não pode ficar em branco!</small>
            </div>
            <div class="form-group mb-3">
                <!-- Nome -->
                <label class="form-control-label" for="nome"> Nome </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('nome'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Insira um nome válido, exemplo: Mimosa
                    </div>
                @endif
                <input name="nome"
                       type="text"
                       id="nome"
                       class="form-control border {{$errors->has('nome') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Nome ou apelido do animal"
                       value="{{old('nome') ?? $item->nome ?? '' }}" required/>
                <small class="form-text"> Nome do animal, apelido</small>
            </div>
            <div class="form-group mb-3">
                <!-- Data de Nascimento -->
                <label class="form-control-label" for="DTNasc">
                    Data de Nascimento
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                    @if($errors->has('dt_nascimento'))
                        <div class="float-lg-right badge badge-danger mb-2">
                            Insira uma data entre 01/01/2010 e hoje.
                        </div>
                    @endif
                </label>
                <input name="dt_nascimento"
                       type="date"
                       id="dt_nascimento"
                       class="form-control border {{$errors->has('dt_nascimento') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Data de nascimento do animal"
                       value="{{old('dt_nascimento') ?? $item->dt_nascimento ?? '' }}" required/>
                <small class="form-text"> Dia, mês e ano que o animal nasceu</small>
            </div>
            <div class="form-group mb-3">
                <!-- Data de Nascimento -->
                <label class="form-control-label" for="sexo"> Sexo </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('sexo'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Selecione este campo com "Macho" ou "Fêmea"
                    </div>
                @endif
                <select class="form-control border {{$errors->has('sexo') ? 'text-danger border-danger is-invalid' : ''}}"
                        data-value="{{old('sexo') ?? $item->sexo ?? 'O campo Tipo está em branco!' }}"
                        id="sexo" name="sexo" required>
                    <option value="" selected>Selecione</option>
                    <option value="Fêmea" name="Fêmea">
                        <i class="fa fa-mars"></i> Fêmea
                    </option>
                    <option value="Macho" name="Macho">Macho</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <!-- Raça -->
                <label class="form-control-label" for="raca">
                    Raça
                </label>
                @if($errors->has('raca'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Selecione uma Raça!
                    </div>
                @endif
                <select class="form-control border {{$errors->has('raca') ? 'text-danger border-danger is-invalid' : ''}}"
                        id="raca" name="raca" data-value="{{old('raca') ?? $item->raca ?? '' }}">
                    <option value=" - ">Selecione</option>
                    <option value="Jersey">Jersey</option>
                    <option value="Nelore">Nelore</option>
                    <option value="Zebu">Zebu</option>
                    <option value="Guzera">Guzera</option>
                    <option value="Sindi">Sindi</option>
                    <option value="Pardo Suiço">Pardo Suiço</option>
                    <option value="Holandesa">Holandesa</option>
                    <option value="Gir Leiteiro">Gir Leiteiro</option>
                    <option value="Girolando">Girolando</option>
                    <option value="Mestiça">Mestiça</option>
                    <option value="Outra">Outra</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col-lg-5 col-12 text-black">
        <div class="form-group mb-3">
            <label class="form-control-label" for="classificacao">
                Classificação
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('classificacao'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Campo Classificação é Necessário!
                    </div>
                @endif
            </label>
            <select class="form-control border {{$errors->has('classificacao') ? 'text-danger border-danger is-invalid' : ''}}"
                    id="classificacao" name="classificacao" required
                    data-value="{{old('classificacao') ?? $item->classificacao ?? '' }}">
                <option value="">Selecione</option>
                <option value="bezerro">
                    Bezerro (Recém-nascido macho até o desmame)
                </option>
                <option value="bezerra">
                    Bezerra (Recém-nascido fêmea até o desmame)
                </option>
                <option value="garrote">
                    Terneiro ou Garrote (Recém-nascido macho desmamado até atingir a
                    maturidade sexual)
                </option>
                <option value="terneira">
                    Terneira (Recém-nascido fêmea desmamada até atingir a maturidade sexual)
                </option>
                <option value="novilha">
                    Novilha (Fêmea que já atingiu a maturidade sexual mas ainda não criou)
                </option>
                <option value="touro">
                    Touro
                </option>
                <option value="capao">
                    Capão
                </option>
                <option value="lactante">
                    Vaca Lactante
                </option>
                <option value="seca">
                    Vaca Seca
                </option>
            </select>
            <small class="form-text">exemplo: novilha</small>
        </div>
        <div class="form-group">
            <div class="form-group mb-3">
                <label class="form-control-label" for="confirm_password">
                    Imagem do animal
                </label>
                @if($errors->has('profile'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Insira uma imagem válida!
                    </div>
                @endif
                <input name="profile"
                       type="file"
                       id="profile"
                       class="form-control border {{$errors->has('profile') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="file"
                       value="{{old('profile') ?? $item->profile ?? '' }}"/>
                <small class="form-text"> Por favor, escolha uma imagem no formato jpg, jpeg, gif ou png</small>
            </div>
        </div>
        <!-- filiação -->
        <div class="form-group mb-3">
            <label class="form-control-label" for="pai">
                Filiação Paterna, (Pai)
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('pai'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Campo Pai é Necessário!
                    </div>
                @endif
            </label>
            <select
                name="pai" id="pai"
                class="form-control border{{$errors->has('pai') ? 'text-danger border-danger is-invalid' : ''}}">
                <option value="" selected> Selecione</option>
                <option value="Desconhecido" name="Desconhecido">Touro Desconhecido</option>
                @foreach ($animals as $item)
                    @if (($item->sexo == "Macho") && ($item->classificacao == 'touro'))
                        <option value="{{ $item->id }}">[ {{ $item->id }} ] {{ $item->nome }} </option>
                    @endif
                @endforeach
            </select>
            <small class="text-warning">
                É preciso que o Touro pai esteja cadastrado.<br>
                Se não, cadastre este primeiro como pai desconhecido!
            </small>
        </div>

        <div class="form-group mb-3">
            <label class="form-control-label" for="mae">
                Filiação Materna, (Mãe)
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('mae'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Campo Mãe é Necessário!
                    </div>
                @endif
            </label>
            <select
                name="mae" id="mae"
                class="form-control border {{$errors->has('mae') ? 'text-danger border-danger is-invalid' : ''}}">
                <option value="" selected> Selecione</option>
                <option value="Desconhecida" name="Desconhecida"> Mae Desconhecida</option>
                @foreach ($animals as $item)
                    @if (($item->sexo == "Fêmea") && (($item->classificacao == 'lactante')) || ($item->classificacao == 'seca'))
                        <option value="{{ $item->id }}">
                            [ {{ $item->id }} ] - {{ $item->nome }}, {{ $item->classificacao }}
                        </option>
                    @endif
                @endforeach
            </select>
            <small class="text-warning">
                Se a mãe não estiver cadastrada cadastre-a primeiro<br>
                Se não mantenha "Desconhecida"
            </small>
        </div>

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
                name="status" id="status"
                class="form-control {{$errors->has('status') ? 'text-danger border-danger is-invalid' : ''}}">
                <option value="ativo"> Ativo</option>
                <option value="vendido"> Vendido</option>
                <option value="morto"> Morto</option>
            </select>
            <small class="text-warning">
                O status determina o estado atual do animal <br>
                Se Você vendeu ele ou ele morreu, altere este campo.
            </small>
        </div>
    </div>
</div>
