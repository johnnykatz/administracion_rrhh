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
    return redirect('/home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/pruebas', 'HomeController@pruebas');
Route::get('/view_script', ['as' => 'view_script', 'uses' => 'HomeController@view_script']);
Route::post('/script', ['as' => 'script', 'uses' => 'HomeController@script']);


Route::get('admin/permissions', ['as' => 'admin.permissions.index', 'uses' => 'Admin\PermissionController@index', 'middleware' => ['auth', 'permission:usuarios']]);
Route::post('admin/permissions', ['as' => 'admin.permissions.store', 'uses' => 'Admin\PermissionController@store', 'middleware' => ['auth', 'permission:usuarios']]);
Route::get('admin/permissions/create', ['as' => 'admin.permissions.create', 'uses' => 'Admin\PermissionController@create', 'middleware' => ['auth', 'permission:usuarios']]);
Route::put('admin/permissions/{permissions}', ['as' => 'admin.permissions.update', 'uses' => 'Admin\PermissionController@update', 'middleware' => ['auth', 'permission:usuarios']]);
Route::patch('admin/permissions/{permissions}', ['as' => 'admin.permissions.update', 'uses' => 'Admin\PermissionController@update', 'middleware' => ['auth', 'permission:usuarios']]);
Route::delete('admin/permissions/{permissions}', ['as' => 'admin.permissions.destroy', 'uses' => 'Admin\PermissionController@destroy', 'middleware' => ['auth', 'permission:usuarios']]);
Route::get('admin/permissions/{permissions}', ['as' => 'admin.permissions.show', 'uses' => 'Admin\PermissionController@show', 'middleware' => ['auth', 'permission:usuarios']]);
Route::get('admin/permissions/{permissions}/edit', ['as' => 'admin.permissions.edit', 'uses' => 'Admin\PermissionController@edit', 'middleware' => ['auth', 'permission:usuarios']]);


Route::get('admin/roles', ['as' => 'admin.roles.index', 'uses' => 'Admin\RoleController@index', 'middleware' => ['auth', 'permission:usuarios']]);
Route::post('admin/roles', ['as' => 'admin.roles.store', 'uses' => 'Admin\RoleController@store', 'middleware' => ['auth', 'permission:usuarios']]);
Route::get('admin/roles/create', ['as' => 'admin.roles.create', 'uses' => 'Admin\RoleController@create', 'middleware' => ['auth', 'permission:usuarios']]);
Route::put('admin/roles/{roles}', ['as' => 'admin.roles.update', 'uses' => 'Admin\RoleController@update', 'middleware' => ['auth', 'permission:usuarios']]);
Route::patch('admin/roles/{roles}', ['as' => 'admin.roles.update', 'uses' => 'Admin\RoleController@update', 'middleware' => ['auth', 'permission:usuarios']]);
Route::delete('admin/roles/{roles}', ['as' => 'admin.roles.destroy', 'uses' => 'Admin\RoleController@destroy', 'middleware' => ['auth', 'permission:usuarios']]);
Route::get('admin/roles/{roles}', ['as' => 'admin.roles.show', 'uses' => 'Admin\RoleController@show', 'middleware' => ['auth', 'permission:usuarios']]);
Route::get('admin/roles/{roles}/edit', ['as' => 'admin.roles.edit', 'uses' => 'Admin\RoleController@edit', 'middleware' => ['auth', 'permission:usuarios']]);


