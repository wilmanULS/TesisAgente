<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use app\User;
use app\TCatAsignatura;
use DB;

class UserController extends Controller
{
    //
    public function index( Request $request){ //revise como parametro un request

       $catDocentes=DB::table('users')
        ->select('users.role_id','users.name')
        ->where('role_id','=','3')
        ->get();

        $nivel=DB::table('t_cat_asignatura')
        ->select('t_cat_asignatura.as_nivel')
        ->distinct()
        ->get();

        return view("create",["catDocentes"=>$catDocentes,"nivel"=>$nivel]);
    }
  
}
