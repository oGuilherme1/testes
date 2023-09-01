{{ Form::open(['onsubmit' => 'return false', 'id' =>'form']) }}

<div class="layout-main d-flex flex-column ml-md-5 mr-md-5 pt-0 card ct-card ">
    <div class="panel-heading">

        @if ($action == 'add')
        <div class="ct-heading card-header bg-secondary text-white font-weight-bold text-uppercase">Nova Matricula</div>
        @elseif ($action == 'edit')
        <div class="ct-heading card-header bg-secondary text-white font-weight-bold text-uppercase">Edição da Matricula</div>
        @elseif ($action == 'view')
        <div class="ct-heading card-header bg-secondary text-white font-weight-bold text-uppercase">Visualização da Matricula</div>
        @endif

    </div>

    <div class="card-body bg-white">
        <div class="row flex-auto">
            <div class="form-group col-md-2">
                {{Form::label('Matricula*',null,['class'=>'control-label'])}}
                {{Form::text('codigo', ($action == 'add' )?'*Novo Registro':$matricula->id,['class'=>'disableVisualize form-control', 'readonly'])}}
            </div>

            <div class="form-group col-md-5">
                {{Form::label('Usuário*',null,['class'=>'control-label'])}}
                <select class="form-control" id="usuario">
                    @foreach ($usuario as $obj)
                        <option value="{{$obj->id}}">{{$obj->name}}</option>
                    @endforeach
                </select>

            </div>


            <div class="form-group col-md-5">
                {{Form::label('Cargo*',null,['class'=>'control-label'])}}
                <select class="form-control" id="cargo">
                    @foreach ($cargo as $obj)
                        <option value="{{$obj->idcargo}}">{{$obj->nome_cargo}}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-group col-md-2">
                {{Form::label('Data admissao*',null,['class'=>'control-label'])}}
                {{Form::text('data_admissao', isset($matricula)?$dataDesformatada:null,['class'=>'disableVisualize form-control dataGjigo maskData', 'id' =>'data_admissao'])}}
            </div>


            <div class="form-group col-md-2">
                {{Form::label('Salario*',null,['class'=>'control-label'])}}
                {{Form::text('salario_funcionario', isset($matricula)?$matricula->salario_funcionario:null,['class'=>'disableVisualize text-left form-control maskMonetario', 'id' =>'salario_funcionario'])}}
            </div>

            <div class="form-group col-md-2">
                {{Form::label('Status*',null,['class'=>'control-label'])}}
                <select class="form-control disableVisualize" id="ativo">
                    <option value="1">Ativo</option>
                    <option value="0">Inativo</option>
                </select>

            </div>


        </div>


        @if ($action == 'add' || $action == 'edit')

        <a href='{{route('matricula.gridView')}}' class="btn btn-secondary float-right viaAjaxPost" style="margin-top: 40px;">
            <i class="fa fa-btn fa-backward"></i>
            Voltar
        </a>

        <button id="btn-add-edit" class="btn btn-primary float-right" style="margin-top: 40px;  margin-right: 25px;">
            <i class="fa fa-btn fa-envelope"></i>
            Salvar
        </button>



        @elseif ($action == 'view')
        <a href='{{route('matricula.gridView')}}' class="btn btn-secondary float-right viaAjaxPost" style="margin-top: 40px; ">
            <i class="fa fa-btn fa-backward"></i>
            Voltar
        </a>
        @endif

    </div>
</div>

{!!Form::close()!!}

<script src="components/mask/mask.js"></script>
<script src="components/gjigo/gjigo.js"></script>

<script>
    
    $(document).ready(function () {

        //Ação do Botão ADD/EDIT
        $('#btn-add-edit').on('click', function(){

            AjaxAddEdit();
        });

        //FIM DO TYPEAHEAD FORNECEDOR
        function AjaxAddEdit(){
      
            usuario = $('#usuario').val();
            cargo = $('#cargo').val();
            data_admissao = $('#data_admissao').val();
            salario_funcionario = $('#salario_funcionario').val();


            console.log(salario_funcionario);
            ativo = $('#ativo').val();

            if (!cargo || !usuario || !data_admissao || !salario_funcionario ){
                msg('Preencha o formulário corretamente e tente realizar a operação novamente<br>Os campos marcados com asterisco são obrigatórios',false,'warning');
                return;
            }

            url = '';
            @if ($action == 'add')
                url =  "{{route('matricula.insert')}}",
            @elseif ($action == 'edit')
                url =  "{{route('matricula.update',[$matricula->id])}}",
            @endif

            doPostAjaxCall(
                url,
                {
                    usuario: usuario,
                    cargo: cargo,
                    data_admissao: data_admissao,
                    salario_funcionario: salario_funcionario,
                    ativo: ativo

                },
                function(resposta){
                    msg(resposta.message, resposta.success)
                    if (resposta.success){
                        getView('{{route('matricula.gridView')}}', []);
                    }

                },
                function(resposta){
                    //msg(resposta.responseText,false,'log');
                }
            )
        }


        @if ($action == 'edit' || $action == 'view')

        //Reload Exceptions

        @endif

        @if ($action == 'view')
            disableForm();
        @endif

    });
</script>