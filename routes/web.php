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
//ruta ajax nivel/asignatura
Route::get('/create/asignaturas/{nivel}','AsignaturasController@getAsignature');
//ruta guardar
Route::post('/create/asignaturas/save','docenteAsignaturaController@saveDocAsigDB');
//ruta edit ajax
Route::get('Academico/edit/{doc}','UserController@Edit');
Route::get('/Academico/edit/update','UserController@actualizar')->name('Academico.update');
Route::get('/Asignatura/delete','docenteAsignaturaController@delete')->name('Asignatura.delete');
//ruta edit




Route::resource('Academico/designarAsignatura','docenteAsignaturaController');
Route::resource('/create','UserController');







