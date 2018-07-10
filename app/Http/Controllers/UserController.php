<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\User;
use App\TDocenteAsignatura;
use DB;

class UserController extends Controller
{
    //
    public function index(Request $request)
    { //revise como parametro un request

        $catDocentes = DB::table('users')
            ->select('users.role_id', 'users.name', 'users.id')
            ->where('role_id', '=', '3')
            ->get();

        $nivel = DB::table('t_cat_asignatura')
            ->select('t_cat_asignatura.as_nivel')
            ->distinct()
            ->get();

        return view("create", ["catDocentes" => $catDocentes, "nivel" => $nivel]);
    }

    public function Edit($id) // nos muestra el formulario
    {


        $catDocentes = DB::table('users')
            ->select('users.role_id', 'users.name', 'users.id')
            ->where('role_id', '=', '3')
            ->get();

        $nivel = DB::table('t_cat_asignatura')
            ->select('t_cat_asignatura.as_nivel')
            ->distinct()
            ->get();

        $busqueda = TDocenteAsignatura::findOrFail($id);

        return view("Academico.edit", ["catDocentes" => $catDocentes, "nivel" => $nivel, "busqueda" => $busqueda]);
    }

    public function actualizar(Request $request) // modifica por GET
    {

        if ($request->isMethod('post')) {

            $id = $request->get('id');
            $docenteModelo = TDocenteAsignatura::findOrFail($id);
            $array = $docenteModelo->attributesToArray();
            $asigID = $array['asig_id'];
            ///
            $fechaInicio = $request->get('fecha_ini');
            $fechaFin = $request->get('fecha_fin');
            $asigNID = $request->get('idAsignatura');

            $asignatura = DB::table('t_cat_asignatura')
                ->where('as_id', '=', $asigID)
                ->update(['as_estado' => 1]);
            $asignaturaN = DB::table('t_cat_asignatura')
                ->where('as_id', '=', $asigNID)
                ->update(['as_estado' => 0]);

            $resultado = DB::table('t_docente_asignaturas')->where('dasg_id', '=', $id)
                ->update(['dasg_fecha_inicio' => $fechaInicio,
                    'dasg_fecha_fin' => $fechaFin,
                    'asig_id' => $asigNID]);

        }
    }

    public function delete(Request $request, $id) // elimina
    {
        $docenteModelo = TDocenteAsignatura::findOrFail($id);
        $docenteModelo->delete();
    }

}
