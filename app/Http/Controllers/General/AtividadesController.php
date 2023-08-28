<?php

namespace App\Http\Controllers\General;

use App\Models\Utils\SearchUtils;
use DB;
use App\Http\Controllers\Controller;
use App\Models\General\PerfilUsuario;
use Illuminate\Http\Request;



class AtividadesController extends Controller
{

    public function FormView($atividade){

        $form = '';
        switch ((int)$atividade){
            case 1:{
                $form = 'general.atividades.atividade1';
                break;
            }
            case 2:{
                $form = 'general.atividades.atividade2';
                break;
            }
            case 3:{
                $form = 'general.atividades.atividade3';
                break;
            }
            case 4:{
                $form = 'general.atividades.atividade4';
                break;
            }
            case 5:{
                $form = 'general.atividades.atividade5';
                break;
            }
            case 6:{
                $form = 'general.atividades.atividade6';
                break;
            }
            default:{
                $form = 'general.atividades.atividade1';
            }

        }

        return view($form, [
        ]);

    }

    public function ResolucaoPendente(){



        return view('general.atividades.default_resolucao', [
        ]);

    }






}
