<?php

Route::get('/', function () {
    return view('index2');
});

Route::get('test', function () {
    return view('index');
});

/*Route::get('login', function () {
return view('login');
});*/

Route::get('prueba', function () {
    return view('template.principal');
});

/*Login*/

Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin',
    'as'   => 'login',
]);

Route::post('login', [
    'uses' => 'Auth\AuthController@postLogin',
    'as'   => 'login',
]);

Route::get('logout', [
    'uses' => 'Auth\AuthController@getLogout',
    'as'   => 'logout',
]);

Route::post('registrar', [
    'uses' => 'usuarios_controller@registrar',
    'as'   => 'registrar',
]);

/* Usuarios */
Route::group(['middleware' => 'auth'], function () {
    Route::resource('usuarios', 'usuarios_controller');
});

Route::get('usuarios/{id}/edit', [
    'uses' => 'usuarios_controller@edit',
    'as'   => 'usuarios.edit',
])->middleware('auth');

Route::get('usuarios/{id}/destroy', [
    'uses' => 'usuarios_controller@destroy',
    'as'   => 'usuarios.destroy',
])->middleware('auth');

Route::post('modificar', [
    'uses' => 'usuarios_controller@modificar',
    'as'   => 'usuarios.modificar',
])->middleware('auth');

/* Estudiantes */
Route::group(['middleware' => 'auth'], function () {
    Route::resource('estudiantes', 'estudiantes_controller');
});

Route::get('estudiantes/{id}/edit', [
    'uses' => 'estudiantes_controller@edit',
    'as'   => 'estudiantes.edit',
])->middleware('auth');

Route::get('estudiantes/{id}/destroy', [
    'uses' => 'estudiantes_controller@destroy',
    'as'   => 'estudiantes.destroy',
])->middleware('auth');

/* Matriculas */
Route::group(['middleware' => 'auth'], function () {
    Route::resource('matriculas', 'matriculas_controller');
});

Route::get('matriculas/{id}/edit', [
    'uses' => 'matriculas_controller@edit',
    'as'   => 'matriculas.edit',
])->middleware('auth');

Route::get('matriculas/{id}/destroy', [
    'uses' => 'matriculas_controller@destroy',
    'as'   => 'matriculas.destroy',
])->middleware('auth');

Route::post('cambioestado', [
    'uses' => 'matriculas_controller@estado',
    'as'   => 'matriculas.estado',
])->middleware('auth');

/* Familiares */

Route::group(['middleware' => 'auth'], function () {
    Route::resource('familiares', 'familia_controller');
});

Route::get('familiares/{id}/edit', [
    'uses' => 'familia_controller@edit',
    'as'   => 'familiares.edit',
])->middleware('auth');

Route::get('familiares/{id}/destroy', [
    'uses' => 'familia_controller@destroy',
    'as'   => 'familiares.destroy',
])->middleware('auth');

Route::get('inicio', ['as' => 'profile', function () {
    //
}]);

Route::get('inicio', ['as' => 'inicio', function () {
    return view('inicio');
}])->middleware('auth');

/* instituiones - Matriculas */

Route::group(['middleware' => 'auth'], function () {
    Route::resource('instituciones', 'instituciones_controller');
});

Route::get('colegios', [
    'uses' => 'instituciones_controller@index',
    'as'   => 'instituciones.index',
])->middleware('auth');

Route::post('peticion', [
    'uses' => 'instituciones_controller@peticion',
    'as'   => 'instituciones.peticion',
])->middleware('auth');

Route::post('matricular', [
    'uses' => 'instituciones_controller@registrar',
    'as'   => 'instituciones.matricular',
]);

Route::get('matricula/{id}/destroy', [
    'uses' => 'instituciones_controller@destroymatricular',
    'as'   => 'matricular.destroy',
])->middleware('auth');

Route::get('instituciones/{id}/edit', [
    'uses' => 'instituciones_controller@edit',
    'as'   => 'instituciones.edit',
])->middleware('auth');

Route::get('instituciones/{id}/matricula', [
    'uses' => 'instituciones_controller@matricula',
    'as'   => 'instituciones.matricula',
])->middleware('auth');

Route::get('estudiantes/{id}/matricular', [
    'uses' => 'instituciones_controller@matricular',
    'as'   => 'estudiantes.matricular',
])->middleware('auth');

Route::get('instituciones/{id}/destroy', [
    'uses' => 'instituciones_controller@destroy',
    'as'   => 'instituciones.destroy',
])->middleware('auth');

Route::get('instituciones', [
    'uses' => 'instituciones_controller@instituciones',
    'as'   => 'instituciones',
])->middleware('auth');

/* AJAX  */

Route::get('municipios/{$datos}', ['as' => 'municipios.ajax', function () {

}]);

/* rectores */

Route::group(['middleware' => 'auth'], function () {
    Route::resource('rectores', 'rectores_controller');
});

Route::get('rectores/{id}/edit', [
    'uses' => 'rectores_controller@edit',
    'as'   => 'rectores.edit',
])->middleware('auth');

Route::get('rectores/{id}/destroy', [
    'uses' => 'rectores_controller@destroy',
    'as'   => 'rectores.destroy',
])->middleware('auth');
