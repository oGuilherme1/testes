<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="author" content="Bloqueio Acesso - Login">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{config('app.name')}} - Login</title>
    <link rel="shortcut icon" href="../favicon.ico">


    <link rel="stylesheet" href="components/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/layout.css">

</head>

<body>
<!-- start-Conteúdo do Login -->
<div class="layout-login h-100 d-flex flex-column">
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center">
        <div class="row w-100 mb-4">
            <div class="col text-center">
                <img src="{{asset('layout/assets/img/logo.png')}}" alt="">
            </div>
        </div>
        <div class="row col-lg-4 col-md-6">
            <div class="col">

                <!-- start-Formulário de Login -->
                <div class="card">
                    <div class="card-body">
                        <form action="/Login" method="POST">

                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="user">Usuário</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="oi oi-person"></i></span>
                                    <input type="email" class="form-control" name="email" id="user">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Senha</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1"><i class="oi oi-lock-locked"></i></span>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                            </div>

                            <hr>


                            <!-- <div class="form-check">
                              <label class="form-check-label">
                                <input type="checkbox" class="form-check-input">
                                Lembre-me
                              </label>
                            </div> -->
                            <button type="submit" class="btn btn-primary btn-block">ENTRAR</button>
                            @if(isset($error))
                                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                    <strong>{{$error}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
                <!-- end -->

            </div>
        </div>
    </div>
    <!-- end -->


</div>
@include('admin.layout.footer')
<!-- end -->


<script src="js/app.js"></script>
<script src="components/bootstrap/js/bootstrap.min.js"></script>




</body>

</html>
