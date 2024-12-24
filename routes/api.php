<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/test', function() {
    return 'hola';
});


Route::post('/login', 'AuthController@login');

Route::get('tutores/listing', 'TutorController@listing');
Route::get('cursos/listing', 'CursoController@listing');
Route::get('gestiones/listing', 'GestionController@listing');
Route::get('gestiones/general/listing', 'GestionController@listingGeneral');
Route::get('materias/listing', 'MateriaController@listing');
Route::get('trimestres/listing', 'TrimestreController@listing');
Route::get('profesores/listing', 'ProfesorController@listing');
Route::get('estudiantes/listing', 'EstudianteController@listing');

Route::group(['middleware' => ['auth:api', 'acl:api']], function() {
	Route::post('logout', 'AuthController@logout');

    //profesores
	Route::get('profesores', 'ProfesorController@index')->name('profesores.index');
	Route::post('profesores', 'ProfesorController@store')->name('profesores.create');
	Route::get('profesores/{profesor}/edit', 'ProfesorController@show');
	Route::put('profesores/{profesor}', 'ProfesorController@update')->name('profesores.update');
	Route::delete('profesores', 'ProfesorController@destroy')->name('profesores.delete');

    //tutores
	Route::get('tutores', 'TutorController@index')->name('tutores.index');
	Route::post('tutores', 'TutorController@store')->name('tutores.create');
	Route::get('tutores/{tutor}/edit', 'TutorController@show');
	Route::put('tutores/{tutor}', 'TutorController@update')->name('tutores.update');
	Route::delete('tutores', 'TutorController@destroy')->name('tutores.delete');

    //estudiantes
	Route::get('estudiantes', 'EstudianteController@index')->name('estudiantes.index');
	Route::post('estudiantes', 'EstudianteController@store')->name('estudiantes.create');
	Route::get('estudiantes/{estudiante}/edit', 'EstudianteController@show');
	Route::put('estudiantes/{estudiante}', 'EstudianteController@update')->name('estudiantes.update');
	Route::delete('estudiantes', 'EstudianteController@destroy')->name('estudiantes.delete');

    //administrativos
	Route::get('administrativos', 'AdministrativoController@index')->name('administrativos.index');
	Route::post('administrativos', 'AdministrativoController@store')->name('administrativos.create');
	Route::get('administrativos/{administrativo}/edit', 'AdministrativoController@show');
	Route::put('administrativos/{administrativo}', 'AdministrativoController@update')->name('administrativos.update');
	Route::delete('administrativos', 'AdministrativoController@destroy')->name('administrativos.delete');

    //cursos
	Route::get('cursos', 'CursoController@index')->name('cursos.index');
	Route::post('cursos', 'CursoController@store')->name('cursos.create');
	Route::get('cursos/{curso}/edit', 'CursoController@show');
	Route::put('cursos/{curso}', 'CursoController@update')->name('cursos.update');
	Route::delete('cursos', 'CursoController@destroy')->name('cursos.delete');

    //gestiones
	Route::get('gestiones', 'GestionController@index')->name('gestiones.index');
	Route::post('gestiones', 'GestionController@store')->name('gestiones.create');
	Route::get('gestiones/{gestion}/edit', 'GestionController@show');
	Route::put('gestiones/{gestion}', 'GestionController@update')->name('gestiones.update');
	Route::delete('gestiones', 'GestionController@destroy')->name('gestiones.delete');

    //materias
	Route::get('materias', 'MateriaController@index')->name('materias.index');
	Route::post('materias', 'MateriaController@store')->name('materias.create');
	Route::get('materias/{materia}/edit', 'MateriaController@show');
	Route::put('materias/{materia}', 'MateriaController@update')->name('materias.update');
	Route::delete('materias', 'MateriaController@destroy')->name('materias.delete');

    //trimestres
	Route::get('trimestres', 'TrimestreController@index')->name('trimestres.index');
	Route::post('trimestres', 'TrimestreController@store')->name('trimestres.create');
	Route::get('trimestres/{trimestre}/edit', 'TrimestreController@show');
	Route::put('trimestres/{trimestre}', 'TrimestreController@update')->name('trimestres.update');
	Route::delete('trimestres', 'TrimestreController@destroy')->name('trimestres.delete');

    //asignaciones
	Route::get('asignaciones', 'CursoMateriaController@index')->name('asignaciones.index');
	Route::post('asignaciones', 'CursoMateriaController@store')->name('asignaciones.create');
    Route::get('asignaciones/{gestion_id}/edit', 'CursoMateriaController@show');

    //asistencias
    Route::get('asistencias', 'CursoMateriaController@asistencias')->name('asistencias.index');
    Route::post('asistencias', 'AsistenciaController@store')->name('asistencias.create');
    Route::post('asistencias/detalle', 'CursoMateriaController@detalle');
    Route::post('asistencias/curso/materia', 'AsistenciaController@getAsistenciasByCurso');

    //evaluaciones
    Route::get('evaluaciones', 'CursoMateriaController@evaluaciones')->name('evaluaciones.index');
    Route::post('evaluaciones', 'EvaluacionController@store')->name('evaluaciones.create');
    Route::post('evaluaciones/curso/materia', 'EvaluacionController@getEvaluacionesByCurso');

    //Usuarios
    Route::get('users', 'UserController@index')->name('users.index');
    Route::post('users', 'UserController@store')->name('users.create');
    Route::put('users/state/{user}', 'UserController@changeState')->name('users.update');
    Route::get('users/{user}/edit', 'UserController@show')->name('users.show');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::put('users/{user}/password', 'UserController@password');
    Route::delete('users', 'UserController@destroy')->name('users.destroy');

    //Perfiles
    Route::get('perfiles', 'PerfilController@index')->name('perfiles.index');
    Route::post('perfiles', 'PerfilController@store')->name('perfiles.create');
    Route::get('perfiles/{perfil}/edit', 'PerfilController@show')->name('perfiles.show');
    Route::put('perfiles/{perfil}', 'PerfilController@update')->name('perfiles.update');
    Route::delete('perfiles', 'PerfilController@destroy')->name('perfiles.destroy');

    Route::post('botman', 'ChatController@handle');
});
