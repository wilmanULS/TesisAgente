<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use DB;


class planController extends Controller
{
    //

    public function ingresarContenido($id){


        $idM = base64_decode($id);

        $asignatura = DB::table('t_docente_asignaturas as d')
            ->join('t_cat_asignatura', 't_cat_asignatura.as_id', '=', 'd.asig_id')
            ->select('d.dasg_id', 'd.user_id', 'd.asig_id', 't_cat_asignatura.as_nombre')
            ->where('d.dasg_id', '=', '' . $idM . '')
            ->get();


        return view('semanas.semana1', ["asignatura" => $asignatura,"idA"=>$idM]);

    }
    public function ingresarContenido2($id){


        $idM = base64_decode($id);

        $asignatura = DB::table('t_docente_asignaturas as d')
            ->join('t_cat_asignatura', 't_cat_asignatura.as_id', '=', 'd.asig_id')
            ->select('d.dasg_id', 'd.user_id', 'd.asig_id', 't_cat_asignatura.as_nombre')
            ->where('d.dasg_id', '=', '' . $idM . '')
            ->get();


        return view('semanas.semana2', ["asignatura" => $asignatura,"idA"=>$idM]);

    }
    public function ingresarContenido3($id){


        $idM = base64_decode($id);

        $asignatura = DB::table('t_docente_asignaturas as d')
            ->join('t_cat_asignatura', 't_cat_asignatura.as_id', '=', 'd.asig_id')
            ->select('d.dasg_id', 'd.user_id', 'd.asig_id', 't_cat_asignatura.as_nombre')
            ->where('d.dasg_id', '=', '' . $idM . '')
            ->get();


        return view('semanas.semana3', ["asignatura" => $asignatura,"idA"=>$idM]);

    }
    public function ingresarContenido4($id){


        $idM = base64_decode($id);

        $asignatura = DB::table('t_docente_asignaturas as d')
            ->join('t_cat_asignatura', 't_cat_asignatura.as_id', '=', 'd.asig_id')
            ->select('d.dasg_id', 'd.user_id', 'd.asig_id', 't_cat_asignatura.as_nombre')
            ->where('d.dasg_id', '=', '' . $idM . '')
            ->get();


        return view('semanas.semana4', ["asignatura" => $asignatura,"idA"=>$idM]);

    }
    public function ingresarContenido5($id){


        $idM = base64_decode($id);

        $asignatura = DB::table('t_docente_asignaturas as d')
            ->join('t_cat_asignatura', 't_cat_asignatura.as_id', '=', 'd.asig_id')
            ->select('d.dasg_id', 'd.user_id', 'd.asig_id', 't_cat_asignatura.as_nombre')
            ->where('d.dasg_id', '=', '' . $idM . '')
            ->get();


        return view('semanas.semana5', ["asignatura" => $asignatura,"idA"=>$idM]);

    }
    public function ingresarContenido6($id){


        $idM = base64_decode($id);

        $asignatura = DB::table('t_docente_asignaturas as d')
            ->join('t_cat_asignatura', 't_cat_asignatura.as_id', '=', 'd.asig_id')
            ->select('d.dasg_id', 'd.user_id', 'd.asig_id', 't_cat_asignatura.as_nombre')
            ->where('d.dasg_id', '=', '' . $idM . '')
            ->get();


        return view('semanas.semana6', ["asignatura" => $asignatura,"idA"=>$idM]);

    }
    public function ingresarContenido7($id){


        $idM = base64_decode($id);

        $asignatura = DB::table('t_docente_asignaturas as d')
            ->join('t_cat_asignatura', 't_cat_asignatura.as_id', '=', 'd.asig_id')
            ->select('d.dasg_id', 'd.user_id', 'd.asig_id', 't_cat_asignatura.as_nombre')
            ->where('d.dasg_id', '=', '' . $idM . '')
            ->get();


        return view('semanas.semana7', ["asignatura" => $asignatura,"idA"=>$idM]);

    }
    public function ingresarContenido8($id){


        $idM = base64_decode($id);

        $asignatura = DB::table('t_docente_asignaturas as d')
            ->join('t_cat_asignatura', 't_cat_asignatura.as_id', '=', 'd.asig_id')
            ->select('d.dasg_id', 'd.user_id', 'd.asig_id', 't_cat_asignatura.as_nombre')
            ->where('d.dasg_id', '=', '' . $idM . '')
            ->get();


        return view('semanas.semana8', ["asignatura" => $asignatura,"idA"=>$idM]);

    }
    public function ingresarContenido9($id){


        $idM = base64_decode($id);

        $asignatura = DB::table('t_docente_asignaturas as d')
            ->join('t_cat_asignatura', 't_cat_asignatura.as_id', '=', 'd.asig_id')
            ->select('d.dasg_id', 'd.user_id', 'd.asig_id', 't_cat_asignatura.as_nombre')
            ->where('d.dasg_id', '=', '' . $idM . '')
            ->get();


        return view('semanas.semana9', ["asignatura" => $asignatura,"idA"=>$idM]);

    }
    public function ingresarContenido10($id){


        $idM = base64_decode($id);

        $asignatura = DB::table('t_docente_asignaturas as d')
            ->join('t_cat_asignatura', 't_cat_asignatura.as_id', '=', 'd.asig_id')
            ->select('d.dasg_id', 'd.user_id', 'd.asig_id', 't_cat_asignatura.as_nombre')
            ->where('d.dasg_id', '=', '' . $idM . '')
            ->get();


        return view('semanas.semana10', ["asignatura" => $asignatura,"idA"=>$idM]);

    }
    public function ingresarContenido11($id){


        $idM = base64_decode($id);

        $asignatura = DB::table('t_docente_asignaturas as d')
            ->join('t_cat_asignatura', 't_cat_asignatura.as_id', '=', 'd.asig_id')
            ->select('d.dasg_id', 'd.user_id', 'd.asig_id', 't_cat_asignatura.as_nombre')
            ->where('d.dasg_id', '=', '' . $idM . '')
            ->get();


        return view('semanas.semana11', ["asignatura" => $asignatura,"idA"=>$idM]);

    }
    public function ingresarContenido12($id){


        $idM = base64_decode($id);

        $asignatura = DB::table('t_docente_asignaturas as d')
            ->join('t_cat_asignatura', 't_cat_asignatura.as_id', '=', 'd.asig_id')
            ->select('d.dasg_id', 'd.user_id', 'd.asig_id', 't_cat_asignatura.as_nombre')
            ->where('d.dasg_id', '=', '' . $idM . '')
            ->get();


        return view('semanas.semana12', ["asignatura" => $asignatura,"idA"=>$idM]);

    }
    public function ingresarContenido13($id){


        $idM = base64_decode($id);

        $asignatura = DB::table('t_docente_asignaturas as d')
            ->join('t_cat_asignatura', 't_cat_asignatura.as_id', '=', 'd.asig_id')
            ->select('d.dasg_id', 'd.user_id', 'd.asig_id', 't_cat_asignatura.as_nombre')
            ->where('d.dasg_id', '=', '' . $idM . '')
            ->get();


        return view('semanas.semana13', ["asignatura" => $asignatura,"idA"=>$idM]);

    }
    public function ingresarContenido14($id){


        $idM = base64_decode($id);

        $asignatura = DB::table('t_docente_asignaturas as d')
            ->join('t_cat_asignatura', 't_cat_asignatura.as_id', '=', 'd.asig_id')
            ->select('d.dasg_id', 'd.user_id', 'd.asig_id', 't_cat_asignatura.as_nombre')
            ->where('d.dasg_id', '=', '' . $idM . '')
            ->get();


        return view('semanas.semana14', ["asignatura" => $asignatura,"idA"=>$idM]);

    }
    public function ingresarContenido15($id){


        $idM = base64_decode($id);

        $asignatura = DB::table('t_docente_asignaturas as d')
            ->join('t_cat_asignatura', 't_cat_asignatura.as_id', '=', 'd.asig_id')
            ->select('d.dasg_id', 'd.user_id', 'd.asig_id', 't_cat_asignatura.as_nombre')
            ->where('d.dasg_id', '=', '' . $idM . '')
            ->get();


        return view('semanas.semana15', ["asignatura" => $asignatura,"idA"=>$idM]);

    }
    public function ingresarContenido16($id){


        $idM = base64_decode($id);

        $asignatura = DB::table('t_docente_asignaturas as d')
            ->join('t_cat_asignatura', 't_cat_asignatura.as_id', '=', 'd.asig_id')
            ->select('d.dasg_id', 'd.user_id', 'd.asig_id', 't_cat_asignatura.as_nombre')
            ->where('d.dasg_id', '=', '' . $idM . '')
            ->get();


        return view('semanas.semana16', ["asignatura" => $asignatura,"idA"=>$idM]);

    }

