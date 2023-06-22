<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class update_img extends Model
{
    use HasFactory;
    protected $table = "datos_img";
    protected $fillable = [
        'nombre_url',
        'nombre_descrip',
        'etiqueta', 
        'fecha',
        'descripcion',
    ];
}
