<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NivelCognoscitivo;
use DB;

class competenciaController extends Controller
{
    public function index( Request $request){ //revise como parametro un request

        $dificultad=DB::table('nivelcognoscitivo')
            ->select('nivelcognoscitivo.dificultad')
            ->distinct()
            ->get();

        return view("Docente/funciones",["dificultad"=>$dificultad]);
    }

    public function getDescripcion(Request $request){

        $dificultad=$request->get('dificultad');
        $data=DB::table('nivelcognoscitivo')
            ->select('nivelcognoscitivo.descripcion')
            ->where('nivelcognoscitivo.dificultad','=',''.$dificultad.'')
            ->get();

        return response()->json($data);


    }
}