    public function verSemanas($id){

        $idM = base64_decode($id);











        return view('Docente.verSemanas',["idA"=>$idM]);

    }

    
    public function savePlan(Request $request){

        if ($request->isMethod('post')) {


            $contenido = $request->input('contenidoS1');
            $listaTemas = $request->input('listaTemas');
            $idDoceAsig=$request->input('idAsignatura');
            $semana=$request->input('semana');

            $idAsignatura=DB::table('t_docente_asignaturas')
                ->select('asig_id')
                ->where('dasg_id','=',''.$idDoceAsig.'')
                ->get();

            foreach ($idAsignatura as $valores){

                $id=$valores->asig_id;

            }

            $saveContenido=DB::table('contenidos')->insert([
                'semana' => $semana,
                'descripcion' => $contenido,
                'estado' => 'Disponible',
                'id_asignatura' => $id,
            ]);
            /////
            $ultimoIdContenido = DB::table('contenidos')->max('id');
            $arrayLista = json_decode($listaTemas);

            foreach ($arrayLista as $temas) {
               $tema=$temas->tema;
               $horasAsignadas=$temas->hasig;
                $porcAprobacion=$temas->papro;
                $prioridad=$temas->prioridad;


               $saveTemas=DB::table('temas')->insert([
                   'tema'=>$tema,
                   'estado'=>"activo",
                   'prioridad'=>$prioridad,
                   'id_contenido'=>$ultimoIdContenido,

               ]);

                $ultimoIdTemas = DB::table('temas')->max('id');
                   $savePlan=DB::table('plan')->insert([
                       'id_tema'=>$ultimoIdTemas,
                       'horas_asignadas'=>$horasAsignadas,
                        'porcentaje_aprobacion'=> $porcAprobacion,
                        'estado'=>"activo",

                   ]);

            }

        }




    }
}
