<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TDocenteAsignatura;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;

class docenteController extends Controller
{

    public function index( Request $request){ //revise como parametro un request

        $userId=Auth::user()->getAuthIdentifier();

        if($request)
        {

            $consulta_docentes=DB::table('t_docente_asignaturas as d')
                ->join('users','users.id','=','d.user_id')
                ->join('t_cat_asignatura','t_cat_asignatura.as_id','=','d.asig_id')
                ->join('roles','roles.id','=','users.role_id')
                ->select('d.dasg_id','users.name','t_cat_asignatura.as_nombre','t_cat_asignatura.as_nivel','t_cat_asignatura.as_antecesor','d.user_id')
                ->where('user_id','=',''.$userId.'')
                //campo del fltro, comando SQL, texto a buscar
                ->orderBy('d.dasg_id','desc')
                ->paginate(7);




            return view('Docente.index',["consulta_docentes"=>$consulta_docentes]);
        }
    }

    public function definirContenido($id){
        $userId=Auth::user()->getAuthIdentifier();

            $consulta_docentes = DB::table('t_docente_asignaturas as d')
                ->join('users', 'users.id', '=', 'd.user_id')
                ->join('t_cat_asignatura', 't_cat_asignatura.as_id', '=', 'd.asig_id')
                ->join('roles', 'roles.id', '=', 'users.role_id')
                ->select('t_cat_asignatura.as_nombre', 't_cat_asignatura.as_nivel', 't_cat_asignatura.as_antecesor', 'd.user_id', 'd.dasg_id')
                ->where('user_id','=',''.$userId.'');

        $dificultad=DB::table('nivelcognoscitivo')
            ->select('nivelcognoscitivo.dificultad')
            ->distinct()
            ->get();

                  return view('Docente.funciones', ["consulta_docentes" => $consulta_docentes,"dificultad"=>$dificultad]);



    }

}
