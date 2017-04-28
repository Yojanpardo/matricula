<?php

namespace App\Http\Controllers;

use App\Colegio;
use App\colegio_curso;
use App\Curso;
use App\Estudiante;
use App\estudiante_curso;
use App\estudiante_familia;
use App\Familiares;
use App\Http\Controllers\Controller;
use App\Rectores;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class instituciones_controller extends Controller
{
    public function index()
    {

        $instituciones = Colegio::orderBy('id', 'ASC')->where('id', '!=', '1')->paginate(10);

        return view('instituciones.instituciones')->with('instituciones', $instituciones);
        //return view('pagina.usuarios.usuarios')->with('users', $users);
    }

    public function create()
    {
        $rectores = Rectores::orderBy('id', 'ASC')->get();
        $aux_rectores;

        foreach ($rectores as $rector) {
            $aux_rectores[$rector->id] = $rector->nombre . ' ' . $rector->apellido;
        }

        $cursos = Curso::orderBy('id', 'ASC')->get();
        $aux_cursos;

        foreach ($cursos as $curso) {
            $aux_cursos[$curso->id] = $curso->nombres . ' - ' . $curso->jornada;
        }

        return view('instituciones.create')->with('rectores', $aux_rectores)->with('cursos', $aux_cursos);
    }

    public function store(Request $request)
    {

        $colegio = new Colegio($request->all());
        $cursos  = $request->cursos;
        $colegio->save();
        foreach ($request->cursos as $curso) {
            $colegio_curso             = new colegio_curso();
            $colegio_curso->id_colegio = $request->id;
            $colegio_curso->id_curso   = $curso;
            $colegio_curso->cupos      = $request->cupos;
            $colegio_curso->save();
            //dd($colegio_curso);
        }

        Flash::success("Se ha Realizado el registro con exito de la Institución " . $request->nombre);
        //return view('inicio');
        return redirect()->route('instituciones.index');

    }

    public function registrar(Request $request)
    {

        $aux_val    = Estudiante::find($request->id);
        $aux_val_ma = Familiares::find($request->num_docm);
        $aux_val_pa = Familiares::find($request->num_docp);
        $aux_val_ac = Familiares::find($request->num_doca);
        //dd($aux_val);
        //$colegio_curso = new colegio_curso();
        $colegio_curso       = colegio_curso::find($request->gradogrupo);
        $user                = new User();
        $aux_user            = User::find($request->id);
        $estudiante          = new Estudiante();
        $familiarp           = new Familiares();
        $familiarm           = new Familiares();
        $familiara           = new Familiares();
        $estudiante_curso    = new estudiante_curso();
        $estudiante_familiap = new estudiante_familia();
        $estudiante_familiam = new estudiante_familia();
        $estudiante_familiaa = new estudiante_familia();

        $estudiante_curso->id_curso      = $request->gradogrupo;
        $estudiante_curso->id_estudiante = $request->id;
        $estudiante_curso->estado        = 'Pendiente';

        $colegio_curso->cupos = $colegio_curso->cupos - 1;
        /*"colegio" => "401"
        "gradogrupo" => "1"*/

        //dd($request);

        $estudiante->nombre          = $request->nombre;
        $estudiante->apellido        = $request->apellido;
        $estudiante->id              = $request->id;
        $estudiante->tipo_doc        = $request->tipo_doc;
        $estudiante->depa_expedicion = $request->depa_expedicion;
        $estudiante->muni_expedicion = $request->muni_expedicion;
        $estudiante->telefono        = $request->telefono;
        $estudiante->direccion       = $request->direccion;
        $estudiante->correo          = $request->correo;
        $estudiante->genero          = $request->genero;

        $familiarp->nombre     = $request->nombrep;
        $familiarp->apellido   = $request->apellidop;
        $familiarp->num_doc    = $request->num_docp;
        $familiarp->tipo_doc   = $request->tipo_docp;
        $familiarp->telefono   = $request->telefonop;
        $familiarp->parentesco = $request->parentescop;
        $familiarp->correo     = $request->correop;
        $familiarp->acudiente  = $request->acudientep;

        $estudiante_familiap->num_doc_estu = $request->id;
        $estudiante_familiap->num_doc_fami = $request->num_docp;
        $estudiante_familiap->acudiente    = $request->acudientep;
        //$estudiante_familiap->num_doc_estu = = $request->acudientep;

        $familiarm->nombre     = $request->nombrem;
        $familiarm->apellido   = $request->apellidom;
        $familiarm->num_doc    = $request->num_docm;
        $familiarm->tipo_doc   = $request->tipo_docm;
        $familiarm->telefono   = $request->telefonom;
        $familiarm->parentesco = $request->parentescom;
        $familiarm->correo     = $request->correom;
        $familiarm->acudiente  = $request->acudientem;

        $estudiante_familiam->num_doc_estu = $request->id;
        $estudiante_familiam->num_doc_fami = $request->num_docm;
        $estudiante_familiam->acudiente    = $request->acudientem;

        $familiara->nombre     = $request->nombrea;
        $familiara->apellido   = $request->apellidoa;
        $familiara->num_doc    = $request->num_doca;
        $familiara->tipo_doc   = $request->tipo_doca;
        $familiara->telefono   = $request->telefonoa;
        $familiara->parentesco = $request->parentescoa;
        $familiara->correo     = $request->correoa;
        $familiarm->acudiente  = $request->acudientea;

        $estudiante_familiaa->num_doc_estu = $request->id;
        $estudiante_familiaa->num_doc_fami = $request->num_doca;
        $estudiante_familiaa->acudiente    = $request->acudientea;

        $user->id       = $estudiante->id;
        $user->nombre   = $estudiante->nombre;
        $user->apellido = $estudiante->apellido;
        $user->email    = $estudiante->correo;
        $user->password = bcrypt($estudiante->id);
        $user->tipo     = "usuario";
        $user->imagen   = "user.png";

        $msg = "";
        if (Auth::user()->id != $estudiante->id) {
            $user->save();
            $msg = "Se creo un usuario de acceso con el correo y la contraseña el numero de documento";
        }

        if (is_null($aux_val)) {
            //dd("null");
            $estudiante->save();
        }

        if (is_null($aux_val_pa)) {
            //dd("null");
            $familiarp->save();
            $estudiante_familiap->save();
        }

        if (is_null($aux_val_ma)) {
            //dd("null");
            $familiarm->save();
            $estudiante_familiam->save();
        }

        if (is_null($aux_val_ac)) {
            //dd("null");
            $familiara->save();
            $estudiante_familiaa->save();
        }

        if (!is_null($aux_user)) {
            //dd("null");
            $aux_user->matricula = "Activa";
            $aux_user->save();
        }

        $estudiante_curso->save();
        $colegio_curso->save();
        /*$familiarp->save();
        $familiarm->save();*/

        Flash::success("Se ha Realizado el registro con exito del estudiante " . $request->nombre . ' ' . $request->apellido . ' *' . $msg);
        //return view('inicio');
        return redirect()->route('inicio');

    }

    public function peticion(Request $request)
    {

        $datos = $request->all();

        $aux_datos[0] = $request->colegio;
        $aux_datos[1] = $request->gradogrupo;

        $aux = $request->gradogrupo;

        $cole = DB::select("SELECT cc.id, ins.nombre as colegio, c.nombres as grado, c.jornada as jornada FROM colegio_curso cc
            INNER JOIN cursos c ON cc.id_curso = c.id INNER JOIN colegios ins ON cc.id_colegio = CAST(ins.id as text) WHERE cc.id = '$aux'
            ");

        /*$colegio = DB::select("SELECT cc.id, cc.id_colegio, cole.nombre, cole.direccion, cole.telefono, cole.correo, c.nombres, c.jornada FROM estudiante_curso ec
        INNER JOIN colegio_curso cc ON ec.id_curso = cc.id
        INNER JOIN colegios cole ON cc.id_colegio =  CAST(cole.id as text)
        INNER JOIN cursos c ON cc.id_curso = c.id
        WHERE ec.id_curso = '".$curso[0]->id_curso."' AND ec.id_estudiante = '".$id."'");*/

        //dd($request);

        $aux_cursos = $cole[0];

        $departamentos = DB::select("SELECT * FROM departamento");
        $aux_departamento;

        foreach ($departamentos as $departamento) {
            $aux_departamento[$departamento->nombre] = $departamento->nombre;
        }

        $ciudades = DB::select("SELECT * FROM ciudad");
        $aux_ciudades;

        foreach ($ciudades as $ciudad) {
            $aux_ciudades[$ciudad->nombre] = $ciudad->nombre;
        }

        //dd($aux_departamento);
        /*$curso = Curso::find($datos->gradogrupo);
        $institucion = Colegio::find($datos->id_colegio);*/
        //dd($datos);
        return view('instituciones.peticion')->with('informacion', $aux_datos)->with('cole', $cole)->with('departamentos', $aux_departamento)->with('ciudades', $aux_ciudades);

    }

    public function show($id)
    {

        $cursos        = DB::select("SELECT cc.id, c.nombres, c.jornada from colegio_curso cc INNER JOIN cursos c ON cc.id_curso = c.id where cc.cupos <> '0' AND cc.id_colegio = '$id'");
        $aux_cursos[0] = "";
        foreach ($cursos as $curso) {
            $aux_cursos[$curso->id] = $curso->nombres . ' - ' . $curso->jornada;
        }

        $institucion = Colegio::find($id);
        //dd($cursos);
        return view('instituciones.show')->with('institucion', $institucion)->with('cursos', $aux_cursos);
    }

    public function instituciones()
    {
        $instituciones              = Colegio::orderBy('id', 'ASC')->get();
        $instituciones[0]['nombre'] = Auth::user()->matricula;
        $instituciones[0]['sede']   = Auth::user()->tipo;
        //dd($instituciones[0]);
        //Flash::success("Usuarios");

        return $instituciones;
        //return view('inicio')->with('colegios', $instituciones);

    }

    public function edit($id)
    {

        $colegio       = Colegio::find($id);
        $colegio_curso = colegio_curso::orderBy('id', 'ASC')->where('id_colegio', '=', $id)->get();

        $rectores = Rectores::orderBy('id', 'ASC')->get();
        $aux_rectores;

        foreach ($rectores as $rector) {
            $aux_rectores[$rector->id] = $rector->nombre . ' ' . $rector->apellido;
        }

        $cursos = Curso::orderBy('id', 'ASC')->get();
        $aux_cursos;

        foreach ($cursos as $curso) {
            $aux_cursos[$curso->id] = $curso->nombres . ' - ' . $curso->jornada;
        }

        $env_cursos;

        $i = 0;
        foreach ($colegio_curso as $curso) {
            $env_cursos[$i] = $curso->id_curso;
            $i++;
        }
        //dd($colegio);
        return view('instituciones.edit')->with('colegio', $colegio)->with('curso', $env_cursos)->with('rectores', $aux_rectores)->with('cursos', $aux_cursos);
        //dd($env_cursos);
    }

    public function matricula($id)
    {

        //dd($id);
        $departamentos = DB::select("SELECT * FROM departamento");
        $aux_departamento;

        foreach ($departamentos as $departamento) {
            $aux_departamento[$departamento->nombre] = $departamento->nombre;
        }

        $ciudades = DB::select("SELECT * FROM ciudad");
        $aux_ciudades;

        foreach ($ciudades as $ciudad) {
            $aux_ciudades[$ciudad->nombre] = $ciudad->nombre;
        }

        $estudiante = Estudiante::find($id);

        $familiares = DB::select("SELECT * FROM estudiante_familia ef INNER JOIN familiares fa ON ef.num_doc_fami = fa.num_doc WHERE ef.num_doc_estu= '$id' ORDER BY fa.parentesco");

        $curso = DB::select("SELECT * FROM estudiante_curso ec WHERE id_estudiante = '$estudiante->id'");

        //dd($curso);
        if ($curso == null) {

            Flash::success("No se ha realizado una matricula para este estudiante");
            return redirect()->route('estudiantes.index');
        }
        //dd($familiares);
        //dd($curso[0]->id_curso);
        $colegio = DB::select("SELECT cc.id, cc.id_colegio, cole.nombre, cole.direccion, cole.telefono, cole.correo, c.nombres, c.jornada FROM estudiante_curso ec
            INNER JOIN colegio_curso cc ON ec.id_curso = cc.id
            INNER JOIN colegios cole ON cc.id_colegio =  CAST(cole.id as text)
            INNER JOIN cursos c ON cc.id_curso = c.id
            WHERE ec.id_curso = '" . $curso[0]->id_curso . "' AND ec.id_estudiante = '" . $id . "'");

        //dd($curso);

        return view('instituciones.matricula')->with('estudiante', $estudiante)->with('familiares', $familiares)->with('curso', $curso)->with('colegio', $colegio)->with('departamentos', $aux_departamento)->with('ciudades', $aux_ciudades);
    }

    public function matricular($id)
    {

        $departamentos = DB::select("SELECT * FROM departamento");
        $aux_departamento;

        foreach ($departamentos as $departamento) {
            $aux_departamento[$departamento->nombre] = $departamento->nombre;
        }

        $ciudades = DB::select("SELECT * FROM ciudad");
        $aux_ciudades;

        foreach ($ciudades as $ciudad) {
            $aux_ciudades[$ciudad->nombre] = $ciudad->nombre;
        }

        $estudiante = Estudiante::find($id);

        $familiares = DB::select("SELECT * FROM estudiante_familia ef INNER JOIN familiares fa ON ef.num_doc_fami = fa.num_doc WHERE ef.num_doc_estu= '$id' ORDER BY fa.parentesco");

        $curso = DB::select("SELECT * FROM estudiante_curso ec WHERE id_estudiante = '$estudiante->id'");
        //dd($curso[0]->id_curso);
        $colegio = DB::select("SELECT * FROM estudiante_curso ec
            INNER JOIN colegio_curso cocu ON cocu.id_curso = CAST(ec.id_curso as text)
            INNER JOIN cursos cur ON cur.id = CAST(ec.id_curso as text)
            INNER JOIN colegios cole ON CAST(cole.id as text) = cocu.id_colegio WHERE cocu.id = '" . $curso[0]->id_curso . "'");

        //dd($colegio);

        return view('instituciones.matricula')->with('estudiante', $estudiante)->with('familiares', $familiares)->with('curso', $curso)->with('colegio', $colegio)->with('departamentos', $aux_departamento)->with('ciudades', $aux_ciudades);
    }

    public function update(Request $request, $id)
    {

        $colegio            = Colegio::find($id);
        $colegio->id        = $request->id;
        $colegio->nombre    = $request->nombre;
        $colegio->rector    = $request->rector;
        $colegio->direccion = $request->direccion;
        $colegio->telefono  = $request->telefono;
        $colegio->correo    = $request->correo;
        $colegio->sede      = $request->sede;
        $colegio->latitud   = $request->latitud;
        $colegio->longitud  = $request->longitud;

        $cursos = $request->cursos;
        $colegio->save();

        //DB::delete("DELETE FROM colegio_curso WHERE id_colegio = '".$colegio->id."'");

        foreach ($request->cursos as $curso) {
            //echo $value;}
            $sql = DB::select("SELECT count(*) FROM colegio_curso WHERE id_colegio = '" . $colegio->id . "' AND id_curso = '" . $curso . "'");
            /*$aux_colegio_curso = colegio_curso::where('id_colegio', '=', $colegio->id)->where('id_curso', '=', '$curso')->get();*/
            //d($aux_colegio_curso);

            //dd($sql[0]->count);
            if ($sql[0]->count == 0) {
                $colegio_curso             = new colegio_curso();
                $colegio_curso->id_colegio = $request->id;
                $colegio_curso->id_curso   = $curso;
                $colegio_curso->cupos      = $request->cupos;
                $colegio_curso->save();
                //dd('hola nulo');
                //echo $colegio_curso->id_colegio . ' - ' . $colegio_curso->id_curso . ' no <br>';
            } else {
                $sql1 = DB::select("SELECT id FROM colegio_curso WHERE id_colegio = '" . $colegio->id . "' AND id_curso = '" . $curso . "'");

                $colegio_curso             = colegio_curso::find($sql1[0]->id);
                $colegio_curso->id_colegio = $request->id;
                $colegio_curso->id_curso   = $curso;
                $colegio_curso->cupos      = $request->cupos;
                $colegio_curso->save();

                //echo $colegio_curso->id_colegio . ' - ' . $colegio_curso->id_curso . ' si <br>';
                //dd($colegio_curso);
            }

            //dd($colegio_curso);
        }

        Flash::success("Se ha Realizado La modificacion de la Institución " . $request->nombre);
        //return view('inicio');
        return redirect()->route('instituciones.index');
    }

    public function destroy($id)
    {
        $colegio = Colegio::find($id);
        //$aux_colegio_curso = colegio_curso::where('id_colegio', '=', $colegio->id)->where('id_curso', '=', $curso)->get();

        $aux_colegio_curso    = colegio_curso::where('id_colegio', '=', $id)->get();
        $aux_estudiante_curso = estudiante_curso::where('id_curso', '=', $aux_colegio_curso[0]->id)->get();

        //dd($aux_estudiante_curso);

        if (is_null($aux_estudiante_curso)) {
            DB::delete("DELETE FROM colegios WHERE id_colegio = '" . $id . "'")->get();
            Flash::warning("Se ha Realizado La Eliminacion de la Institución " . $colegio->nombre);
        } else {
            Flash::error("No se ha realizado la eliminación hay estudiantes registrados a la Institución " . $colegio->nombre);
        }

        //return view('inicio');
        return redirect()->route('instituciones.index');
    }

    public function destroymatricular($id)
    {
        //dd($id);
        $aux_user   = User::find($id);
        $estudiante = Estudiante::find($id);
        $aux_id     = $estudiante->id;
        $familiares = DB::select("SELECT * FROM estudiante_familia ef INNER JOIN familiares fa ON ef.num_doc_fami = fa.num_doc WHERE ef.num_doc_estu= '$id' ORDER BY fa.parentesco");

        $curso = DB::select("SELECT * FROM estudiante_curso ec WHERE id_estudiante = '" . $aux_id . "'");
        //dd($estudiante->id);
        $colegio = DB::select("SELECT * FROM estudiante_curso ec
            INNER JOIN colegio_curso cocu ON cocu.id_curso = CAST(ec.id_curso as text)
            INNER JOIN cursos cur ON cur.id = CAST(ec.id_curso as text)
            INNER JOIN colegios cole ON CAST(cole.id as text) = cocu.id_colegio WHERE cocu.id = '" . $curso[0]->id_curso . "'");

        DB::delete("DELETE FROM estudiantes WHERE id = '$id'");
        DB::delete("DELETE FROM estudiante_curso WHERE id_estudiante = '$id'");
        DB::delete("DELETE FROM estudiante_familia WHERE num_doc_estu = '$id'");
        DB::delete("DELETE FROM familiares WHERE num_doc = '" . $familiares[0]->num_doc . "'");
        DB::delete("DELETE FROM familiares WHERE num_doc = '" . $familiares[1]->num_doc . "'");

        $aux_user->matricula = "Inactiva";
        $aux_user->save();
        //dd($aux_user);
        Flash::success("Se ha Eliminado el registro con exito del estudiante " . $estudiante->nombre . ' ' . $estudiante->apellido . ' ');
        return view('inicio');

    }
}
