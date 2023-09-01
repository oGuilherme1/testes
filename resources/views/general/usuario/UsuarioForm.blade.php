{{ Form::open(['onsubmit' => 'return false', 'id' =>'form']) }}

<div class="layout-main d-flex flex-column ml-md-5 mr-md-5 pt-0 card ct-card ">
    <div class="panel-heading">

        @if ($action == 'add')
            <div class="ct-heading card-header bg-secondary text-white font-weight-bold text-uppercase">Novo Usuário</div>
        @elseif ($action == 'edit')
            <div class="ct-heading card-header bg-secondary text-white font-weight-bold text-uppercase">Edição de Usuário</div>
        @elseif ($action == 'view')
            <div class="ct-heading card-header bg-secondary text-white font-weight-bold text-uppercase">Visualização de Usuário</div>
        @endif

    </div>

    <div class="card-body bg-white">
        <div class="row flex-auto">
            <div class="form-group col-md-2">
                {{Form::label('Código*',null,['class'=>'control-label'])}}
                {{Form::text('codigo', ($action == 'add' )?'*Novo Registro':$usuario->id,['class'=>'disableVisualize form-control', 'readonly'])}}
            </div>

            <div class="form-group col-md-10">
                {{Form::label('Nome*',null,['class'=>'control-label'])}}
                {{Form::text('nome', isset($usuario)?$usuario->name:null,['class'=>'disableVisualize form-control', 'id' =>'nome'])}}
            </div>

            <div class="form-group col-md-4 ">
                {{Form::label('CPF*',null,['class'=>'control-label'])}}
                {{Form::text('cpf', isset($usuario)?$usuario->cpf:null,['class'=>'disableVisualize form-control maskCPF', 'id' => 'cpf'])}}
            </div>

            <div class="form-group col-md-4">
                {{Form::label('Data de nascimento*',null,['class'=>'control-label'])}}
                {{Form::text('data_nascimento', isset($usuario)?$dataDesformatada:null,['class'=>'disableVisualize form-control dataGjigo maskData', 'id' =>'data_nascimento'])}}
            </div>

            <div class="form-group col-md-4">
                {{Form::label('Nome da mãe*',null,['class'=>'control-label'])}}
                {{Form::text('nome_da_mae', isset($usuario)?$usuario->nome_da_mae:null,['class'=>'disableVisualize form-control', 'id' =>'nome_da_mae'])}}
            </div>

            <div class="form-group col-md-6">
                {{Form::label('Perfil de Usuário*',null,['class'=>'control-label'])}}
                <select class="form-control" id="perfil">
                    @foreach ($perfis as $obj)
                        <option value="{{$obj->id}}">{{$obj->nome}}</option>
                    @endforeach
                </select>

            </div>

            <div class="form-group col-md-6">
                {{Form::label('Email/Login*',null,['class'=>'control-label'])}}
                {{Form::text('email', isset($usuario)?$usuario->email:null,['class'=>'disableVisualize form-control','type' => 'email', 'id' =>'email'])}}
            </div>

            <div class="form-group col-md-3">
                <label for="password">Senha*</label>
                <input type="password" class="form-control disableVisualize" id="password" placeholder="******">
            </div>

            <div class="form-group col-md-3">
                <label for="password">Confirmar Senha*</label>
                <input type="password" class="form-control disableVisualize" id="password_confirm" placeholder="******">
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
            
            <a href='{{route('usuario.GridView')}}' class="btn btn-secondary float-right viaAjaxPost" style="margin-top: 40px;">
                <i class="fa fa-btn fa-backward"></i>
                Voltar
            </a>
            
            <button id="btn-add-edit"  class="btn btn-primary float-right" style="margin-top: 40px;  margin-right: 25px;">
                <i class="fa fa-btn fa-envelope"></i>
                Salvar
            </button>



        @elseif ($action == 'view')
            <a href='{{route('usuario.GridView')}}' class="btn btn-secondary float-right viaAjaxPost" style="margin-top: 40px; ">
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

            nome = $('#nome').val();
            perfil_id = $('#perfil').val();
            email = $('#email').val();
            cpf = $('#cpf').val();
            data_nascimento = $('#data_nascimento').val();
            nome_da_mae = $('#nome_da_mae').val();
            senha = $('#password').val();
            senha_confirm = $('#password_confirm').val();
            ativo = $('#ativo').val();

            if (!nome || !perfil_id || !email || !cpf || !data_nascimento ){
                msg('Preencha o formulário corretamente e tente realizar a operação novamente<br>Os campos marcados com asterisco são Obrigatórios',false,'warning');
                return;
            }


            if (senha != senha_confirm){
                msg('As senhas não conferem.',false,'warning');
                return;
            }

            url = '';
            @if ($action == 'add')
                url =  "{{route('usuario.insert')}}",
            @elseif ($action == 'edit')
                url =  "{{route('usuario.update',[$usuario->id])}}",
            @endif

            doPostAjaxCall(
                url,
                {
                    nome: nome,
                    perfil_id: perfil_id,
                    email: email,
                    cpf: cpf,
                    data_nascimento: data_nascimento,
                    nome_da_mae: nome_da_mae,
                    senha: senha,
                    senha_confirm: senha_confirm,
                    ativo: ativo

                },
                function(resposta){
                    msg(resposta.message, resposta.success)
                    if (resposta.success){
                        getView('{{route('usuario.GridView')}}', []);
                    }

                },
                function(resposta){
                    //msg(resposta.responseText,false,'log');
                }

            )




        }



        @if ($action == 'edit' || $action == 'view')

        //Reload Exceptions
        $('#perfil').val('{{$usuario->perfil_id}}');
        $('#ativo').val('{{$usuario->ativo}}');
        @endif

        @if ($action == 'view')
            disableForm();
        @endif





    });
</script>








