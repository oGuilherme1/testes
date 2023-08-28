{{ Form::open(['onsubmit' => 'return false', 'id' =>'form']) }}

<div class="layout-main d-flex flex-column ml-md-5 mr-md-5 pt-0 card ct-card ">
    <div class="panel-heading">

        <div class="ct-heading card-header bg-secondary text-white font-weight-bold text-uppercase">Atividade #4</div>

    </div>

    <div class="card-body bg-white">
        <div class="row flex-auto p-3">
            <p><br><br><b>#ATIVIDADE 4</b><br>
                Como estão indo as atividades? Está muito difícil? Não exite em nos perguntar para sanar qualquer dúvida, OK?
            </p>
            <p>
                Novamente, outro CRUD COMPLETO: crie um cadastro de matrículas de funcionários, onde irá se selecionar o usuário e o respectivo cargo.
                <br>Neste cadastro, deve conter um campo de data de admissão, contendo a data de admissão do funcionário,seu respectivo salário (R$) e número de matrícula, lembrando que:<br>
                *O campo de data deve ser um input de data, no formato dd/mm/aaaa. Não esqueça de validar estas informações no PHP;<br>
                *O campo de salário deve possuir uma máscara para formatos monetários (Ex.: 2.540,00). Não é necessário o R$(Erre-Cifrão);<br>
                *O número de matrícula deve ser um número inteiro, único por funcionário<br><br>
                OBS.: Caso seja necessário, adicione um componente de máscara de input financeiro para Jquery.
            </p>
            <p>
                <span class="font-weight-bold">SINTA-SE LIVRE PARA FAZER O FORMULÁRIO DA FORMA QUE ACHAR MELHOR!</span> Mas tenha sempre em mente a usabilidade do sistema, OK!

            </p>
            <p>
                <br><br><br>
                Boa Atividade! :)
                <br><br><br>
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






