<?php

namespace App\Models\General;

use App\Models\General\Matricula;
use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargo';
    
    protected $primaryKey = 'idcargo';

    public function matriculaCargo()
    {

        return $this->hasOne(Matricula::class, 'cargo_id', 'idcargo');

    }

    
}
