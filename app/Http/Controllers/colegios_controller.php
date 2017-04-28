<?php

namespace App\Http\Controllers;

use App\Colegio;
use App\Colegio;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\user_request;
use App\User;


class colegios_controller extends Controller
{
	public function index()
	{
		$instituciones = Colegio::orderBy('id', 'ASC')->paginate(5);

		return view('instituciones.instituciones')->with('instituciones', $instituciones);
        	//return view('pagina.usuarios.usuarios')->with('users', $users);
	}


	public function create()
	{
		return view('instituciones.create');
	}


	public function store(Request $request)
	{
		$institucion = new Colegio($request->all());
		$institucion->imagen = "user.png";
		
		//dd($user);

		$institucion->save();
		$user->save();

		Flash::success("Se ha Realizado el registro con exito de la institucion " . $request->nombre . ' ' . $request->apellido);

		$instituciones = Colegio::orderBy('id', 'ASC')->paginate(5);

		return view('instituciones.instituciones')->with('instituciones', $instituciones);

	}

	public function registrar(Request $request)
	{


	}


	public function show($id)
	{
        //
	}


	public function edit($id)
	{
		$institucion = Colegio::find($id);
		//dd($institucion);

		return view('instituciones.edit')->with('institucion', $institucion);
	}


	public function update(Request $request, $id)
	{

		$institucion = Colegio::find($id);

		$institucion->id = $request->id;
		$institucion->nombre = $request->nombre;
		$institucion->apellido = $request->apellido;
		$institucion->genero = $request->genero;
		$institucion->telefono = $request->telefono;
		$institucion->correo = $request->correo;


		//dd($institucion);
		$institucion->save();

		Flash::warning("Se ha Editado El Colegio " . $request->nombre . ' ' . $request->apellido);

		return redirect()->route('instituciones.index');

	}


	public function destroy($id)
	{
		$instituciones = Colegio::find($id);
		$instituciones->delete();

		Flash::error("Se ha Eliminado El Usuario " . $instituciones->nombre . ' ' . $instituciones->apellido);
		return redirect()->route('instituciones.index');
	}
}
