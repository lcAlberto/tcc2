@csrf
<div class="row">
    <div class="col-5 text-black">
        <div class="ml-2 form-group">
            <div class="form-group">
                <label for="id"> <i class="fa fa-asterisk" style="color:red; font-size: 8px;"></i> ID </label>
                <input name="id"
                       type="number"
                       id="id"
                       class="form-control {{ $errors->has('id') ? ' is-invalid' : 'Este campo é Obrigatório!' }}"
                       placeholder="Número de Identificação, número do brinco"
                       value="{{old('id') ?? $animals->id ?? '' }}" required/>
                <small class="form-text"> Número do Brinco do animal. Não pode ficar em branco!</small>
            </div>
            <div class="form-group">
                <label for="nome"> Nome </label>
                <input name="nome"
                       type="text"
                       id="nome"
                       class="form-control {{ $errors->has('nome') ? ' is-invalid' : '' }}"
                       placeholder="Nome ou apelido do animal"
                       value="{{old('nome') ?? $animals->nome ?? '' }}"/>
                <small class="form-text"> Nome do animal, apelido</small>
            </div>
            <div class="form-group">
                <label for="DTNasc"> <i class="fa fa-asterisk" style="color:red; font-size: 8px;"></i>
                    Data de Nascimento
                </label>
                <input name="dt_nascimento"
                       type="date"
                       id="dt_nascimento"
                       class="form-control {{ $errors->has('dt_nascimento') ? ' is-invalid' : '' }}"
                       placeholder="Data de nascimento do animal"
                       value="{{old('dt_nascimento') ?? $animals->dt_nascimento ?? '' }}" required/>
                <small class="form-text"> Dia, mês e ano que o animal nasceu</small>
            </div>
            <div class="form-group">
                <label for="sexo"> <i class="fa fa-asterisk" style="color:red; font-size: 8px;"></i> Sexo </label><br>
                <input type="radio" id="sexo" name="sexo" value="Macho"> Macho<br>
                <input type="radio" id="sexo" name="sexo" value="Fêmea"> Fêmea<br>
            </div>
            <div class="form-group">
                <label for="raca"> <i class="fa fa-asterisk" style="color:red; font-size: 8px;"></i>
                    Raça
                </label>
                <select class="form-control" id="raca" name="raca"
                        data-value="{{old('classificacao') ?? $animals->classificacao ?? '' }}" required>
                    <option value="">Selecione</option>
                    <option value="Jersey" name="Jersey">Jersey</option>
                    <option value="Holandesa" name="Holandesa">Holandesa</option>
                    <option value="Gir Leiteiro" name="Gir Leiteiro">Gir Leiteiro</option>
                    <option value="Mestiça" name="Mestica">Mestiça</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col-5 text-black">
        <div class="form-group">
            <label for="classificacao"> <i class="fa fa-asterisk" style="color:red; font-size: 8px;"></i>
                Classificação
            </label>
            <select class="form-control" id="classificacao" name="classificacao"
                    data-value="{{old('classificacao') ?? $animals->classificacao ?? '' }}" required>
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
                <label for="confirm_password"> <i class="fa fa-asterisk" style="color:red; font-size: 8px;"></i>
                    Imagem do animal
                </label>
                <input name="profile"
                       type="file"
                       id="profile"
                       class="form-control {{ $errors->has('profile') ? ' is-invalid' : '' }}"
                       placeholder="file"
                       value="{{old('profile') ?? $animals->profile ?? '' }}" required/>
                <small class="form-text"> Por favor, escolha uma imagem no formato jpg, jpeg, gif ou png</small>
            </div>
        </div>
        <div class="form-group">
            <label for="father"> <i class="fa fa-asterisk" style="color:red; font-size: 8px;"></i>
                Filiação Paterna, (Pai)
            </label>
            <label class="ml-3"><a href="{{ route('flock.create') }}"> <i class="fa fa-plus"></i> Adicionar novo
                    Touro (Pai)</a></label>
            <select name="father" id="father" required
                    class="form-control {{ $errors->has('father') ? ' is-invalid' : 'Este campo é Obrigatório!' }}">
                <option> <?php echo $animals->father?> </option>
            </select>
            <small class="form-text"> Touro pai do animal</small>
        </div>

        <div class="form-group">
            <label for="mother"> <i class="fa fa-asterisk" style="color:red; font-size: 8px;"></i>
                Filiação Materna, (Mãe)
            </label>
            <label class="ml-3"><a href="{{ route('flock.create') }}">
                    <i class="fa fa-plus"></i> Adicionar nova Vaca (Mãe)</a>
            </label>
            <select name="mother" id="mother" required
                    class="form-control {{ $errors->has('mother') ? ' is-invalid' : 'Este campo é Obrigatório!' }}">
                @foreach ($animals as $key => $item)
                    <option> <?php echo $animals->mother?></option>
                @endforeach;
            </select>
        </div>
        <small class="form-text"> Vaca mãe do animal</small>
    </div>
    <!--/filiação -->
</div>
