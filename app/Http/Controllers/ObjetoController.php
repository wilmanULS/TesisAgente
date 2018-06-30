<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ObjetosAp;
use DB;

class ObjetoController extends Controller
{
    public function index( Request $request){ //revise como parametro un request


        return view("Repositorio.ingresarOA");
    }
}
