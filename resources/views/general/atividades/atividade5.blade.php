{{ Form::open(['onsubmit' => 'return false', 'id' =>'form']) }}

<div class="layout-main d-flex flex-column ml-md-5 mr-md-5 pt-0 card ct-card ">
    <div class="panel-heading">

        <div class="ct-heading card-header bg-secondary text-white font-weight-bold text-uppercase">Atividade #5</div>

    </div>

    <div class="card-body bg-white">
        <div class="row flex-auto p-3">
            <p><br><br><b>#ATIVIDADE 5</b><br>
                Estamos chegando na reta final... Parabéns!!!
            </p>
            <p>
                Crie, novamente, um CRUD COMPLETO, mas desta vez será um "Cadastro de Férias" dos nossos funcionários!<br>
                Neste cadastro, será selecionado o funcionário, onde será retornado a ID do funcionário, Matrícula, Nome, data de Admissão e Salário.<br>
                Neste cadastro, também, será informado dois campos: "Data de Gozo Inicial" e "Data de Gozo Final", dois campos de data, referentes ao Início e Término das férias, respectivamente.<br>
                Este formulário também possui outras particularidades, conforme a figura abaixo:<br>

            </p>
            <div class="col w-100">
                <img src="{{asset('assets/img_atividades/atv5_img1.png')}}" alt="image">
            </div>
            <p>
            <p><br>
                Este formulário se define da seguinte forma:
            </p>
            
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li>A data de Gozo Inicial NÃO deve ser superior à Data de Gozo Final;</li>
                    <li>A Data de Gozo Inicial deve ter, no mínimo, exatos um ano após a data de Admisssão (Ex.: Se a data de Admisssão está em 28/10/2005, a data de gozo inicial deve ser superior ou igual à 28/10/2006)</li>
                    <li>Veja no exemplo, que as férias são compostas da seguinte forma: 17 dias de Férias em Janeiro e 13 dias de Férias em Fevereiro (Confirme em seu calendario). A somatória dos dias de férias e ambos os meses, neste caso, é 30 dias.<br>
                        As férias devem ter, no mínimo 10 dias e, no máximo 30.
                    </li>
                    <li>Ao se clicar no botão "Calcular", o cálculo é realizado, e é exibida na grid w2ui o "MAPA DE PAGAMENTO DE FÉRIAS". Este mapa demonstra, mês a mês, o quanto deve ser pago de férias. (Do mês 1 ao mês 12)</li>
                    <li><b>ATENÇÃO! O Cálculo foi realizado da seguinte forma:</b><br>
                    Primeiro, deve-se saber o valor do dia trabalhado do funcionário em Janeiro e o valor do dia trabalhado do funcionário em fevereiro.<b> O Valor do Dia Varia de acordo com a quantidade de dias no mês, sendo:</b><br>
                        *Em Janeiro de 2019 (Mês com 31 dias), o dia do funcionário vale R$140,3225 (Salário Dividido por 31). Sendo assim, 17 dias de férias a este valor, encontra-se 2385,48.<br>
                        *Em Fevereiro de 2019 (Mês com 28 dias), o dia do funcionário vale R$155,371 (Salário Dividido por 28).Sendo asssim,  13 dias de férias a este valor, encontra-se 2019,64.<br>
                        *Somando-se ambos os valores, encontra-se o total aproximado: R$4.405,12.<br>
                        OBS. O campo de total é um campo de somente leitura. Este campo NÃO DEVE SER DEFINIDO PELO USUÁRIO!
                    </li>
                    <li>Ao clicar em "Salvar", persista os valores no banco.</li>

                </ul>

            </div>

        </div>
        <div class="row">
            <p>
                <br>
                Você tem total liberdade para criar a(s) tabela(s) da forma que bem entender! Mas lembre-se: utilize as migrations do laravel!
                <br>
                Achou complicado esta questão de datas? Que nada! É muito fácil trabalhar com datas no Laravel!<br>
                Utilize a biblioteca "Carbon" do Laravel para manipular datas. É muito simples!Ela já vem instalada junto com o Laravel!! (<a target="_blank" href="https://carbon.nesbot.com/docs/">https://carbon.nesbot.com/docs/</a>)<br>
                <br>
                <br>
            </p>
        </div>
        <p>
            Boa Sorte!!! Vai dar certo! :)<br><br><br>
        </p>


    </div>
</div>

{!!Form::close()!!}
<script>
    $(document).ready(function () {


        //Código Javascript Deve Estar Aqui!!


    });
</script>






