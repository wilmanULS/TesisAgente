<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TDocenteAsignatura extends Model
{
    protected $table='t_docente_asignaturas';
    protected  $primaryKey='dasg_id';
    public $timestamps=false;

    protected $fillable=[

        'dasg_fecha_inicio',
        'dasg_fecha_fin',
        'user_id',
        'asig_id',

    ];
}
