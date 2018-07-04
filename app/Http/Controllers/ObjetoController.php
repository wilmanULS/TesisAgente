<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ObjetosAp;
use DB;

class ObjetoController extends Controller
{
    public function index( Request $request){ //revise como parametro un request
        $idioma=DB::table('idioma')
            ->select('id','descripcion')
            ->distinct()
            ->get();

        $dificultad=DB::table('dificultad')
            ->select('id','descripcion')
            ->distinct()
            ->get();

        $formato=DB::table('formato')
            ->select('id','descripcion')
            ->distinct()
            ->get();


        return view("Repositorio.ingresarOA", ["idioma" => $idioma,"dificultad"=>$dificultad,"formato"=>$formato]);
    }
}
