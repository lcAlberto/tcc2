@csrf
<div class="row">
    <div class="col-lg-5 col-12 text-black">
        <div class="ml-2 form-group">
            <div class="form-group mb-3">
                <!-- ID -->
                <label class="form-control-label" for="animal_id">
                    Selecione o animal que foi tratado
                </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('animal_id'))
                    <div class="float-lg-right badge badge-danger mb-2">
                        Este campo é necessário!
                    </div>
                @endif
                <select name="animal_id" id="animal_id" class="form-control">
                    <option value="" {{$health->id ? '' : 'selected'}}>Selecione</option>
                    @foreach($animals as $animal)
                        <option value="{{ $animal->id }}" {{$health->id ? 'selected' : ''}}>
                            [ {{ $animal->id }} ] - {{ $animal->name }}
                        </option>
                    @endforeach
                </select>
                <small>
                    Qual animal apresentou sintomas?
                </small>
            </div>
            <!-- Tipo -->
            <div class="form-group mb-3">
                <label class="form-control-label" for="treatment_type"> Tipo de tratamento </label>
                <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                @if($errors->has('treatment_type'))
                    <br>
                    <div class="badge badge-danger mb-2">
                        Selecione com as opções "Preventivo" ou "Curativo"
                    </div>
                @endif
                {{--                <select--}}
                {{--                    class="form-control border {{$errors->has('treatment_type') ? 'text-danger border-danger is-invalid' : ''}}"--}}
                {{--                    id="treatment_type" name="treatment_type" required>--}}
                {{--                    <option value="{{!$health->treatment_type ? 'selected' : '' }}">Selecione</option>--}}
                {{--                    <option id="preventive" value="preventive"--}}
                {{--                        {{$health->treatment_type = 'preventive' ? 'selected' : ''}}>Preventivo--}}
                {{--                    </option>--}}
                {{--                    <option id="curative" value="curative"--}}
                {{--                        {{$health->treatment_type = 'curative' ? 'selected' : ''}}> Curativo--}}
                {{--                    </option>--}}
                {{--                </select>--}}
                <br>
                <input
                    type="radio"
                    id="preventive"
                    name="treatment_type"
                    value="preventive"
                    {{$health->treatment_type = 'preventive' ? 'checked' : ''}}
                    onchange="hidesymptom()"
                    required class="radio custom-radio">
                <label for="preventive">Preventivo</label>
                <input
                    type="radio"
                    id="curative"
                    name="treatment_type"
                    value="curative"
                    {{$health->treatment_type = 'curative' ? 'checked' : ''}}
                    onchange="showSymptom()"
                    required class="radio custom-radio">
                <label for="curative">Curativo</label>
            </div>
            <div class="form-group mb-3">
                <!-- Inicio do tratamento -->
                <label class="form-control-label" for="start_of_treatment">
                    Data de Início do Tratamento
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                </label>
                @if($errors->has('start_of_treatment'))
                    <br>
                    <div class="badge badge-danger mb-2">
                        Insira uma data entre 01/01/2005 e hoje.
                    </div>
                @endif
                <input name="start_of_treatment"
                       type="text"
                       id="start_of_treatment"
                       class="form-control border {{$errors->has('start_of_treatment') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Data no formato dd/mm/aaaa"
                       value="{{$health->start_of_treatment ? $health->start_of_treatment = date('d/m/Y', strtotime($health->start_of_treatment)) : '' }}"
                       required/>
                <small class="form-text"> Dia, mês e ano que se iniciou o tratamento</small>
            </div>

            <div class="form-group mb-3">
                <!-- Fim do tratamento -->
                <label class="form-control-label" for="end_of_treatment">
                    Data de Fim do Tratamento
                    <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
                    @if($errors->has('end_of_treatment'))
                        <br>
                        <div class="badge badge-danger mb-2">
                            Insira uma data entre 01/01/2005 e hoje.
                        </div>
                    @endif
                </label>
                <input name="end_of_treatment"
                       type="text"
                       id="end_of_treatment"
                       class="form-control border {{$errors->has('end_of_treatment') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Data no formato dd/mm/aaaa"
                       value="{{$health->end_of_treatment ? $health->end_of_treatment = date('d/m/Y', strtotime($health->end_of_treatment)) : '' }}"
                       required/>
                <small class="form-text"> Dia, mês e ano que se acabou o tratamento</small>
            </div>
            <div class="form-group mb-3">
                <!-- Doença -->
                <label class="form-control-label" for="disease">
                    Doença ou Enfermidade
                </label>
                @if($errors->has('disease'))
                    <br>
                    <div class="badge badge-danger mb-2">
                        Por favor, me informe qual a doença diagnosticada!
                    </div>
                @endif
                <input name="disease"
                       type="text"
                       id="disease"
                       class="form-control border {{$errors->has('disease') ? 'text-danger border-danger is-invalid' : ''}}"
                       placeholder="Exemplo: Tristeza Parasitária ou Amarelão"
                       value="{{$health->disease ? $health->disease : '' }}" required/>
                <small class="form-text"> Qual doença que você diagnosticou? </small>
            </div>
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col-lg-5 col-12">
        <div class="form-group mb-3" id="div_symptom">
            <!-- Sintoma -->
            <label class="form-control-label" for="symptom"> Descreva o sintoma </label>
            <!-- <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup> -->
            @if($errors->has('symptom'))
                <br>
                <div class="badge badge-danger mb-2">
                    Descreva os sintomas que o animal apresentou,<br> se o tratamento é preventivo, deixe em branco
                </div>
            @endif
            <textarea name="symptom" type="text" id="symptom"
                      class="form-control border {{$errors->has('symptom') ? 'text-danger border-danger is-invalid' : ''}}"
                      placeholder="Por exemplo: Febre alta, apatia, cabeça baixa, mucosas amareladas ou pálidas...">

                </textarea>
            <script type="text/javascript">
                document.getElementById("symptom").value = {{$health->symptom}};
            </script>
            <small class="form-text"> Descreva os sintomas que o animal apresentou, se não apresentou, deixe em
                branco </small>
        </div>
        <div class="form-group mb-3" id="div_date_symptom">
            <!-- Data do sintoma -->
            <label class="form-control-label" for="date_symptom">
                Data do Sintoma
                <!-- <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup> -->
                @if($errors->has('date_symptom'))
                    <br>
                    <div class="badge badge-danger mb-2">
                        Insira uma data entre 01/01/2005 e hoje.
                    </div>
                @endif
            </label>
            <input name="date_symptom"
                   type="text"
                   id="date_symptom"
                   class="form-control border {{$errors->has('date_symptom') ? 'text-danger border-danger is-invalid' : ''}}"
                   placeholder="Data no formato dd/mm/aaaa"
                   value="{{ $health->date_symptom ? $health->date_symptom = date('d/m/Y', strtotime($health->date_symptom)) : '' }}"/>
            <small class="form-text"> Dia, mês e ano que o animal apresentou sintomas</small>
        </div>
        <div class="form-group mb-3">
            <!-- Agente causador -->
            <label class="form-control-label" for="causer_agent">
                Agente Patológico Causador
            </label>
            @if($errors->has('causer_agent'))
                <br>
                <div class="badge badge-danger mb-2">
                    Por favor, me diga qual a agente causador!
                </div>
            @endif
            <input name="causer_agent"
                   type="text"
                   id="causer_agent"
                   class="form-control border {{$errors->has('causer_agent') ? 'text-danger border-danger is-invalid' : ''}}"
                   placeholder="Exemplo: Protozoários do gênero Babesia e rickettsias do gênero Anaplasma"
                   value="{{$health->causer_agent ? $health->causer_agent : '' }}"/>
            <small class="form-text"> O que causa essa doença? </small>
        </div>
        <div class="form-group mb-3">
            <!-- Medicamento -->
            <label class="form-control-label" for="confirm_password">
                Medicamento Utilizado
            </label>
            <sup> <i class="fa fa-asterisk" style="color:red; font-size: 7px;"></i> </sup>
            @if($errors->has('medicament_id'))
                <br>
                <div class="float-lg-right badge badge-danger mb-2">
                    Escolha um medicamento!
                </div>
            @endif
            <select name="medicament_id" id="medicament_id"
                    class="form-control border {{$errors->has('medicament_id') ? 'text-danger border-danger is-invalid' : ''}}">
                <option value="" selected>Selecione</option>
                @foreach($medicaments as $medicament)
                    <option value="{{$medicament->id}}"
                        {{$health->medicament_id ? 'selected' : ''}}>
                        [{{$medicament->id}}] - {{$medicament->name}}
                    </option>
                @endforeach
            </select>
            <small>Não encontrou o medicamento que precisava?</small>
            <br>
            <button type="button" class="btn btn-default btn-lg" data-toggle="modal"
                    data-target="#insert-medicament-modal">
                <i class="fa fa-search"></i> Procurar um medicamento
            </button>
            <small class="form-text"> Procure em uma lista se medicamentos,
                se não encontrar, você pode cadastrar um na mensagem que vai aparecer
            </small>
        </div>
    </div>
</div>
<script type="text/javascript">
    function hidesymptom() {
        $('#div_date_symptom').hide();
        $('#div_symptom').hide();
    }
    function showSymptom() {
        $('#div_date_symptom').show();
        $('#div_symptom').show();
    }
</script>
