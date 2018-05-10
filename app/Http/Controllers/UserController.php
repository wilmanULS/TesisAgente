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
    public function index( Request $request){ //revise como parametro un request

       $catDocentes=DB::table('users')
        ->select('users.role_id','users.name','users.id')
        ->where('role_id','=','3')
        ->get();

        $nivel=DB::table('t_cat_asignatura')
        ->select('t_cat_asignatura.as_nivel')
        ->distinct()
        ->get();

        return view("create",["catDocentes"=>$catDocentes,"nivel"=>$nivel]);
    }

    public function Edit($id) // nos muestra el formulario
    {

        $catDocentes=DB::table('users')
            ->select('users.role_id','users.name','users.id')
            ->where('role_id','=','3')
            ->get();

        $nivel=DB::table('t_cat_asignatura')
            ->select('t_cat_asignatura.as_nivel')
            ->distinct()
            ->get();

        $busqueda=TDocenteAsignatura::findOrFail($id);

        return view("Academico.edit",["catDocentes"=>$catDocentes,"nivel"=>$nivel,"busqueda"=>$busqueda]);
    }
    public function actualizar(Request $request) // modifica por GET
    {

        if ($request->isMethod('get')) {

           $docenteModelo = TDocenteAsignatura::findOrFail($request->input('id'));

            $docenteModelo=$request->input('idDocente');
            $docenteModelo=$request->input('idAsignatura');
            $docenteModelo=$request->input('fecha_ini');
            $docenteModelo=$request->input('fecha_fin');
            $docenteModelo->save();

//            dd($docenteModelo);
//            // modelo-formulario
//            $docenteModelo->dasg_fecha_inicio = $request->get('fecha_ini');
//            $docenteModelo->dasg_fecha_fin = $request->get('fecha_fin');
//            $docenteModelo->user_id = $request->get('iddocentes');
//            $docenteModelo->asig_id = $request->get('idAsignatura');
//            $docenteModelo->update();

        }


    }

    public function delete(Request $request, $id) // elimina
    {
        $docenteModelo=TDocenteAsignatura::findOrFail($id);
        $docenteModelo->delete();
    }
  
}