Route::get('admin/users', ['as' => 'admin.users.index', 'uses' => 'Admin\UserController@index', 'middleware' => ['auth', 'permission:usuarios']]);
Route::post('admin/users', ['as' => 'admin.users.store', 'uses' => 'Admin\UserController@store', 'middleware' => ['auth', 'permission:usuarios']]);
Route::get('admin/users/create', ['as' => 'admin.users.create', 'uses' => 'Admin\UserController@create', 'middleware' => ['auth', 'permission:usuarios']]);
Route::put('admin/users/{users}', ['as' => 'admin.users.update', 'uses' => 'Admin\UserController@update', 'middleware' => ['auth', 'permission:usuarios']]);
Route::patch('admin/users/{users}', ['as' => 'admin.users.update', 'uses' => 'Admin\UserController@update', 'middleware' => ['auth', 'permission:usuarios']]);
Route::delete('admin/users/{users}', ['as' => 'admin.users.destroy', 'uses' => 'Admin\UserController@destroy', 'middleware' => ['auth', 'permission:usuarios']]);
Route::get('admin/users/{users}', ['as' => 'admin.users.show', 'uses' => 'Admin\UserController@show', 'middleware' => ['auth', 'permission:usuarios']]);
Route::get('admin/users/{users}/edit', ['as' => 'admin.users.edit', 'uses' => 'Admin\UserController@edit', 'middleware' => ['auth', 'permission:usuarios']]);

Route::get('admin/users/editPassword/{users}', ['as' => 'admin.users.editPassword', 'uses' => 'Admin\UserController@editPassword', 'middleware' => ['auth']]);
Route::post('admin/users/updatePassword', ['as' => 'admin.users.updatePassword', 'uses' => 'Admin\UserController@updatePassword', 'middleware' => ['auth']]);


