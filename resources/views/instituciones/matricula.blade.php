@extends('template.principal')

@section('titulo', 'Informacion Matricula')

@section('js1')
<script src="{{ asset('plugins/js/jquery-3.1.1.js') }}">
</script>
<script type="text/javascript">
   /*$( document ).ready(function() {
	    console.log( "ready!" );
	    var obj = document.getElementbyID('headingOne');
			document.getElementById('headingOne').value;
		obj.click();
	});*/
		
$("#headingOne").click();
</script>
@endsection


@section('pagina', 'Informacion Matricula')

@section('contenido')
<div class="clearfix">
</div>
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel" style="height:800px;">
         <div class="row">
            <div class="col-md-6">
               <div class="box box-solid" style="height:220px;">
                  <div class="x_content">
                     <dl class="dl-horizontal">
                        <h2>
                           <i class="">
                           </i>
                           Estado Matricula
                           <button class="glyphicon glyphicon-pencil btn btn-primary" data-target=".modalcambiomatricula" data-toggle="modal" style="display: none;" type="button">
                           </button>
                           <small>
                           </small>
                        </h2>
                        @foreach ($colegio as $element)
                        <dt>
                           Estado
                        </dt>
                        <dd>
                           {{ $curso[0]->estado }}
                        </dd>
                        <dt>
                           Colegio
                        </dt>
                        <dd>
                           {{ $element->nombre }}
                        </dd>
                        <dt>
                           Grado
                        </dt>
                        <dd>
                           {{ $element->nombres }}
                        </dd>
                        <dt>
                           Jornada
                        </dt>
                        <dd>
                           {{ $element->jornada }}
                        </dd>
                        <dt>
                           Dirección
                        </dt>
                        <dd>
                           {{ $element->direccion }}
                        </dd>
                        <dt>
                           Telefono
                        </dt>
                        <dd>
                           {{ $element->telefono }}
                        </dd>
                        <dt>
                           Correo
                        </dt>
                        <dd>
                           {{ $element->correo }}
                        </dd>
                        @endforeach
                     </dl>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="box box-solid" style="height:500px;">
                  <div class="x_content">
                     <!-- start accordion -->
                     <div aria-multiselectable="true" class="accordion" id="accordion" role="tablist">
                        <div class="panel">
                           <a aria-controls="estudiante3" aria-expanded="false" class="panel-heading collapsed" data-parent="#accordion" data-toggle="collapse" href="#estudiante3" id="estudiantetre" role="tab">
                              <h4 class="panel-title">
                                 Estudiante
                              </h4>
                           </a>
                           <div aria-expanded="false" aria-labelledby="headingTwo" class="panel-collapse collapse" id="estudiante3" role="tabpanel">
                              <div class="panel-body">
                                 <div class="x_content form-horizontal form-label-left">
                                    <h2>
                                       <i class="">
                                       </i>
                                       Formulario Acudiente
                                       <small>
                                       </small>
                                    </h2>
                                    {!! Form::open(['route' => 'instituciones.matricular', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal form-label-left']) !!}
                                    <input id="colegio" name="colegio" required="" type="hidden" value="{{ $colegio[0]->id_colegio }}">
                                       <input id="gradogrupo" name="gradogrupo" required="" type="hidden" value="{{ $colegio[0]->id }}">
                                          <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                                Nombre
                                                <span class="required">
                                                   *
                                                </span>
                                             </label>
                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" id="nombre" name="nombre" required="required" type="text" value="{{ $estudiante->nombre }}">
                                                </input>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                                Apellido
                                                <span class="required">
                                                   *
                                                </span>
                                             </label>
                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" id="apellido" name="apellido" required="required" type="text" value="{{ $estudiante->apellido }}">
                                                </input>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                                Numero de Documento
                                                <span class="required">
                                                   *
                                                </span>
                                             </label>
                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                @if (Auth::user()->tipo != 'administrador')
                                                <input class="form-control col-md-7 col-xs-12" id="id" name="id" readonly="readonly" required="required" type="text" value="{{ $estudiante->id  }}">
                                                   @else
                                                   <input class="form-control col-md-7 col-xs-12" id="id" name="id" required="required" type="text" value="{{ $estudiante->id  }}">
                                                      @endif
                                                   </input>
                                                </input>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                Tipo de Documento
                                             </label>
                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" id="tipo_doc" name="tipo_doc" value="{{ $estudiante->tipo_doc }}">
                                                   <option value="TI">
                                                      Tarjeta de Identidad
                                                   </option>
                                                   <option value="CC">
                                                      Cedula de Ciudadania
                                                   </option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="middle-name">
                                                Departamento de Expedición
                                             </label>
                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                {!! Form::select('depa_expedicion', $departamentos, $estudiante->depa_expedicion, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione Departamento', 'id' => 'depa_expedicion', 'name' => 'depa_expedicion', 'required']) !!}
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="middle-name">
                                                Municipio de Expedición
                                             </label>
                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                {!! Form::select('muni_expedicion', $ciudades, $estudiante->muni_expedicion, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione Municipio', 'id' => 'muni_expedicion', 'name' => 'muni_expedicion', 'required']) !!}
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                                Telefono
                                                <span class="required">
                                                   *
                                                </span>
                                             </label>
                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" id="telefono" name="telefono" required="required" type="text" value="{{ $estudiante->telefono }}">
                                                </input>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                                Dirección
                                                <span class="required">
                                                   *
                                                </span>
                                             </label>
                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" id="direccion" name="direccion" required="required" type="text" value="{{ $estudiante->direccion }}">
                                                </input>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                                Correo
                                                <span class="required">
                                                   *
                                                </span>
                                             </label>
                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                @if (Auth::user()->tipo != 'administrador')
                                                <input class="form-control col-md-7 col-xs-12" id="correo" name="correo" readonly="readonly" required="required" type="text" value="{{ $estudiante->correo }}">
                                                   @else
                                                   <input class="form-control col-md-7 col-xs-12" id="correo" name="correo" required="required" type="text" value="{{ $estudiante->correo }}">
                                                      @endif
                                                   </input>
                                                </input>
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                Genero
                                             </label>
                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="btn-group" data-toggle="buttons" id="gender">
                                                   <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                      <input name="genero" type="radio" value="Masculino">
                                                         Masculino
                                                      </input>
                                                   </label>
                                                   <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                      <input checked="" name="genero" type="radio" value="Femenino">
                                                         Femenino
                                                      </input>
                                                   </label>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="ln_solid">
                                          </div>
                                       </input>
                                    </input>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="panel">
                           <a aria-controls="collapse3" aria-expanded="false" class="panel-heading collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapse3" id="headingTre" role="tab">
                              <h4 class="panel-title">
                                 Acudiente
                              </h4>
                           </a>
                           <div aria-expanded="false" aria-labelledby="headingTwo" class="panel-collapse collapse" id="collapse3" role="tabpanel">
                              <div class="panel-body">
                                 <div class="x_content form-horizontal form-label-left">
                                    <h2>
                                       <i class="">
                                       </i>
                                       Formulario Acudiente
                                       <small>
                                       </small>
                                    </h2>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                          Nombre
                                          <span class="required">
                                             *
                                          </span>
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" id="nombrea" name="nombrea" required="required" type="text" value="{{ $familiares[0]->nombre }}">
                                          </input>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                          Apellido
                                          <span class="required">
                                             *
                                          </span>
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" id="apellidoa" name="apellidoa" required="required" type="text" value="{{ $familiares[0]->apellido }}">
                                          </input>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                          Numero de Documento
                                          <span class="required">
                                             *
                                          </span>
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" id="num_doca" name="num_doca" required="required" type="text" value="{{ $familiares[0]->num_doc }}">
                                          </input>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                          Tipo de Documento
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select class="form-control" id="tipo_doca" name="tipo_doca" value="{{ $familiares[0]->tipo_doc }}">
                                             <option value="TI">
                                                Tarjeta de Identidad
                                             </option>
                                             <option value="CC">
                                                Cedula de Ciudadania
                                             </option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                          Telefono
                                          <span class="required">
                                             *
                                          </span>
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" id="telefonoa" name="telefonoa" required="required" type="text" value="{{ $familiares[0]->telefono }}">
                                          </input>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                          Parentesco
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select class="form-control" id="parentescoa" name="parentescoa" value="{{ $familiares[0]->parentesco }}">
                                             <option value="">
                                                Seleccione Parentesco
                                             </option>
                                             <option value="Hermano">
                                                Hermano
                                             </option>
                                             <option value="Hermana">
                                                Hermana
                                             </option>
                                             <option value="Abuelo">
                                                Abuelo
                                             </option>
                                             <option value="Abuela">
                                                Abuela
                                             </option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                          Correo
                                          <span class="required">
                                             *
                                          </span>
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" id="correoa" name="correoa" required="required" type="text" value="{{ $familiares[0]->correo }}">
                                          </input>
                                       </div>
                                    </div>
                                    <div class="form-group" style="display: none;">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                          Acudiente
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <div class="btn-group" data-toggle="buttons" id="gender">
                                             <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input checked="" name="acudientea" type="radio" value="Si">
                                                   Si
                                                </input>
                                             </label>
                                             <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input checked="" name="acudientea" type="radio" value="NO">
                                                   No
                                                </input>
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="ln_solid">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="panel">
                           <a aria-controls="collapseTwo" aria-expanded="false" class="panel-heading collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapseTwo" id="headingTwo" role="tab">
                              <h4 class="panel-title">
                                 Padre
                              </h4>
                           </a>
                           <div aria-expanded="false" aria-labelledby="headingTwo" class="panel-collapse collapse" id="collapseTwo" role="tabpanel">
                              <div class="panel-body">
                                 <div class="x_content form-horizontal form-label-left">
                                    <h2>
                                       <i class="">
                                       </i>
                                       Formulario Padre
                                       <small>
                                       </small>
                                    </h2>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                          Nombre
                                          <span class="required">
                                             *
                                          </span>
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" id="nombrep" name="nombrep" required="required" type="text" value="{{ $familiares[2]->nombre }}">
                                          </input>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                          Apellido
                                          <span class="required">
                                             *
                                          </span>
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" id="apellidop" name="apellidop" required="required" type="text" value="{{ $familiares[2]->apellido }}">
                                          </input>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                          Numero de Documento
                                          <span class="required">
                                             *
                                          </span>
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" id="num_docp" name="num_docp" required="required" type="text" value="{{ $familiares[2]->nombre }}">
                                          </input>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                          Tipo de Documento
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select class="form-control" id="tipo_docp" name="tipo_docp" value="{{ $familiares[2]->tipo_doc }}">
                                             <option value="TI">
                                                Tarjeta de Identidad
                                             </option>
                                             <option value="CC">
                                                Cedula de Ciudadania
                                             </option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                          Telefono
                                          <span class="required">
                                             *
                                          </span>
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" id="telefonop" name="telefonop" required="required" type="text" value="{{ $familiares[2]->telefono }}">
                                          </input>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                          Parentesco
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select class="form-control" id="parentescop" name="parentescop">
                                             <option value="Padre">
                                                Padre
                                             </option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                          Correo
                                          <span class="required">
                                             *
                                          </span>
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" id="correop" name="correop" required="required" type="text" value="{{ $familiares[2]->correo }}">
                                          </input>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                          Acudiente
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <div class="btn-group" data-toggle="buttons" id="gender">
                                             <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input checked="" name="acudientep" type="radio" value="Si">
                                                   Si
                                                </input>
                                             </label>
                                             <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input =""="" name="acudientep" type="radio" value="NO">
                                                   No
                                                </input>
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="ln_solid">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="panel">
                           <a aria-controls="collapse5" aria-expanded="false" class="panel-heading collapsed" data-parent="#accordion" data-toggle="collapse" href="#collapse5" id="heading5" role="tab">
                              <h4 class="panel-title">
                                 Madre
                              </h4>
                           </a>
                           <div aria-expanded="false" aria-labelledby="heading5" class="panel-collapse collapse" id="collapse5" role="tabpanel">
                              <div class="panel-body">
                                 <div class="x_content form-horizontal form-label-left">
                                    <h2>
                                       <i class="">
                                       </i>
                                       Formulario Madre
                                       <small>
                                       </small>
                                    </h2>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                          Nombre
                                          <span class="required">
                                             *
                                          </span>
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" id="nombrem" name="nombrem" required="required" type="text" value="{{ $familiares[1]->nombre }}">
                                          </input>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                          Apellido
                                          <span class="required">
                                             *
                                          </span>
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" id="apellidom" name="apellidom" required="required" type="text" value="{{ $familiares[1]->apellido }}">
                                          </input>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                          Numero de Documento
                                          <span class="required">
                                             *
                                          </span>
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" id="num_docm" name="num_docm" required="required" type="text" value="{{ $familiares[1]->num_doc }}">
                                          </input>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                          Tipo de Documento
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select class="form-control" id="tipo_docm" name="tipo_docm" value="{{ $familiares[1]->tipo_doc }}">
                                             <option value="TI">
                                                Tarjeta de Identidad
                                             </option>
                                             <option value="CC">
                                                Cedula de Ciudadania
                                             </option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">
                                          Telefono
                                          <span class="required">
                                             *
                                          </span>
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" id="telefonom" name="telefonom" required="required" type="text" value="{{ $familiares[1]->telefono }}">
                                          </input>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                          Parentesco
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <select class="form-control" id="parentescom" name="parentescom">
                                             <option value="Madre">
                                                Madre
                                             </option>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">
                                          Correo
                                          <span class="required">
                                             *
                                          </span>
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input class="form-control col-md-7 col-xs-12" id="correom" name="correom" required="required" type="text" value="{{ $familiares[1]->correo }}">
                                          </input>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                          Acudiente
                                       </label>
                                       <div class="col-md-6 col-sm-6 col-xs-12">
                                          <div class="btn-group" data-toggle="buttons" id="gender">
                                             <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input checked="" name="acudientem" type="radio" value="Si">
                                                   Si
                                                </input>
                                             </label>
                                             <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input =""="" name="acudientem" type="radio" value="NO">
                                                   No
                                                </input>
                                             </label>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="ln_solid">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- end of accordion -->
                  </div>
               </div>
            </div>
         </div>
         {!! Form::close() !!}
         <div class="ln_solid">
         </div>
         <div class="row text-right form-group">
            <button class="btn btn-success" data-target=".bs-example-modal-sm" data-toggle="modal" type="button">
               Cambiar Estado
            </button>
            <button class="btn btn-primary" onclick="history.back()" type="submit">
               Volver
            </button>
            <a class=" btn btn-danger" href=" {{ route('matricular.destroy', $estudiante->id) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')">
               Eliminar
            </a>
         </div>
      </div>
   </div>
   <!-- Large modal -->
   <div aria-hidden="true" class="modal fade modalcambiomatricula" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-lg">
         <div class="modal-content">
            <div class="modal-header">
               <button class="close" data-dismiss="modal" type="button">
                  <span aria-hidden="true">
                     ×
                  </span>
               </button>
               <h4 class="modal-title" id="myModalLabel">
                  Modal title
               </h4>
            </div>
            <div class="modal-body">
               <h4>
                  Text in a modal
               </h4>
               <p>
                  Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.
               </p>
               <p>
                  Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
               </p>
            </div>
            <div class="modal-footer">
               <button class="btn btn-default" data-dismiss="modal" type="button">
                  Close
               </button>
               <button class="btn btn-primary" type="button">
                  Save changes
               </button>
            </div>
         </div>
      </div>
   </div>
   <!-- Small modal -->
   <div aria-hidden="true" class="modal fade bs-example-modal-sm" role="dialog" tabindex="-1">
      <div class="modal-dialog modal-sm">
         <div class="modal-content">
            <div class="modal-header">
               <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                  <span aria-hidden="true">
                     ×
                  </span>
               </button>
               <h4 class="modal-title" id="myModalLabel2">
                  Cambio de Estado Matricula
               </h4>
            </div>
            <div class="modal-body">
               {!! Form::open(['route' => 'matriculas.estado', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal form-label-left']) !!}
               <input id="colegio" name="id_curso" required="" type="hidden" value="{{ $colegio[0]->id }}"/>
               <input id="gradogrupo" name="id_estudiante" required="" type="hidden" value="{{ $estudiante->id }}"/>
               <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">
                     Estado
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     {!! Form::select('estado_matricula', ['Pendiente' => 'Pendiente', 'Cancelado' => 'Cancelado', 'Aprobado' => 'Aprobado'], $curso[0]->estado, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione Estado', 'id' => 'estado_matricula', 'name' => 'estado_matricula', 'required']) !!}
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button class="btn btn-default" data-dismiss="modal" type="button">
                  Close
               </button>
               <button class="btn btn-primary" type="submit">
                  Save changes
               </button>
            </div>
         </div>
         {!! Form::close() !!}
      </div>
   </div>
   <!-- /modals -->
</div>
@endsection


	@section('js2')
<script type="text/javascript">
   ///$("#headingOne").click();
</script>
@endsection
