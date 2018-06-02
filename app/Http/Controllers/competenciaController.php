<?php

namespace App\Http\Controllers;

use App\Competencia;
use Illuminate\Http\Request;

use DB;

class competenciaController extends Controller
{
    public function index(Request $request)
    { //revise como parametro un request

        $dificultad = DB::table('nivelcognoscitivo')
            ->select('nivelcognoscitivo.dificultad')
            ->distinct()
            ->get();
        return view("Docente/funciones", ["dificultad" => $dificultad]);
    }

    public function getDescripcion(Request $request)
    {
        $dificultad = $request->get('dificultad');

        $data = DB::table('nivelcognoscitivo')
            ->select('nivelcognoscitivo.descripcion', 'nivelcognoscitivo.id')
            ->where('nivelcognoscitivo.dificultad', '=', '' . $dificultad . '')
            ->get();

        return response()->json($data);
    }

    public function saveContenido(Request $request)
    {


        if ($request->isMethod('post')) {


            $horaP = $request->input('horasP');
            $horaT = $request->input('horasT');
            $horaL = $request->input('horasL');
            $idDasg = $request->input('idDasg');

            $addDA = DB::table('asignatura_horas')->insert([
                'horasPracticas' => $horaP,
                'horasTeoricas' => $horaT,
                'horasLaboratorio' => $horaL,
                'dasg_id' => $idDasg,
            ]);
            /////
            $idAsig = DB::table('asignatura_horas')->max('id');

            $competencias = $request->input('competencias');
            $arrayC = json_decode($competencias);
            $tax = $arrayC->taxo;
            $comp = $arrayC->comp;
            for ($i = 0; $i < count($tax); $i++) {
                $taxId = $tax[$i];
                $compDes = $comp[$i];
                if ($taxId != "" && $compDes != "") {
                    $addDA = DB::table('competencias')->insert([
                        'id_tax' => $taxId,
                        'descripcion' => $compDes,
                        'id_horas' => $idAsig
                    ]);
                }
            }
        }
    }

}
