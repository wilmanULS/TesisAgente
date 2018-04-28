<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\TDocenteAsignatura;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\docenteAsignaturaFormRequest;
use DB;

class docenteAsignaturaController extends Controller
{
   public function __construct()
   {

   }
   public function index( Request $request){ //revise como parametro un request

       if($request)
       {
       $query=trim($request->get('searchText'));
       $consulta=DB::table('t_docente_asignaturas')->where('name','LIKE','%'.$query.'%')
           //campo del fltro, comando SQL, texto a buscar
           ->join('users','users.id','=','t_docente_asignaturas.user_id');
       return view('Academico.designarAsignatura',["resultado"=>$consulta, "searchText"=>$query]);
       }
   }
    public function create() // es la vista
    {
        return view('Academico.create');
    }
    public function store(docenteAsignaturaFormRequest $request) //es como el insert
    {
        $docenteModelo=new TDocenteAsignatura;
        $docenteModelo->dasg_codigo=$request->get('codigo'); // modelo-formulario
        $docenteModelo->dasg_fecha_inicio=$request->get('fechaIni');
        $docenteModelo->dasg_fecha_fin=$request->get('fechaFin');
        $docenteModelo->user_id=$request->get('usuarioID');
        $docenteModelo->asig_id=$request->get('asignaturaID');
        $docenteModelo->save();

        return Redirect::to('Academico/designarAsignatura');


    }
    public function show($id) //se recupera los datos de un registro en particular
    {

        return view("Academico.show",["resultado"=>TDocenteAsignatura::findOrFail($id)]);
    }
    public function edit($id) // nos muestra el formulario
    {
        return view("Academico.edit",["resultado"=>TDocenteAsignatura::findOrFail($id)]);
    }
    public function update(docenteAsignaturaFormRequest $request, $id) // modifica por GET
    {
        $docenteModelo=TDocenteAsignatura::findOrFail($id);
        $docenteModelo->dasg_codigo=$request->get('codigo'); // modelo-formulario
        $docenteModelo->dasg_fecha_inicio=$request->get('fechaIni');
        $docenteModelo->dasg_fecha_fin=$request->get('fechaFin');
        $docenteModelo->user_id=$request->get('usuarioID');
        $docenteModelo->asig_id=$request->get('asignaturaID');
        $docenteModelo->update();
        return Redirect::to('Academico/designarAsignatura');



    }
    public function destroy($id) // elimina
    {

        $docenteModelo=TDocenteAsignatura::findOrFail($id);
        $docenteModelo->update();
        return Redirect::to('Academico/designarAsignatura');
    }



}
