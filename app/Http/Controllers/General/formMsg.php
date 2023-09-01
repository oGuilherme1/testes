<?php

namespace App\Http\Controllers\General;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class formMsg extends Controller
{
    public function verForm(){
        return view('general.mensagens.formMsg');
    }
}
