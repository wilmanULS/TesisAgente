<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Taxonomia;
use DB;

class TaxonomiaController extends Controller
{
    //
    public function getVerbo(Request $request){

        $verbo=$request->get('id');
        $data=DB::table('taxonomia_blooms')
            ->select('taxonomia_blooms.verbo')
            ->where('taxonomia_blooms.id_nc','=',''.$verbo.'')
            ->get();

        return response()->json($data);


    }

}
