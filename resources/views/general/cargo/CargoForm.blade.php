{{ Form::open(['onsubmit' => 'return false', 'id' =>'form']) }}

<div class="layout-main d-flex flex-column ml-md-5 mr-md-5 pt-0 card ct-card ">
    <div class="panel-heading">

        @if ($action == 'add')
            <div class="ct-heading card-header bg-secondary text-white font-weight-bold text-uppercase">Novo Cargo</div>
        @elseif ($action == 'edit')
            <div class="ct-heading card-header bg-secondary text-white font-weight-bold text-uppercase">Edição de Cargo</div>
        @elseif ($action == 'view')
            <div class="ct-heading card-header bg-secondary text-white font-weight-bold text-uppercase">Visualização de Cargo</div>
        @endif

    </div>

    <div class="card-body bg-white">
        <div class="row flex-auto">
            <div class="form-group col-md-2">
                {{Form::label('Código*',null,['class'=>'control-label'])}}
                {{Form::text('codigo', ($action == 'add' )?'*Novo Registro':$cargo->idcargo,['class'=>'disableVisualize form-control', 'readonly'])}}
            </div>

            <div class="form-group col-md-10">
                {{Form::label('Cargo*',null,['class'=>'control-label'])}}
                {{Form::text('cargo', isset($cargo)?$cargo->nome_cargo:null,['class'=>'disableVisualize form-control', 'id' =>'cargo'])}}
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
            
            <a href='{{route('cargo.gridView')}}' class="btn btn-secondary float-right viaAjaxPost" style="margin-top: 40px;">
                <i class="fa fa-btn fa-backward"></i>
                Voltar
            </a>
            
            <button id="btn-add-edit"  class="btn btn-primary float-right" style="margin-top: 40px;  margin-right: 25px;">
                <i class="fa fa-btn fa-envelope"></i>
                Salvar
            </button>



        @elseif ($action == 'view')
            <a href='{{route('cargo.gridView')}}' class="btn btn-secondary float-right viaAjaxPost" style="margin-top: 40px; ">
                <i class="fa fa-btn fa-backward"></i>
                Voltar
            </a>
        @endif

    </div>
</div>

{!!Form::close()!!}

<script>
    $(document).ready(function () {


        //Ação do Botão ADD/EDIT
        $('#btn-add-edit').on('click', function(){

            AjaxAddEdit();
        });



        //FIM DO TYPEAHEAD FORNECEDOR
        function AjaxAddEdit(){

            cargo = $('#cargo').val();
            ativo = $('#ativo').val();

            if (!cargo){
                msg('Preencha o formulário corretamente e tente realizar a operação novamente<br>Os campos marcados com asterisco são obrigatórios',false,'warning');
                return;
            }

            url = '';
            @if ($action == 'add')
                url =  "{{route('cargo.insert')}}",
            @elseif ($action == 'edit')
                url =  "{{route('cargo.update',[$cargo->idcargo])}}",
            @endif

            doPostAjaxCall(
                url,
                {
                    cargo: cargo,
                    ativo: ativo

                },
                function(resposta){
                    msg(resposta.message, resposta.success)
                    if (resposta.success){
                        getView('{{route('cargo.gridView')}}', []);
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