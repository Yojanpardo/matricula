<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rectores;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\user_request;
use App\User;

class rectores_controller extends Controller
{
	public function index()
	{
		$rectores = Rectores::orderBy('id', 'ASC')->paginate(5);

		return view('rectores.rectores')->with('rectores', $rectores);
        	//return view('pagina.usuarios.usuarios')->with('users', $users);
	}


	public function create()
	{
		return view('rectores.create');
	}


	public function store(Request $request)
	{	
		$user_aux = User::find($request->id);
		$rector_aux = Rectores::find($request->id);
		$user = new User();
		$rector = new Rectores($request->all());
		$rector->imagen = "user.png";
		

		$user->id = $rector->id;
		$user->nombre = $rector->nombre;
		$user->apellido = $rector->apellido;
		$user->email = $rector->correo;
		$user->password = bcrypt($rector->id);
		$user->tipo = "rector";
		$user->imagen = "user.png";

		//dd($user_aux);

		

		if($rector_aux == null){
			$rector->save();
			//$msg = "Se creo un usuario de acceso con el correo y la contraseña el numero de documento";
		}else{
			Flash::success("Ya esxiste este rector " . $rector_aux->nombre);
			return redirect()->route('rectores.index');
		}

		

		if($user_aux == null){
			$user->save();
			//$msg = "Se creo un usuario de acceso con el correo y la contraseña el numero de documento";
		}

		//$user->save();

		Flash::success("Se ha Realizado el registro con exito del rector " . $request->nombre . ' ' . $request->apellido);

		$rectores = Rectores::orderBy('id', 'ASC')->paginate(5);

		return redirect()->route('rectores.index');
		//return view('rectores.rectores')->with('rectores', $rectores);

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
		$rector = Rectores::find($id);
		//dd($rector);

		return view('rectores.edit')->with('rector', $rector);
	}


	public function update(Request $request, $id)
	{

		$user_aux = User::find($request->id);
		$user = new User();


		$rector = Rectores::find($id);

		$rector->id = $request->id;
		$rector->nombre = $request->nombre;
		$rector->apellido = $request->apellido;
		$rector->genero = $request->genero;
		$rector->telefono = $request->telefono;
		$rector->correo = $request->correo;
		$rector->direccion = $request->direccion;


		$user->id = $rector->id;
		$user->nombre = $rector->nombre;
		$user->apellido = $rector->apellido;
		$user->email = $rector->correo;
		$user->password = bcrypt($rector->id);
		$user->tipo = "rector";
		$user->imagen = "user.png";


		if($user_aux == null){
			$user->save();
			//$msg = "Se creo un usuario de acceso con el correo y la contraseña el numero de documento";
		}
		
		//dd($rector);
		$rector->save();

		Flash::warning("Se ha Editado El Rector " . $request->nombre . ' ' . $request->apellido);

		return redirect()->route('rectores.index');

	}


	public function destroy($id)
	{
		$rectores = Rectores::find($id);
		$rectores->delete();

		Flash::error("Se ha Eliminado El Rector " . $rectores->nombre . ' ' . $rectores->apellido);
		return redirect()->route('rectores.index');
	}
}
