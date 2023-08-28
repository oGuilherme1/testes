{{ Form::open(['onsubmit' => 'return false', 'id' =>'form']) }}

<div class="layout-main d-flex flex-column ml-md-5 mr-md-5 pt-0 card ct-card ">
    <div class="panel-heading">

        <div class="ct-heading card-header bg-secondary text-white font-weight-bold text-uppercase">Atividade #2</div>

    </div>

    <div class="card-body bg-white">
        <div class="row flex-auto p-3">
            <p><br><br><b>#ATIVIDADE 2</b><br>
                Em nosso projeto, fazemos uso massivo da biblioteca w2ui (<a target="_blank" href="http://w2ui.com/web/docs/1.5/">http://w2ui.com/web/docs/1.5/</a>).<br>
                Todavia, nós fazemos uso basicamente da Grid e do sistema de alertas (popup). À esta altura, você já deve ter se deparado com a função JAVASCRIPT "msg()". Este método foi criado por nós da Conceito (assim como vários outros) e serve para emitir alertas de sucesso/erro/warning/info de forma mais automatizada.<br>
                Faça um teste: abra o console (no caso do Chrome, digite F12) e digite "msg('Mensagem de Sucesso',true);", conforme a figura abaixo:
            <div class="col">
                <img src="{{asset('assets/img_atividades/atv2_img1.png')}}" alt="image">
            </div><br><br>
            Nós fazemos uso de várias funções, e nós estendemos várias funcionalidades em nosso Laravel e Javascript, para facilitar o desenvolvimento... quebrando a cabeça um pouquinho, você logo descobrirá qual função está realizando qual operação!<br>Isto é muito importante na vida de um programador: <b>ler e entender o código, sem o auxílio direto de alguém!</b>
            </p>
            <p>
                A próxima atividade é muito simples: Crie um formulário com 4 Botões para emitir diferentes alertas, utilizando a função "msg()":<br>
                *Um alerta com uma mensagem positiva;<br>
                *Um alerta com uma mensagem negativa (erro);<br>
                *Um alerta com mensagem de erro, mas do tipo "warning";<br>
                *Um alerta neutro, com qualquer mensagem neutra e tipo "info";<br>
            </p>
                Para entender mais sobre a função javascript "msg()", veja o arquivo "resources/views/admin/layout/messages.blade.php".<br>
                Procure manter o projeto organizado: Crie um novo Controller e organize as views em pastas. Uma boa organização do projeto é essencial!<br><br><br>
            <p>

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






