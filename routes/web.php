<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('Academico/Categorias/create', function () {
    return view('create');
});
Route::get('/create/asignaturas/{nivel}','AsignaturasController@getAsignature');


Route::resource('Academico/designarAsignatura','docenteAsignaturaController');
Route::resource('/create','UserController');


//Route::get('/create',function(){
//$niv_id=Input::get('niv_id');
//$asignatura=Asignatura::where('as_nivel','=',$niv_id)->get();
//return Response::json($asignatura); 




