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
                <label for="birth"> Data de Nascimento </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                <input name="birth"
                       type="date"
                       id="birth"
                       class="form-control {{ $errors->has('birth') ? ' is-invalid' : '' }}"
                       placeholder="Data de nascimento do animal"
                       value="{{old('birth') ?? $animals->birth ?? '' }}"/>
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
                        <option value="Fêmea" name="Fêmea">Fêmea</option>
                        <option value="Macho" name="Macho">Macho</option>
                </select>
            </div>
            <div class="form-group">
                <label for="raca">
                    Raça
                </label>
                <select class="form-control" id="raca" name="raca"
                        data-value="{{old('raca') ?? $animals->raca ?? '' }}">
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
            <label class="form-control-label" for="pai">
                Filiação Paterna, (Pai)
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
            </label>
            <select
                    name="pai" id="pai"
                    class="form-control {{ $errors->has('ID') ? ' is-invalid' : 'Este campo é Obrigatório!' }}">
                <option value="{{old('pai') ?? $animals->pai ?? '' }}" selected>
                    {{old('pai') ?? $animals->pai ?? '' }}
                </option>
                <option value="Desconhecido" name="Desconhecido"> Touro Desconhecido</option>
                @if (($animals->sexo == "Macho") && ($animals->classificacao == 'touro'))
                    <option value="{{ $animals->nome }}">[ {{ $animals->id }} ] {{ $animals->nome }} </option>
                @endif
            </select>
            <small class="text-primary">
                Se o pai não estiver cadastrado cadastre-o primeiro<br>
                Se não mantenha "Desconhecido"
            </small>
        </div>

        <div class="form-group mb-3">
            <label class="form-control-label" for="mae">
                Filiação Materna, (Mãe)
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
            </label>
            <select
                    name="mae" id="mae"
                    class="form-control {{ $errors->has('ID') ? ' is-invalid' : 'Este campo é Obrigatório!' }}">
                <option value="{{old('mae') ?? $animals->mae ?? '' }}">
                    {{old('mae') ?? $animals->mae ?? '' }}
                </option>
                <option value="Desconhecida" name="Desconhecida"> Mae Desconhecida</option>
                @if (($animals->sexo == "Fêmea") && (($animals->classificacao == 'lactante')) || ($animals->classificacao == 'seca'))
                    <option value="{{ $animals->nome }}">
                        [ {{ $animals->id }} ] - {{ $animals->nome }}, {{ $animals->classificacao }}
                    </option>
                @endif
            </select>
            <small class="text-primary">
                Se a mãe não estiver cadastrada cadastre-a primeiro<br>
                Se não mantenha "Desconhecida"
            </small>
        </div>

        <div class="form-group mb-3">
            <label class="form-control-label" for="status">
                Status
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
            </label>
            <select
                name="status" id="status"
                class="form-control {{ $errors->has('status') ? ' is-invalid' : 'Este campo é Obrigatório!' }}">
                <option value="{{old('status') ?? $animals->status ?? '' }}">
                    {{old('status') ?? $animals->status ?? '' }}
                </option>
                <option value="vendido"> Vendido </option>
                <option value="morto"> Morto </option>
            </select>
            <small class="text-primary">
                O status determina o estado atual do animal <br>
                Se Você vendeu ele ou ele morreu, altere este campo.
            </small>
        </div>
    </div>
    <!--/filiação -->
</div>
