{{ Form::open(['onsubmit' => 'return false', 'id' =>'form']) }}

<div class="layout-main d-flex flex-column ml-md-5 mr-md-5 pt-0 card ct-card ">
    <div class="panel-heading">

        <div class="ct-heading card-header bg-secondary text-white font-weight-bold text-uppercase">Atividade #1</div>

    </div>

    <div class="card-body bg-white">
        <div class="row flex-auto p-3">
            <h1>Parabéns! Você instalou o projeto com Sucesso!</h1>
            <p>
                Nós sabemos que foi bem trabalhoso chegar até aqui... Laravel é realmente um pouco chato de se configurar, não acha?
                A boa notícia é que este processo é realizado uma única vez!!!
                Partimos do princípio que o arquivo PDF já foi lido. Sendo assim, seguiremos com as nossas atividades!<br>
                O sistema já possui dois cadastros completos prontos: Usuários do Sistema e Perfil de Usuários.
                Veja como foram feitos os cadastros, analise os códigos inicialmente. Isto será um bom ponto de partida...<br>
                Trata-se de uma aplicação MVC, construída em Laravel. Os arquivos estão separados em Pastas & Funções:<br><br>
                *Na pasta "app/Models" encontram-se os Models da aplicação;<br>
                *Na pasta "app/Http/Controllers", os respectivos controllers;<br>
                *Na pasta "resources/views" se encontram as views da aplicação;<br>
                *Na pasta "routes" se encontram as rotas da aplicação;<br>
                *O menu lateral se encontra em "resources/views/home.blade.php". É este arquivo que gera o menu lateral da aplicação, e onde muito provavelmente, você terá que modificar para atender as atividades.<br><br>
                Procure sempre utilizar as classes do Bootstrap quando se tratar de inputs, botões, abas... <b>EVITE UTILIZAR COMPONENTES HTML SEM BOOTSTRAP!</b><br>
                Veja como as funcionalidades se relacionam para os cadastros de "Usuário" e "Perfil de Usuário". Não é tão complicado quanto parece!<br>
                Por fim, vamos à atividade 1.
            </p>
            <p><br><br><b>#ATIVIDADE 1</b><br>
                O cadastro de usuários foi feito incompleto de forma intencional. Existem muito poucos dados neste cadastro.<br>
                Altere o cadastro de usuários, os campos de CPF, Data de Nascimento e Nome da Mãe no cadastro mesmo, sendo que:<br>
                *CPF deve conter um input de máscara. Existem vários Maskt Inputs para Jquery. Sendo assim, será necessário adicionar um Input Mask ao Projeto na pasta "public/components". Posteriormente, também será necessário adicionar uma referência no arquivo "resources/views/home.blade.php".<br>
                *A data de nascimento deve ser informada em formato dd/mm/YYY. Novamente, existem varios datepickers para Jquery. Adicione um datepicker ao projeto, seguindo basicamente, os mesmos procedimentos do inputmask.<br>
                <br>
                Exemplo e Inputmask: <a target="_blank" href="https://robinherbots.github.io/Inputmask/">https://robinherbots.github.io/Inputmask/</a><br>
                Exemplo de DatePicker: <a target="_blank" href="https://gijgo.com/datepicker/example/bootstrap-4">https://gijgo.com/datepicker/example/bootstrap-4</a><br><br>
                Lembrando que, os novos campos devem ser adicionados através de "migrations" do laravel, utilizando a linha de comando do laravel "Artisan Tinker" (<a target="_blank" href="https://laravel.com/docs/5.8/migrations">https://laravel.com/docs/5.8/migrations</a>)<br><br>
                As resoluções das atividades devem estar no menu "Resoluções". No caso desta resolução, <span class="font-weight-bold">NÃO É NECESSÁRIO REFAZER O CADASTRO, APENAS MODIFICÁ-LOS E COLOCAR A URL/ROTA NO MENU LATERAL COMO RESULUÇÃO DA ATIVIDADE 1.</span><br><br>

            </p>
            <p>
                Não se esqueça, também, de adicionar os campos recém criados na Grid de Pesquisa de usuários, para que a mesma dê suporte à pesquisa por CPF e Data de nascimento!<br>
            <div class="col">
                <img src="{{asset('assets/img_atividades/atv1_img1.png')}}" alt="image">
            </div>
            </p>
            <p>
                Neste Processo, lembramos que a <span class="font-weight-bold">CONSULTAS À DOCUMENTAÇÃO DO LARAVEL SÃO ESSENCIAIS!</span><br>
                Mais Informações em: <a target="_blank" href="https://laravel.com/docs/5.8/">https://laravel.com/docs/5.8/</a><br><br>
                Boa Atividade! :)<br><br><br>
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






