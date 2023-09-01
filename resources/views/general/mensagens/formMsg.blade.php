<div class="layout-main d-flex flex-column ml-md-5 mr-md-5 pt-0 card ct-card ">


    <div class="panel-heading">

        <div class="ct-heading card-header bg-secondary text-white font-weight-bold text-uppercase">Mensagens</div>

    </div>
    
    <div class="card-body bg-white">
        <div class="row flex-auto">
            <div class="form-group col-md-10">
                <h5 for="exampleInputEmail1">Botão de sucesso: </h5>
                <button id="btn-sucesso" class="btn btn-outline-success btn-sm">Sucesso</button>
            </div>

            <div class="form-group col-md-10">
                <h5 for="exampleInputEmail1">Botão de erro: </h5>
                <button id="btn-erro" class="btn btn-outline-danger btn-sm">Erro</button>
            </div>

            <div class="form-group col-md-10">
                <h5 for="exampleInputEmail1">Botão de aviso: </h5>
                <button id="btn-aviso" class="btn btn-outline-warning btn-sm">Aviso</button>
            </div>

            <div class="form-group col-md-10">
                <h5 for="exampleInputEmail1">Botão de info: </h5>
                <button id="btn-info" class="btn btn-outline-info btn-sm">Info</button>
            </div>
            
        </div>
    </div>
</div>


<script>
    $(document).ready(function () {
        $('#btn-sucesso').click(function () {
           msg('Cadastro realizado com sucesso!', true);   
        });

        $('#btn-erro').click(function () {
           msg('Não foi possivel realizar o cadastro!', '', 'danger');   
        });

        $('#btn-aviso').click(function () {
           msg('Não foi possivel fazer login, senha incorreta!', '', 'warning');   
        });

        $('#btn-info').click(function () {
           msg('Registro alterado!');   
        });
    });
</script>