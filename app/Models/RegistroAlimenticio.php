<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroAlimenticio extends Model
{
    use HasFactory;
    protected $table='tbl_registro_alimenticio';
    protected $fillable = [
        'regali_date',
        'regali_state',
        'serv_id',
        'jorali_id',
        'user_id_create',
        'user_id_check',
        'user_id_modification',
        'created_at',
        'updated_at',
    ];
}
