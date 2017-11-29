<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class recibo extends Model
{
    protected $table = 'recibo';

    protected $primaryKey = 'idrec';

    public $timestamps =false;

    protected $fillable = [
        'idrec',
        'id',
        'nic', 
        'fechavencimiento',
        'montototal',
        'total_consumido',
        'estado',
        'tiporecibo'
    ];
    
}
