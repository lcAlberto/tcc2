@csrf
<div class="row">
    <div class="col-lg-5 col-12 text-black">
        <div class="ml-2 form-group">
            <div class="form-group mb-3 {{ $errors->has('id') ? ' has-danger' : 'Este ID já existe!' }}">
                <label class="form-control-label" for="id"> ID </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                <input name="id"
                       type="number"
                       id="id"
                       class="form-control form-control-alternative
                       {{ $errors->has('id') ? ' is-invalid' : 'Este campo é Obrigatório!' }}"
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
                <select class="form-control" id="sexo" name="sexo" required>
                    <option value="" selected>Selecione</option>
                    <option value="Fêmea" name="Fêmea">Fêmea</option>
                    <option value="Macho" name="Macho">Macho</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label class="form-control-label" for="raca">
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
    <div class="col-lg-5 col-12 text-black">
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
                </label>
                <input name="profile"
                       type="file"
                       id="profile"
                       class="form-control {{ $errors->has('profile') ? ' is-invalid' : '' }}"
                       placeholder="file"
                       value="{{old('profile') ?? $item->profile ?? '' }}"/>
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
                <option value="" selected> Selecione</option>
                <option value="Desconhecido" name="Desconhecido"> Touro Desconhecido</option>
                @foreach ($animals as $item)
                    @if (($item->sexo == "Macho") && ($item->classificacao == 'touro'))
                        <option value="{{ $item->id }}">[ {{ $item->id }} ] {{ $item->nome }} </option>
                    @endif
                @endforeach
            </select>
            <small class="text-danger">
                É preciso que o Touro pai esteja cadastrado.<br>
                Se não, cadastre este primeiro como pai desconhecido!
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
        </div>
        <small class="text-danger">
            <i class="fa fa-exclamation-triangle"></i>
            É preciso que a Vaca mãe esteja cadastrada.<br>
        </small>
        <small class="text-warning">
            <i class="fa fa-info-circle"></i>
            Se não possui uma vaca cadastrada, cadastre ela primeiro como mãe desconhecida!
        </small>
    </div>
    <!--/filiação -->
</div>