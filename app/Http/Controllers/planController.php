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


        return view('Docente.contenido', ["asignatura" => $asignatura,"idA"=>$idM]);




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
               $horasImpartidas=$temas->himp;
               $porcAprobacion=$temas->papro;
               $antecesores=$temas->tantece;
               $sucesrores=$temas->tsuce;
               $estado= $temas->estado;
               $prioridad=$temas->prioridad;


               $saveTemas=DB::table('temas')->insert([
                   'tema'=>$tema,
                    'estado'=>$estado,
                   'prioridad'=>$prioridad,
                   'precedentes'=>$antecesores,
                   'sucedentes'=>$sucesrores,
                   'id_contenido'=>$ultimoIdContenido,

               ]);

                $ultimoIdTemas = DB::table('temas')->max('id');
                   $savePlan=DB::table('plan')->insert([
                       'id_tema'=>$ultimoIdTemas,
                       'horas_asignadas'=>$horasAsignadas,
                       'horas_impartidas'=>$horasImpartidas,
                        'porcentaje_aprobacion'=> $porcAprobacion,
                        'estado'=>"activo",

                   ]);

            }

        }




    }
}
