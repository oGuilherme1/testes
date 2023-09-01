<?php

namespace App\Models\General;
use App\Models\User;
use App\Models\General\Cargo;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table ='matricula';

    public function usuarioId(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function cargoId(){
        return $this->belongsTo(Cargo::class, 'cargo_id','id');
    }
}
