<?php

namespace App\Http\Controllers;

use Auth;
use App\Colegio;
use App\Estudiante;
use App\estudiante_curso;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Illuminate\Http\Request;
	

//use Storage;
use Illuminate\Support\Facades\Redirect;
//use App\Http\Requests\user_request;
use Laracasts\Flash\Flash;

class matriculas_controller extends Controller
{

    public function index(Request $request)
    {

        $colegio_estudiante = DB::select("SELECT est.* FROM estudiantes est INNER JOIN estudiante_curso est_cu ON est.id = est_cu.id_estudiante INNER JOIN colegio_curso co_cu ON est_cu.id_curso = co_cu.id WHERE co_cu.id_colegio = '" . $request->id . "';");
        //dd($colegio_estudiante);
        //$colegio     = Colegio::Busqueda($request->id)->orderBy('id', 'ASC')->paginate(5);
        $estudiantes = Estudiante::orderBy('id', 'ASC')->paginate(5);
        $colegios    = Colegio::orderBy('id', 'ASC')->where('id', '!=', '1')->get();
        $aux_colegio;

        foreach ($colegios as $colegio) {
            $aux_colegio[$colegio->id] = $colegio->nombre;
        }

        return view('matriculas.matriculas')->with('estudiantes', $colegio_estudiante)->with('colegios', $aux_colegio);
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

    public function estado(Request $request)
    {

        $estudiante_curso = estudiante_curso::find($request->id_curso)->where('id_estudiante', '=', $request->id_estudiante)->get();

        $estudiante_cursos = DB::select("UPDATE estudiante_curso
        SET estado       = '" . $request->estado_matricula . "'
        WHERE id_curso = '" . $request->id_curso . "' AND id_estudiante ='" . $request->id_estudiante . "'");

        //$estudiante_curso[0]->estado = $request->estado_matricula;

        //$estudiante_curso->save();

        // dd($estudiante_curso);
        Flash::success("Se ha Cambiado el estado del estudiante.");
        return redirect()->route('instituciones.matricula', $request->id_estudiante);
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
