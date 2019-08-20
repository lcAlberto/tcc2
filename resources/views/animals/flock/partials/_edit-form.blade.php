@csrf
<div class="row">
    <div class="col-5 text-black">
        <div class="ml-2 form-group">
            <div class="form-group">
                <label class="form-control-label" for="id">
                    ID
                </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                <input name="id"
                       type="number"
                       id="id"
                       class="form-control {{ $errors->has('id') ? ' is-invalid' : 'Este campo é Obrigatório!' }}"
                       placeholder="Número de Identificação, número do brinco"
                       value="{{old('id') ?? $animals->id ?? '' }}" required/>
                <small class="form-text"> Número do Brinco do animal. Não pode ficar em branco!</small>
            </div>
            <div class="form-group">
                <label for="nome">
                    Nome
                </label>
                <input name="nome"
                       type="text"
                       id="nome"
                       class="form-control {{ $errors->has('nome') ? ' is-invalid' : '' }}"
                       placeholder="Nome ou apelido do animal"
                       value="{{old('nome') ?? $animals->nome ?? '' }}"/>
                <small class="form-text"> Nome do animal, apelido</small>
            </div>
            <div class="form-group">
                <label for="DTNasc"> Data de Nascimento </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                <input name="dt_nascimento"
                       type="date"
                       id="dt_nascimento"
                       class="form-control {{ $errors->has('dt_nascimento') ? ' is-invalid' : '' }}"
                       placeholder="Data de nascimento do animal"
                       value="{{old('dt_nascimento') ?? $animals->dt_nascimento ?? '' }}"/>
                <small class="form-text"> Dia, mês e ano que o animal nasceu</small>
            </div>
            <div class="form-group">
                <label for="sexo">
                    Sexo
                </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value="{{old('sexo') ?? $animals->sexo ?? '' }}">
                        {{old('sexo') ?? $animals->sexo ?? '' }}
                    </option>
                    @if($animals->sexo == "Macho")
                        <option value="Fêmea" name="Fêmea">Fêmea</option>
                    @else
                        <option value="Macho" name="Macho">Macho</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="raca">
                    Raça
                </label>
                <select class="form-control" id="raca" name="raca"
                        data-value="{{old('raca') ?? $item->raca ?? '' }}">
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
    <div class="col-5 text-black">
        <div class="form-group">
            <label for="classificacao">
                Classificação
            </label>
            <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
            <select class="form-control" id="classificacao" name="classificacao"
                    data-value="{{old('classificacao') ?? $animals->classificacao ?? '' }}" required>
                <option value="{{old('classificacao') ?? $animals->classificacao ?? '' }}">
                    {{old('classificacao') ?? $animals->classificacao ?? '' }}
                </option>
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
                <option value="capao">
                    Vaca Lactante
                </option>
                <option value="capao">
                    Vaca Seca
                </option>
            </select>
            <small class="form-text">exemplo: novilha</small>
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="confirm_password">
                    Imagem do animal
                </label>
                <input name="profile"
                       type="file"
                       id="profile"
                       class="form-control {{ $errors->has('profile') ? ' is-invalid' : '' }}"
                       placeholder="{{old('profile') ?? $animals->profile ?? '' }}"
                       value="{{old('profile') ?? $animals->profile ?? '' }}"/>
                <small class="form-text"> Por favor, escolha uma imagem no formato jpg, jpeg, gif ou png</small>
            </div>
        </div>
        <!-- filiação -->
        <div class="form-group mb-3">
            <label class="form-control-label" for="father">
                Filiação Paterna, (Pai)
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
            </label>
            <select
                    name="father" id="father"
                    class="form-control {{ $errors->has('ID') ? ' is-invalid' : 'Este campo é Obrigatório!' }}">
                <option value="{{old('father') ?? $animals->father ?? '' }}" selected>
                    {{old('father') ?? $animals->father ?? '' }}
                </option>
                <option value="Desconhecido" name="Desconhecido"> Touro Desconhecido</option>
                @if (($animals->sexo == "Macho") && ($animals->classificacao == 'touro'))
                    <option value="{{ $animals->nome }}">[ {{ $animals->id }} ] {{ $animals->nome }} </option>
                @endif
            </select>
            <small class="text-danger">
                É preciso que o Touro pai esteja cadastrado.<br>
                Se não cadastre ele primeiro!
            </small>
        </div>

        <div class="form-group mb-3">
            <label class="form-control-label" for="mother">
                Filiação Materna, (Mãe)
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
            </label>
            <select
                    name="mother" id="mother"
                    class="form-control {{ $errors->has('ID') ? ' is-invalid' : 'Este campo é Obrigatório!' }}">
                <option value="{{old('mother') ?? $animals->mother ?? '' }}">
                    {{old('mother') ?? $animals->mother ?? '' }}
                </option>
                <option value="Desconhecida" name="Desconhecida"> Mae Desconhecida</option>
                @if (($animals->sexo == "Fêmea") && (($animals->classificacao == 'lactante')) || ($animals->classificacao == 'seca'))
                    <option value="{{ $animals->nome }}">
                        [ {{ $animals->id }} ] - {{ $animals->nome }}, {{ $animals->classificacao }}
                    </option>
                @endif
            </select>
            <small class="text-danger">
                É preciso que a Vaca mãe esteja cadastrada.<br>
                Se não cadastre ela primeiro!
            </small>
        </div>
    </div>
    <!--/filiação -->
</div>