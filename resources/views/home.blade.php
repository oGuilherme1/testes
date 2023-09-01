<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <script src="components/jquery/jquery.min.js"></script>
    <script src="components/mask/arquivoMask.js"></script>
    <script src="components/gjigo/arquivoGjigo.js"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />



</head>


<body style="display: none !important;">
<!-- Overlay -->
<div id="overlay" class="preloading-effect h-100 w-100 d-none justify-content-center align-items-center"
     style="z-index: 999998 !important; "></div>

<!-- Preloading -->
<div id="mask" name='mask' class="preloading-effect h-100 w-100 d-none justify-content-center align-items-center">
    <img src="{{asset('assets/img/preloading-img.svg')}}" alt="Carregando...">
</div>

@include('admin.layout.header', ['sidemenu' => true])


{{--<script src="{{asset('js/app.js')}}"></script>--}}

{{--<link rel="stylesheet" href="css/app.css">--}}


<div id="sidr">
    <h4 class="d-inline-block w-100 menu_title">MENU DO USUÁRIO
        <div class="close-menu float-right pt-md-2" id="closeAction">
            <i class="fa fa-times fa-fw"></i>
        </div>
    </h4>

    <!-- Ítens de Menu-->
    <ul class="side-menu">
        <li>
            <a data-toggle="collapse" href="#multiCollapseUsuarios" aria-expanded="false"
               aria-controls="multiCollapseUsuarios">
                <i class="fa fa-users fa-fw mr-2"></i>Usuários
                <i class="fa fa-chevron-down trigger-right"></i>

            </a>
            <div class="collapse multi-collapse" id="multiCollapseUsuarios">
                <ul class="side-submenu">
                        <li><a href="{{route('usuario.GridView')}}" class="viaAjaxPost">Usuários do Sistema</a></li>
                        <li><a href="{{route('perfil_usuario.GridView')}}" class="viaAjaxPost">Perfil de Usuário</a></li>

                </ul>
            </div>

        </li>

        <li>
            <a data-toggle="collapse" href="#multiCollapseAtividades" aria-expanded="false"
               aria-controls="multiCollapseAtividades">
                <i class="fa fa-graduation-cap fa-fw mr-2"></i>Atividades
                <i class="fa fa-chevron-down trigger-right"></i>

            </a>
            <div class="collapse multi-collapse" id="multiCollapseAtividades">
                <ul class="side-submenu">
                    <li><a href="{{route('atividades.FormView', [1])}}" class="viaAjaxPost">Atividade #1</a></li>
                    <li><a href="{{route('atividades.FormView', [2])}}" class="viaAjaxPost">Atividade #2</a></li>
                    <li><a href="{{route('atividades.FormView', [3])}}" class="viaAjaxPost">Atividade #3</a></li>
                    <li><a href="{{route('atividades.FormView', [4])}}" class="viaAjaxPost">Atividade #4</a></li>
                    <li><a href="{{route('atividades.FormView', [5])}}" class="viaAjaxPost">Atividade #5</a></li>
                    <li><a href="{{route('atividades.FormView', [6])}}" class="viaAjaxPost">Atividade #6 -  Bônus</a></li>

                </ul>
            </div>
        </li>

        <li>
            <a data-toggle="collapse" href="#multiCollapseResolucoes" aria-expanded="false"
               aria-controls="multiCollapseResolucoes">
                <i class="fa fa-check fa-fw mr-2"></i>Resoluções
                <i class="fa fa-chevron-down trigger-right"></i>
            </a>
            <div class="collapse multi-collapse" id="multiCollapseResolucoes">
                <ul class="side-submenu">
                    <li><a href="{{route('atividades.resolucao1')}}" class="viaAjaxPost">Resolução Atividade #1</a></li>
                    <li><a href="{{route('atividades.resolucao2')}}" class="viaAjaxPost">Resolução Atividade #2</a></li>
                    <li><a href="{{route('atividades.resolucao3')}}" class="viaAjaxPost">Resolução Atividade #3</a></li>
                    <li><a href="{{route('atividades.resolucao4')}}" class="viaAjaxPost">Resolução Atividade #4</a></li>
                    <li><a href="{{route('atividades.ResolucaoPendente')}}" class="viaAjaxPost">Resolução Atividade #5</a></li>
                    <li><a href="{{route('atividades.ResolucaoPendente')}}" class="viaAjaxPost">Resolução Atividade #6</a></li>

                </ul>
            </div>
        </li>


        {{--<li>
            <a data-toggle="collapse" href="#multiCollapseRelatorio" aria-expanded="false"
               aria-controls="multiCollapseRelatorio"><i
                        class="fa fa-book fa-fw"></i>Relatórios<i class="fa fa-chevron-down trigger-right"></i></a>

            <div class="collapse multi-collapse" id="multiCollapseRelatorio">
                <ul class="side-submenu">
                    <li><a href="" class="">Relatório A</a></li>
                    <li><a href="" class="">Relatório B</a></li>
                    <li><a href="" class="">Relatório C</a></li>
                </ul>
            </div>
        </li>--}}

    </ul>
</div>

<div class="layout-main  d-flex flex-column bg-white">
    <div class="container-fluid pt-4">
        <!-- Container que envolve o Grid -->
        <div class="row" class="">
            <div class="col" id="contentView">
                @yield('content')
            </div>
            @include('admin.layout.footer')
        </div>


    </div>
    @include('admin.layout.footer')
</div>


<link rel="stylesheet" href="components/bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="components/w2ui/w2ui-1.5.rc1.min.css">
<link rel="stylesheet" href="components/sidr/stylesheets/jquery.sidr.light.css">
<link rel="stylesheet" href="css/layout.css">



<script src="components/sidr/jquery.sidr.min.js"></script>
<script src="components/bootstrap/js/bootstrap.min.js"></script>
<script src="components/font-awesome/font-awesome.js"></script>


<script>
    $(document).ready(function(){
        $('body').show();
        setMaskOnAjaxPost();
        setEventsAfterAjax();
        eventExecuteView();
        setShortcuts();

        setSidrEvents();

        //Carrega o arquivo Locale da Bibliote W2UI (em PORTUGUÊS)
        w2utils.locale('{{asset('components/w2ui/w2ui-pt-br.json')}}');

    });

</script>
@include('admin.layout.messages')
<script src="components/w2ui/w2ui-1.5.rc1.min.js"></script>
<script src="{{asset('js/adminjs.js')}}"></script>


</body>
</html>