Route::get('admin/agrupamientos', ['as' => 'admin.agrupamientos.index', 'uses' => 'Admin\AgrupamientoController@index', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::post('admin/agrupamientos', ['as' => 'admin.agrupamientos.store', 'uses' => 'Admin\AgrupamientoController@store', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/agrupamientos/create', ['as' => 'admin.agrupamientos.create', 'uses' => 'Admin\AgrupamientoController@create', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::put('admin/agrupamientos/{agrupamientos}', ['as' => 'admin.agrupamientos.update', 'uses' => 'Admin\AgrupamientoController@update', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::patch('admin/agrupamientos/{agrupamientos}', ['as' => 'admin.agrupamientos.update', 'uses' => 'Admin\AgrupamientoController@update', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::delete('admin/agrupamientos/{agrupamientos}', ['as' => 'admin.agrupamientos.destroy', 'uses' => 'Admin\AgrupamientoController@destroy', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/agrupamientos/{agrupamientos}', ['as' => 'admin.agrupamientos.show', 'uses' => 'Admin\AgrupamientoController@show', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/agrupamientos/{agrupamientos}/edit', ['as' => 'admin.agrupamientos.edit', 'uses' => 'Admin\AgrupamientoController@edit', 'middleware' => ['auth', 'permission:editar_parametros']]);


Route::get('admin/unidadOrganizacions', ['as' => 'admin.unidadOrganizacions.index', 'uses' => 'Admin\UnidadOrganizacionController@index', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::post('admin/unidadOrganizacions', ['as' => 'admin.unidadOrganizacions.store', 'uses' => 'Admin\UnidadOrganizacionController@store', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/unidadOrganizacions/create', ['as' => 'admin.unidadOrganizacions.create', 'uses' => 'Admin\UnidadOrganizacionController@create', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::put('admin/unidadOrganizacions/{unidadOrganizacions}', ['as' => 'admin.unidadOrganizacions.update', 'uses' => 'Admin\UnidadOrganizacionController@update', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::patch('admin/unidadOrganizacions/{unidadOrganizacions}', ['as' => 'admin.unidadOrganizacions.update', 'uses' => 'Admin\UnidadOrganizacionController@update', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::delete('admin/unidadOrganizacions/{unidadOrganizacions}', ['as' => 'admin.unidadOrganizacions.destroy', 'uses' => 'Admin\UnidadOrganizacionController@destroy', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/unidadOrganizacions/{unidadOrganizacions}', ['as' => 'admin.unidadOrganizacions.show', 'uses' => 'Admin\UnidadOrganizacionController@show', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/unidadOrganizacions/{unidadOrganizacions}/edit', ['as' => 'admin.unidadOrganizacions.edit', 'uses' => 'Admin\UnidadOrganizacionController@edit', 'middleware' => ['auth', 'permission:editar_parametros']]);


Route::get('admin/estadoRelacions', ['as' => 'admin.estadoRelacions.index', 'uses' => 'Admin\EstadoRelacionController@index', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::post('admin/estadoRelacions', ['as' => 'admin.estadoRelacions.store', 'uses' => 'Admin\EstadoRelacionController@store', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/estadoRelacions/create', ['as' => 'admin.estadoRelacions.create', 'uses' => 'Admin\EstadoRelacionController@create', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::put('admin/estadoRelacions/{estadoRelacions}', ['as' => 'admin.estadoRelacions.update', 'uses' => 'Admin\EstadoRelacionController@update', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::patch('admin/estadoRelacions/{estadoRelacions}', ['as' => 'admin.estadoRelacions.update', 'uses' => 'Admin\EstadoRelacionController@update', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::delete('admin/estadoRelacions/{estadoRelacions}', ['as' => 'admin.estadoRelacions.destroy', 'uses' => 'Admin\EstadoRelacionController@destroy', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/estadoRelacions/{estadoRelacions}', ['as' => 'admin.estadoRelacions.show', 'uses' => 'Admin\EstadoRelacionController@show', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/estadoRelacions/{estadoRelacions}/edit', ['as' => 'admin.estadoRelacions.edit', 'uses' => 'Admin\EstadoRelacionController@edit', 'middleware' => ['auth', 'permission:editar_parametros']]);


Route::get('admin/estadoAgentes', ['as' => 'admin.estadoAgentes.index', 'uses' => 'Admin\EstadoAgenteController@index', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::post('admin/estadoAgentes', ['as' => 'admin.estadoAgentes.store', 'uses' => 'Admin\EstadoAgenteController@store', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/estadoAgentes/create', ['as' => 'admin.estadoAgentes.create', 'uses' => 'Admin\EstadoAgenteController@create', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::put('admin/estadoAgentes/{estadoAgentes}', ['as' => 'admin.estadoAgentes.update', 'uses' => 'Admin\EstadoAgenteController@update', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::patch('admin/estadoAgentes/{estadoAgentes}', ['as' => 'admin.estadoAgentes.update', 'uses' => 'Admin\EstadoAgenteController@update', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::delete('admin/estadoAgentes/{estadoAgentes}', ['as' => 'admin.estadoAgentes.destroy', 'uses' => 'Admin\EstadoAgenteController@destroy', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/estadoAgentes/{estadoAgentes}', ['as' => 'admin.estadoAgentes.show', 'uses' => 'Admin\EstadoAgenteController@show', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/estadoAgentes/{estadoAgentes}/edit', ['as' => 'admin.estadoAgentes.edit', 'uses' => 'Admin\EstadoAgenteController@edit', 'middleware' => ['auth', 'permission:editar_parametros']]);


Route::get('admin/situacionLaborals', ['as' => 'admin.situacionLaborals.index', 'uses' => 'Admin\SituacionLaboralController@index', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::post('admin/situacionLaborals', ['as' => 'admin.situacionLaborals.store', 'uses' => 'Admin\SituacionLaboralController@store', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/situacionLaborals/create', ['as' => 'admin.situacionLaborals.create', 'uses' => 'Admin\SituacionLaboralController@create', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::put('admin/situacionLaborals/{situacionLaborals}', ['as' => 'admin.situacionLaborals.update', 'uses' => 'Admin\SituacionLaboralController@update', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::patch('admin/situacionLaborals/{situacionLaborals}', ['as' => 'admin.situacionLaborals.update', 'uses' => 'Admin\SituacionLaboralController@update', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::delete('admin/situacionLaborals/{situacionLaborals}', ['as' => 'admin.situacionLaborals.destroy', 'uses' => 'Admin\SituacionLaboralController@destroy', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/situacionLaborals/{situacionLaborals}', ['as' => 'admin.situacionLaborals.show', 'uses' => 'Admin\SituacionLaboralController@show', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/situacionLaborals/{situacionLaborals}/edit', ['as' => 'admin.situacionLaborals.edit', 'uses' => 'Admin\SituacionLaboralController@edit', 'middleware' => ['auth', 'permission:editar_parametros']]);


Route::get('admin/tipoEstructuras', ['as' => 'admin.tipoEstructuras.index', 'uses' => 'Admin\TipoEstructuraController@index', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::post('admin/tipoEstructuras', ['as' => 'admin.tipoEstructuras.store', 'uses' => 'Admin\TipoEstructuraController@store', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/tipoEstructuras/create', ['as' => 'admin.tipoEstructuras.create', 'uses' => 'Admin\TipoEstructuraController@create', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::put('admin/tipoEstructuras/{tipoEstructuras}', ['as' => 'admin.tipoEstructuras.update', 'uses' => 'Admin\TipoEstructuraController@update', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::patch('admin/tipoEstructuras/{tipoEstructuras}', ['as' => 'admin.tipoEstructuras.update', 'uses' => 'Admin\TipoEstructuraController@update', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::delete('admin/tipoEstructuras/{tipoEstructuras}', ['as' => 'admin.tipoEstructuras.destroy', 'uses' => 'Admin\TipoEstructuraController@destroy', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/tipoEstructuras/{tipoEstructuras}', ['as' => 'admin.tipoEstructuras.show', 'uses' => 'Admin\TipoEstructuraController@show', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/tipoEstructuras/{tipoEstructuras}/edit', ['as' => 'admin.tipoEstructuras.edit', 'uses' => 'Admin\TipoEstructuraController@edit', 'middleware' => ['auth', 'permission:editar_parametros']]);


Route::get('admin/estructuras', ['as' => 'admin.estructuras.index', 'uses' => 'Admin\EstructuraController@index', 'middleware' => ['auth', 'permission:editar_estructura']]);
Route::post('admin/estructuras', ['as' => 'admin.estructuras.store', 'uses' => 'Admin\EstructuraController@store', 'middleware' => ['auth', 'permission:editar_estructura']]);
Route::get('admin/estructuras/create', ['as' => 'admin.estructuras.create', 'uses' => 'Admin\EstructuraController@create', 'middleware' => ['auth', 'permission:editar_estructura']]);
Route::put('admin/estructuras/{estructuras}', ['as' => 'admin.estructuras.update', 'uses' => 'Admin\EstructuraController@update', 'middleware' => ['auth', 'permission:editar_estructura']]);
Route::patch('admin/estructuras/{estructuras}', ['as' => 'admin.estructuras.update', 'uses' => 'Admin\EstructuraController@update', 'middleware' => ['auth', 'permission:editar_estructura']]);
Route::delete('admin/estructuras/{estructuras}', ['as' => 'admin.estructuras.destroy', 'uses' => 'Admin\EstructuraController@destroy', 'middleware' => ['auth', 'permission:editar_estructura']]);
Route::get('admin/estructuras/{estructuras}', ['as' => 'admin.estructuras.show', 'uses' => 'Admin\EstructuraController@show', 'middleware' => ['auth', 'permission:editar_estructura']]);
Route::get('admin/estructuras/{estructuras}/edit', ['as' => 'admin.estructuras.edit', 'uses' => 'Admin\EstructuraController@edit', 'middleware' => ['auth', 'permission:editar_estructura']]);
Route::post('admin/estructuras/nueva_estructura_externa', ['as' => 'admin.estructuras.nueva_estructura_externa', 'uses' => 'Admin\EstructuraController@nuevaEstructuraExterna', 'middleware' => ['auth', 'permission:add_estruct_ext']]);
Route::get('getEstructurasAjax', ['as' => 'getEstructurasAjax', 'uses' => 'Admin\EstructuraController@getEstructurasAjax', 'middleware' => ['auth', 'permission:add_estruct_ext']]);


Route::get('admin/generos', ['as' => 'admin.generos.index', 'uses' => 'Admin\GeneroController@index', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::post('admin/generos', ['as' => 'admin.generos.store', 'uses' => 'Admin\GeneroController@store', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/generos/create', ['as' => 'admin.generos.create', 'uses' => 'Admin\GeneroController@create', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::put('admin/generos/{generos}', ['as' => 'admin.generos.update', 'uses' => 'Admin\GeneroController@update', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::patch('admin/generos/{generos}', ['as' => 'admin.generos.update', 'uses' => 'Admin\GeneroController@update', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::delete('admin/generos/{generos}', ['as' => 'admin.generos.destroy', 'uses' => 'Admin\GeneroController@destroy', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/generos/{generos}', ['as' => 'admin.generos.show', 'uses' => 'Admin\GeneroController@show', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/generos/{generos}/edit', ['as' => 'admin.generos.edit', 'uses' => 'Admin\GeneroController@edit', 'middleware' => ['auth', 'permission:editar_parametros']]);


Route::get('admin/tipoAgentes', ['as' => 'admin.tipoAgentes.index', 'uses' => 'Admin\TipoAgenteController@index', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::post('admin/tipoAgentes', ['as' => 'admin.tipoAgentes.store', 'uses' => 'Admin\TipoAgenteController@store', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/tipoAgentes/create', ['as' => 'admin.tipoAgentes.create', 'uses' => 'Admin\TipoAgenteController@create', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::put('admin/tipoAgentes/{tipoAgentes}', ['as' => 'admin.tipoAgentes.update', 'uses' => 'Admin\TipoAgenteController@update', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::patch('admin/tipoAgentes/{tipoAgentes}', ['as' => 'admin.tipoAgentes.update', 'uses' => 'Admin\TipoAgenteController@update', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::delete('admin/tipoAgentes/{tipoAgentes}', ['as' => 'admin.tipoAgentes.destroy', 'uses' => 'Admin\TipoAgenteController@destroy', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/tipoAgentes/{tipoAgentes}', ['as' => 'admin.tipoAgentes.show', 'uses' => 'Admin\TipoAgenteController@show', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/tipoAgentes/{tipoAgentes}/edit', ['as' => 'admin.tipoAgentes.edit', 'uses' => 'Admin\TipoAgenteController@edit', 'middleware' => ['auth', 'permission:editar_parametros']]);


Route::get('admin/agentes', ['as' => 'admin.agentes.index', 'uses' => 'Admin\AgenteController@index', 'middleware' => ['auth']]);
Route::post('admin/agentes', ['as' => 'admin.agentes.store', 'uses' => 'Admin\AgenteController@store', 'middleware' => ['auth', 'permission:abm_agentes']]);
Route::get('admin/agentes/create', ['as' => 'admin.agentes.create', 'uses' => 'Admin\AgenteController@create', 'middleware' => ['auth', 'permission:abm_agentes']]);
Route::put('admin/agentes/{agentes}', ['as' => 'admin.agentes.update', 'uses' => 'Admin\AgenteController@update','middleware' => ['auth', 'permission:abm_agentes']]);
Route::patch('admin/agentes/{agentes}', ['as' => 'admin.agentes.update', 'uses' => 'Admin\AgenteController@update','middleware' => ['auth', 'permission:abm_agentes']]);
Route::delete('admin/agentes/{agentes}', ['as' => 'admin.agentes.destroy', 'uses' => 'Admin\AgenteController@destroy','middleware' => ['auth', 'permission:abm_agentes']]);
Route::get('admin/agentes/{agentes}', ['as' => 'admin.agentes.show', 'uses' => 'Admin\AgenteController@show','middleware' => ['auth']]);
Route::get('admin/agentes/{agentes}/edit', ['as' => 'admin.agentes.edit', 'uses' => 'Admin\AgenteController@edit','middleware' => ['auth', 'permission:abm_agentes']]);
Route::get('listadoAgentesExcel', ['as' => 'listadoAgentesExcel', 'uses' => 'Admin\AgenteController@listadoAgentesExcel','middleware' => ['auth']]);
Route::get('generarSituacionRevista/{agentes}', ['as' => 'generarSituacionRevista', 'uses' => 'Admin\AgenteController@generarSituacionRevista','middleware' => ['auth']]);


Route::get('admin/tipoInstrumentos', ['as' => 'admin.tipoInstrumentos.index', 'uses' => 'Admin\TipoInstrumentoController@index', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::post('admin/tipoInstrumentos', ['as' => 'admin.tipoInstrumentos.store', 'uses' => 'Admin\TipoInstrumentoController@store', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/tipoInstrumentos/create', ['as' => 'admin.tipoInstrumentos.create', 'uses' => 'Admin\TipoInstrumentoController@create', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::put('admin/tipoInstrumentos/{tipoInstrumentos}', ['as' => 'admin.tipoInstrumentos.update', 'uses' => 'Admin\TipoInstrumentoController@update', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::patch('admin/tipoInstrumentos/{tipoInstrumentos}', ['as' => 'admin.tipoInstrumentos.update', 'uses' => 'Admin\TipoInstrumentoController@update', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::delete('admin/tipoInstrumentos/{tipoInstrumentos}', ['as' => 'admin.tipoInstrumentos.destroy', 'uses' => 'Admin\TipoInstrumentoController@destroy', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/tipoInstrumentos/{tipoInstrumentos}', ['as' => 'admin.tipoInstrumentos.show', 'uses' => 'Admin\TipoInstrumentoController@show', 'middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/tipoInstrumentos/{tipoInstrumentos}/edit', ['as' => 'admin.tipoInstrumentos.edit', 'uses' => 'Admin\TipoInstrumentoController@edit', 'middleware' => ['auth', 'permission:editar_parametros']]);


Route::get('admin/tipoPuestoTrabajos', ['as' => 'admin.tipoPuestoTrabajos.index', 'uses' => 'Admin\TipoPuestoTrabajoController@index','middleware' => ['auth', 'permission:editar_parametros']]);
Route::post('admin/tipoPuestoTrabajos', ['as' => 'admin.tipoPuestoTrabajos.store', 'uses' => 'Admin\TipoPuestoTrabajoController@store','middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/tipoPuestoTrabajos/create', ['as' => 'admin.tipoPuestoTrabajos.create', 'uses' => 'Admin\TipoPuestoTrabajoController@create','middleware' => ['auth', 'permission:editar_parametros']]);
Route::put('admin/tipoPuestoTrabajos/{tipoPuestoTrabajos}', ['as' => 'admin.tipoPuestoTrabajos.update', 'uses' => 'Admin\TipoPuestoTrabajoController@update','middleware' => ['auth', 'permission:editar_parametros']]);
Route::patch('admin/tipoPuestoTrabajos/{tipoPuestoTrabajos}', ['as' => 'admin.tipoPuestoTrabajos.update', 'uses' => 'Admin\TipoPuestoTrabajoController@update','middleware' => ['auth', 'permission:editar_parametros']]);
Route::delete('admin/tipoPuestoTrabajos/{tipoPuestoTrabajos}', ['as' => 'admin.tipoPuestoTrabajos.destroy', 'uses' => 'Admin\TipoPuestoTrabajoController@destroy','middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/tipoPuestoTrabajos/{tipoPuestoTrabajos}', ['as' => 'admin.tipoPuestoTrabajos.show', 'uses' => 'Admin\TipoPuestoTrabajoController@show','middleware' => ['auth', 'permission:editar_parametros']]);
Route::get('admin/tipoPuestoTrabajos/{tipoPuestoTrabajos}/edit', ['as' => 'admin.tipoPuestoTrabajos.edit', 'uses' => 'Admin\TipoPuestoTrabajoController@edit','middleware' => ['auth', 'permission:editar_parametros']]);


Route::get('admin/puestoTrabajos', ['as' => 'admin.puestoTrabajos.index', 'uses' => 'Admin\PuestoTrabajoController@index','middleware' => ['auth', 'permission:abm_agentes']]);
Route::post('admin/puestoTrabajos', ['as' => 'admin.puestoTrabajos.store', 'uses' => 'Admin\PuestoTrabajoController@store','middleware' => ['auth', 'permission:abm_agentes']]);
Route::get('admin/puestoTrabajos/create', ['as' => 'admin.puestoTrabajos.create', 'uses' => 'Admin\PuestoTrabajoController@create','middleware' => ['auth', 'permission:abm_agentes']]);
Route::put('admin/puestoTrabajos/{puestoTrabajos}', ['as' => 'admin.puestoTrabajos.update', 'uses' => 'Admin\PuestoTrabajoController@update','middleware' => ['auth', 'permission:abm_agentes']]);
Route::patch('admin/puestoTrabajos/{puestoTrabajos}', ['as' => 'admin.puestoTrabajos.update', 'uses' => 'Admin\PuestoTrabajoController@update','middleware' => ['auth', 'permission:abm_agentes']]);
Route::delete('admin/puestoTrabajos/{puestoTrabajos}', ['as' => 'admin.puestoTrabajos.destroy', 'uses' => 'Admin\PuestoTrabajoController@destroy','middleware' => ['auth', 'permission:abm_agentes']]);
Route::get('admin/puestoTrabajos/{puestoTrabajos}', ['as' => 'admin.puestoTrabajos.show', 'uses' => 'Admin\PuestoTrabajoController@show','middleware' => ['auth', 'permission:abm_agentes']]);
Route::get('admin/puestoTrabajos/{puestoTrabajos}/edit', ['as' => 'admin.puestoTrabajos.edit', 'uses' => 'Admin\PuestoTrabajoController@edit','middleware' => ['auth', 'permission:abm_agentes']]);


Route::get('admin/reportes', ['as' => 'admin.reportes.index', 'uses' => 'Admin\ReporteController@index','middleware' => ['auth']]);


Route::put('admin/ministerio/', ['as' => 'admin.ministerio.update', 'uses' => 'Admin\MinisterioController@update','middleware' => ['auth', 'permission:abm_agentes']]);
Route::patch('admin/ministerio/', ['as' => 'admin.ministerio.update', 'uses' => 'Admin\MinisterioController@update','middleware' => ['auth', 'permission:abm_agentes']]);
Route::get('admin/ministerio/', ['as' => 'admin.ministerio.show', 'uses' => 'Admin\MinisterioController@show','middleware' => ['auth', 'permission:abm_agentes']]);
Route::get('admin/ministerio/edit', ['as' => 'admin.ministerio.edit', 'uses' => 'Admin\MinisterioController@edit','middleware' => ['auth', 'permission:abm_agentes']]);

Route::get('admin/logTables', ['as'=> 'admin.logTables.index', 'uses' => 'Admin\LogTableController@index','middleware' => ['auth', 'permission:ver_logs']]);
Route::post('admin/logTables', ['as'=> 'admin.logTables.store', 'uses' => 'Admin\LogTableController@store','middleware' => ['auth', 'permission:ver_logs']]);
Route::get('admin/logTables/create', ['as'=> 'admin.logTables.create', 'uses' => 'Admin\LogTableController@create','middleware' => ['auth', 'permission:ver_logs']]);
Route::put('admin/logTables/{logTables}', ['as'=> 'admin.logTables.update', 'uses' => 'Admin\LogTableController@update','middleware' => ['auth', 'permission:ver_logs']]);
Route::patch('admin/logTables/{logTables}', ['as'=> 'admin.logTables.update', 'uses' => 'Admin\LogTableController@update','middleware' => ['auth', 'permission:ver_logs']]);
Route::delete('admin/logTables/{logTables}', ['as'=> 'admin.logTables.destroy', 'uses' => 'Admin\LogTableController@destroy','middleware' => ['auth', 'permission:ver_logs']]);
Route::get('admin/logTables/{logTables}', ['as'=> 'admin.logTables.show', 'uses' => 'Admin\LogTableController@show','middleware' => ['auth', 'permission:ver_logs']]);
Route::get('admin/logTables/{logTables}/edit', ['as'=> 'admin.logTables.edit', 'uses' => 'Admin\LogTableController@edit','middleware' => ['auth', 'permission:ver_logs']]);
