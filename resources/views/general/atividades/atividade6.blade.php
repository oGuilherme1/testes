{{ Form::open(['onsubmit' => 'return false', 'id' =>'form']) }}

<div class="layout-main d-flex flex-column ml-md-5 mr-md-5 pt-0 card ct-card ">
    <div class="panel-heading">

        <div class="ct-heading card-header bg-secondary text-white font-weight-bold text-uppercase">Atividade #6</div>

    </div>

    <div class="card-body bg-white">
        <div class="row flex-auto p-3">
            <h1>Parabéns! Se você cumpriu todas as outras 5 etapas, você está prestes a se tornar um (quase) mestre do Laravel!</h1>
            <p>
                Este atividade é facultativa, ou seja, não se sinta pressionado a fazê-la caso não queira, ok?<br>
                Repare que a nossa aplicação não possui nenhum relatório... :(<br>
                Crie um relatório (Você te total liberdade para decidir como fazê-lo), com emissão em .pdf, onde se retorne um .pdf com os dados dos funcionário, trazendo o número de matrícula, nome do funcionário, cpf, data de admissão, cargo e salário.<br>
                O importante de nosso relatório são os filtros: a intenção é que o nosso relatório permita filtros de relatório por cargo, data de admisssão, nome e faixa salarial (salário entre valor A e B, por exemplo).<br>
                Consegue atender o desafio??
                <br><br>
                Para gerar o relatório, você pode utilizar a ferramenta que desejar, como por exemplo, o "Fireguard Report" (<a target="_blank" href="https://github.com/fireguard/report">https://github.com/fireguard/report</a>).<br>
                Esta ferramenta pode ser instalada via "Composer". Não conhece o composer?? Você pode ler mais sobre ele aqui: <a target="_blank" href="https://getcomposer.org/">https://getcomposer.org/</a><br><br><br>

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






