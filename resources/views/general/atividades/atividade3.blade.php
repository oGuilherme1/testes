{{ Form::open(['onsubmit' => 'return false', 'id' =>'form']) }}

<div class="layout-main d-flex flex-column ml-md-5 mr-md-5 pt-0 card ct-card ">
    <div class="panel-heading">

        <div class="ct-heading card-header bg-secondary text-white font-weight-bold text-uppercase">Atividade #3</div>

    </div>

    <div class="card-body bg-white">
        <div class="row flex-auto p-3">
            <p><br><br><b>#ATIVIDADE 3</b><br>
                Que tal fazermos um CRUD completo, seguindo os padrões da nossa aplicação?
            </p>
            <p>
                Imagine um cadastro de um sistema de RH (Recursos Humanos) com a finalidade de se calcular uma folha de pagamento.<br>Será apenas uma atividade simplificada, mas será apenas um exemplo de uma situação que acontece em nossa equipe...<br>
            </p>
            <p>
                Crie um cadastro de cargos, com a id e o nome do cargo. Não se esquesa de criar a Grid, os sistemas de adição,edição, visualização e deleção do cadastro (CRUD completo). Implemente a busca na grid também (muito importante).<br>
                Será necessária a criação da tabela de cargos (você terá que criar uma nova "migration" do laravel. Não se esqueça de implementar o método "rollback", para desfazer as alterações do banco. Lembrando: <b>CONSULTE SEMPRE A DOCUMENTAÇÃO DO LARAVEL.</b><br>
            </p>


        </div>


    </div>
</div>

{!!Form::close()!!}
<script>
    $(document).ready(function () {


        //Código Javascript Deve Estar Aqui!!


    });
</script>






