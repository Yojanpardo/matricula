<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;
use Storage;

class usuarios_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(5);

        //Flash::success("Usuarios");

        return view('usuarios.usuarios')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd('hola');
        $usuario = new User($request->all());

        if ($request->file('imagen')) {
            //Inicio Imagen
            $file = $request->file('imagen');
            $name = $request->apellido . '_' . $request->nombre . '_' . $request->id . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\plugins\images';
            $file->move($path, $name);
            //Fin Imagen
            $usuario->imagen = $name;
        } else {
            $usuario->imagen = 'user.png';
        }
        $usuario->password = bcrypt($request->password);
        //dd($usuario);
        $usuario->save();
        Flash::success("Se ha Creado El Usuario " . $request->nombre . ' ' . $request->apellido);
        return redirect()->route('usuarios.index');

    }

    public function registrar(Request $request)
    {
        //dd($request->all());
        $usuario = new User($request->all());

        $usuario->imagen   = 'user.png';
        $usuario->password = bcrypt($request->password);
        //dd($usuario);
        $usuario->save();
        Flash::success("Se ha Creado El Usuario " . $request->nombre . ' ' . $request->apellido);
        return view('login');

    }

    public function modificar(Request $request)
    {   
        //dd(Auth::user());
        $usuario = user::find(Auth::user()->id);

        $usuario->id = $request->id;
        $usuario->nombre = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->email = $request->email;
        $usuario->tipo = $request->tipo;

        if ($request->file('imagen')) {
            //Inicio Imagen
            $file = $request->file('imagen');
            $name = $request->apellido . '_' . $request->nombre . '_' . $request->id . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\plugins\images';
            $file->move($path, $name);
            //Fin Imagen
            $usuario->imagen = $name;
        } else {
            $usuario->imagen = 'user.png';
        }
        //dd($file . ' - ' . public_path() . ' - ' . $usuario->imagen);

        $usuario->password = bcrypt($request->password);
        //dd($usuario);
        $usuario->save();
        Flash::success("Se Ha Modificado Su Usuario - " . $request->nombre . ' ' . $request->apellido);
        return redirect()->route('inicio');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user = User::find($id);
        return view('usuarios.edit2')->with('user', $user);
        //dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('usuarios.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = User::find($id);

        $usuario->id       = $id;
        $usuario->nombre   = $request->nombre;
        $usuario->apellido = $request->apellido;
        $usuario->genero   = $request->genero;
        $usuario->telefono = $request->telefono;
        $usuario->email    = $request->email;
        $usuario->password = bcrypt($request->password);
        $usuario->tipo     = $request->tipo;

        if ($request->file('imagen')) {
            //Inicio Imagen
            $file = $request->file('imagen');
            $name = $request->apellido . '_' . $request->nombre . '_' . $request->id . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\plugin\bootstrap\dist\img';
            //Storage::delete(public_path() . $usuario->imagen);
            $file->move($path, $name);
            //Fin Imagen
            $usuario->imagen = $name;
        } else {
            if ($request->genero == 'masculino') {
                $usuario->imagen = 'avatar5.png';
            } else {
                $usuario->imagen = 'avatar2.png';
            }
        }
        //dd($usuario);
        $usuario->save();

        Flash::warning("Se ha Editado El Usuario " . $request->nombre . ' ' . $request->apellido);

        return redirect()->route('usuarios.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        $user->delete();

        Flash::error("Se ha Eliminado El Usuario " . $user->nombre . ' ' . $user->apellido);
        return redirect()->route('usuarios.index');
    }
}
