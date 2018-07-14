<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ObjetosAp;
use Storage;
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

        $recursoEdu=DB::table('tipo_recurso_educativo')
            ->select('id','descripcion')
            ->distinct()
            ->get();


        return view("Repositorio.ingresarOA", ["recursoEdu"=>$recursoEdu,"idioma" => $idioma,"dificultad"=>$dificultad,"formato"=>$formato]);
    }

    public function store(Request $request){

        $this->validate($request,[
            'titulo'=>'required',
            'descripcionG'=>'required',
            'autor1'=>'required',
            'autor2'=>'required',
            'autor3'=>'required',

        ]);

        $noticia=new ObjetosAp();
        $noticia->titulo=$request->titulo;
        $noticia->descripcionG=$request->descripcionG;
        $noticia->autor1=$request->autor1;
        $noticia->autor2=$request->autor3;
        $noticia->autor3=$request->autor3;

        $metadato=$request->file('url1');
        $file_route=time().'_'.$metadato->getClientOriginalName();
        Storage::disk('ObjetosAprendizaje')->put($file_route,file_get_contents( $metadato->getRealPath() ));






    }

    public function indexOA(){





    }

    public function saveOA(Request $request){

        if ($request->isMethod('post'))
        {

            $titulo= $request->input('titulo');
            $descripcionG= $request->input('descripcionG');
            $autor1= $request->input('autor1');
            $autor2= $request->input('autor2');
            $autor3= $request->input('autor3');
            $keyword1= $request->input('keyword1');
            $keyword2= $request->input('keyword2');
            $keyword3= $request->input('keyword3');
            $keyword4= $request->input('keyword4');
            $keyword5= $request->input('keyword5');
            $tamanio=$request->input('tamanio');
            $descripcionT=$request->input('descripcionT');
            $dificultad= $request->input('dificultad');
            $idioma= $request->input('idioma');
            $tipoRecurso= $request->input('tipoRecurso');
            $formato= $request->input('formato');
            $evalDocente= $request->input('evalDocente');
            $url1=$request->input('url1');










        }






    }
}
