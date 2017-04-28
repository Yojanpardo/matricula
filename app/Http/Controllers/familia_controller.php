<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Estudiante;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\user_request;
use App\User;
use App\Familiares;

class familia_controller extends Controller
{
    public function index()
	{
		$familiares = Familiares::orderBy('num_doc', 'ASC')->paginate(5);

		return view('familiares.familiares')->with('familiares', $familiares);
        	//return view('pagina.usuarios.usuarios')->with('users', $users);
	}


	public function create()
	{
		return view('familiares.create');
	}


	public function store(Request $request)
	{
		$familiares = new Familiares($request->all());
		
		//dd($user);

		$familiares->save();

		Flash::success("Se ha Realizado el registro con exito del Familiar " . $request->nombre . ' ' . $request->apellido . ' - El usuario para acceder es el correo y la contraseña es el documento');

		$estudiantes = Estudiante::orderBy('id', 'ASC')->paginate(5);

		return view('estudiantes.estudiantes')->with('estudiantes', $estudiantes);

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
		$familiares = Familiares::find($id);
		//dd($familiares);

		return view('familiares.edit')->with('familiares', $familiares);
	}


	public function update(Request $request, $id)
	{

		$familiares = Familiares::find($id);

		$familiares->num_doc = $request->num_doc;
		$familiares->nombre = $request->nombre;
		$familiares->apellido = $request->apellido;
		$familiares->telefono = $request->telefono;
		$familiares->correo = $request->correo;


		//dd($familiares);
		$familiares->save();

		Flash::warning("Se ha Editado El Familiar " . $request->nombre . ' ' . $request->apellido);

		return redirect()->route('familiares.index');

	}


	public function destroy($id)
	{
		$estudiantes = Estudiante::find($id);
		$estudiantes->delete();

		Flash::error("Se ha Eliminado El Usuario " . $estudiantes->nombre . ' ' . $estudiantes->apellido);
		return redirect()->route('estudiantes.index');
	}
}
