<?php

namespace App\Http\Controllers;

use App\Estudiante;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
//use Storage;
use Illuminate\Support\Facades\Redirect;
//use App\Http\Requests\user_request;
use Laracasts\Flash\Flash;

class estudiantes_controller extends Controller
{

    public function index()
    {
        $estudiantes = Estudiante::orderBy('id', 'ASC')->paginate(5);

        return view('estudiantes.estudiantes')->with('estudiantes', $estudiantes);
        //return view('pagina.usuarios.usuarios')->with('users', $users);
    }

    public function create()
    {
        return view('estudiantes.create');
    }

    public function store(Request $request)
    {
        $user               = new User();
        $estudiante         = new Estudiante($request->all());
        $estudiante->imagen = "user.png";

        $user->id       = $estudiante->id;
        $user->nombre   = $estudiante->nombre;
        $user->apellido = $estudiante->apellido;
        $user->email    = $estudiante->correo;
        $user->password = bcrypt($estudiante->id);
        $user->tipo     = "usuario";
        $user->imagen   = "user.png";

        //dd($user);

        $estudiante->save();
        $user->save();

        Flash::success("Se ha Realizado el registro con exito del estudiante " . $request->nombre . ' ' . $request->apellido . ' - El usuario para acceder es el correo y la contraseña es el documento');

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
        $estudiante = Estudiante::find($id);
        //dd($estudiante);

        return view('estudiantes.edit')->with('estudiante', $estudiante);
    }

    public function update(Request $request, $id)
    {

        $estudiante = Estudiante::find($id);

        $estudiante->id       = $request->id;
        $estudiante->nombre   = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->genero   = $request->genero;
        $estudiante->telefono = $request->telefono;
        $estudiante->correo   = $request->correo;

        //dd($estudiante);
        $estudiante->save();

        Flash::warning("Se ha Editado El Estudiante " . $request->nombre . ' ' . $request->apellido);

        return redirect()->route('estudiantes.index');

    }

    public function destroy($id)
    {
        $estudiantes = Estudiante::find($id);
        $estudiantes->delete();

        Flash::error("Se ha Eliminado El Usuario " . $estudiantes->nombre . ' ' . $estudiantes->apellido);
        return redirect()->route('estudiantes.index');
    }
}
