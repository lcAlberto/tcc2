@csrf
<div class="row">
    <div class="col-5 text-black">
        <div class="ml-2 form-group">
            <div class="form-group mb-3 {{ $errors->has('id') ? ' has-danger' : 'Este ID já existe!' }}">
                <label class="form-control-label" for="id"> ID </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                <input name="id"
                       type="number"
                       id="id"
                       class="form-control form-control-alternative{{ $errors->has('id') ? ' is-invalid' : 'Este campo é Obrigatório!' }}"
                       placeholder="Número de Identificação, número do brinco"
                       value="{{old('id') ?? $item->id ?? '' }}" required/>
                <small class="form-text"> Número do Brinco do animal. Não pode ficar em branco!</small>
            </div>
            <div class="form-group mb-3{{ $errors->has('nome') ? ' has-danger' : 'Nome Inválido!' }}">
                <label class="form-control-label" for="nome"> Nome </label>
                <input name="nome"
                       type="text"
                       id="nome"
                       class="form-control {{ $errors->has('nome') ? ' is-invalid' : '' }}"
                       placeholder="Nome ou apelido do animal"
                       value="{{old('nome') ?? $item->nome ?? '' }}"/>
                <small class="form-text"> Nome do animal, apelido</small>
            </div>
            <div class="form-group mb-3">
                <label class="form-control-label" for="DTNasc">
                    Data de Nascimento
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                </label>
                <input name="dt_nascimento"
                       type="date"
                       id="dt_nascimento"
                       class="form-control {{ $errors->has('dt_nascimento') ? ' is-invalid' : '' }}"
                       placeholder="Data de nascimento do animal"
                       value="{{old('dt_nascimento') ?? $item->dt_nascimento ?? '' }}" required/>
                <small class="form-text"> Dia, mês e ano que o animal nasceu</small>
            </div>
            <div class="form-group mb-3">
                <label class="form-control-label" for="sexo"> Sexo </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                <br>
                <input type="radio" id="sexo" name="sexo" value="Macho"> Macho<br>
                <input type="radio" id="sexo" name="sexo" value="Fêmea"> Fêmea<br>
            </div>
            <div class="form-group mb-3">
                <label class="form-control-label" for="raca">
                    Raça
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                </label>
                <select class="form-control" id="raca" name="raca"
                        data-value="{{old('classificacao') ?? $item->classificacao ?? '' }}" required>
                    <option value="">Selecione</option>
                    <option value="Jersey" name="Jersey">Jersey</option>
                    <option value="Nelore" name="Nelore">Nelore</option>
                    <option value="Zebu" name="Zebu">Zebu</option>
                    <option value="Guzera" name="Guzera">Guzera</option>
                    <option value="Sindi" name="Sindi">Sindi</option>
                    <option value="Pardo Suiço" name="Pardo Suiço">Pardo Suiço</option>
                    <option value="Holandesa" name="Holandesa">Holandesa</option>
                    <option value="Gir Leiteiro" name="Gir Leiteiro">Gir Leiteiro</option>
                    <option value="Girolando" name="Girolando">Girolando</option>
                    <option value="Mestiça" name="Mestica">Mestiça</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col-5 text-black">
        <div class="form-group mb-3">
            <label class="form-control-label" for="classificacao">
                Classificação
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
            </label>
            <select class="form-control" id="classificacao" name="classificacao"
                    data-value="{{old('classificacao') ?? $item->classificacao ?? '' }}" required>
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
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                </label>
                <input name="profile"
                       type="file"
                       id="profile"
                       class="form-control {{ $errors->has('profile') ? ' is-invalid' : '' }}"
                       placeholder="file"
                       value="{{old('profile') ?? $item->profile ?? '' }}" required/>
                <small class="form-text"> Por favor, escolha uma imagem no formato jpg, jpeg, gif ou png</small>
            </div>
        </div>

        <!-- filiação -->
        <div class="form-group mb-3">
            <label class="form-control-label" for="father">
                Filiação Paterna, (Pai)
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
            </label>
            <label class="ml-3"><a href="{{ route('flock.create') }}"> <i class="fa fa-plus"></i> Adicionar novo
                    Touro (Pai)</a></label>
            <select
                name="father" id="father"
                class="form-control {{ $errors->has('ID') ? ' is-invalid' : 'Este campo é Obrigatório!' }}">
                <option value="" selected> Selecione</option>
                @foreach ($animals as $item)
                @if (($item->sexo == "Macho") && ($item->classificacao == 'touro'))
                <option value="{{ $item->nome }}"> {{ $item->nome }}</option>
                @endif
                @endforeach
            </select>
            <small class="form-text"> Touro pai do animal</small>
        </div>

        <div class="form-group mb-3">
            <label class="form-control-label" for="mother">
                Filiação Materna, (Mãe)
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
            </label>
            <label class="ml-3" id="mother"><a href="{{ route('flock.create') }}">
                    <i class="fa fa-plus"></i> Adicionar nova Vaca (Mãe)</a>
            </label>
            <select
                name="mother" id="mother"
                class="form-control {{ $errors->has('ID') ? ' is-invalid' : 'Este campo é Obrigatório!' }}">
                <option value="" selected> Selecione</option>
                @foreach ($animals as $item)
                @if (($item->sexo == "Fêmea") && (($item->classificacao == 'lactante')) || ($item->classificacao ==
                'seca'))
                <option value="{{ $item->nome }}">
                    [ {{ $item->id }} ] - {{ $item->nome }}, {{ $item->classificacao }}
                </option>
                @endif
                @endforeach
            </select>
        </div>
        <small class="form-text"> Vaca mãe do animal</small>
    </div>
    <!--/filiação -->
</div>
