<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JornadaAlimenticia extends Model
{
    use HasFactory;
    protected $table='tbl_jornada_alimenticia';
    protected $fillable = [
        'jorali_name',
        'jorali_description',
        'jorali_limite',
        'jorali_alcance',
        'jorali_repetitivo',
        'jorali_state',
        'user_id_create',
        'user_id_modification',
        'created_at',
        'updated_at',
    ];
}
