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
    Route::get('/edit/{doc}','UserController@Edit');

});
Route::get('Academico/Categorias/create', function () {
    return view('create');
});
//ruta ajax nivel/asignatura
Route::get('/create/asignaturas/{nivel}','AsignaturasController@getAsignature');
//ruta descricpion cognoscitiva
Route::get('/Docente/descripcion/','competenciaController@getDescripcion')->name('Docente.descripcion');
//ruta verbo taxonomia
Route::get('/Docente/verboTaxonomia/','TaxonomiaController@getVerbo')->name('Docente.verboTaxonomia');
//get nombre
Route::get('/Materia/descripcion/','AsignaturasController@getNombre')->name('Materia.descripcion');
//ruta guardar
Route::post('/create/asignaturas/save','docenteAsignaturaController@saveDocAsigDB');
Route::post('/contenido/save','competenciaController@saveContenido')->name('Competencias.save');
Route::get('/Docente/competencias','docenteController@tablaCompetencias');
Route::get('/Docente/competencias/AgregarContenido','competenciaController@viewCompetencias');
Route::get('/Docente/competencias/delete','competenciaController@deleteCompetencia')->name('Competencias.delete');
//ruta edit ajax

Route::post('/Academico/edit/update','UserController@actualizar')->name('Academico.update');
Route::get('/Asignatura/delete','docenteAsignaturaController@delete')->name('Asignatura.delete');
Route::get('Docente/funciones/contenido/{idM}','docenteController@definirContenido')->name('Docente.Fcontenido');

//route editar competencias
Route::get('Docente/editarCompetencias/{id}/{idComp}','competenciaController@editCompetencias')->name('Docente.editarCompetencias');
Route::post('Docente/updateCompetencias','competenciaController@updateCompetencia')->name('Competencias.update');
//route ingresar contenido
Route::get('semanas/semana1/{id}','planController@ingresarContenido')->name('Docente.contenido');
Route::post('Docente/contenido/save','planController@savePlan')->name('Docente.contenidoSave');

Route::resource('Academico/designarAsignatura','docenteAsignaturaController');
Route::resource('/create','UserController');
//DOCENTE

Route::resource('Docente/index','docenteController');
Route::resource('Docente/funciones','competenciaController ');

//routes objetos de Aprendizaje
Route::resource('Repositorio/ingresarOA','ObjetoController');





