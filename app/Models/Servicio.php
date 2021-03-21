<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $table='tbl_servicio';
    protected $fillable = [
        'serv_name',
        'serv_description',
        'serv_state',
        'user_id_create',
        'user_id_modification',
        'created_at',
        'updated_at',
    ];
}
