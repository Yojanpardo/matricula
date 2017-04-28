@extends('template.principal')

@section('titulo', 'Inicio')

@section('js1')


@endsection

@section('pagina', 'Edición de Familiar')

@section('contenido')

<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Formulario de registro</h2>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				
				{!! Form::open(['route' => ['familiares.update', $familiares], 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal form-label-left']) !!}

				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Nombre <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="nombre" name="nombre" value="{{ $familiares->nombre }}" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="apellido" name="apellido" value="{{ $familiares->apellido }}" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Numero de Documento <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						@if (Auth::user()->tipo != 'administrador')
						<input type="text" id="num_doc" name="num_doc" value="{{ $familiares->num_doc }}" readonly="readonly"  required="required" class="form-control col-md-7 col-xs-12">
						@else
						<input type="text" id="num_doc" name="num_doc" value="{{ $familiares->num_doc }}" required="required" class="form-control col-md-7 col-xs-12">
						@endif
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Documento</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<select class="form-control" id="tipo_doc" name="tipo_doc" value="{{ $familiares->tipo_doc }}">
							<option value="TI">Tarjeta de Identidad</option>
							<option value="CC">Cedula de Ciudadania</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefono <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="telefono" value="{{ $familiares->telefono }}" name="telefono" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Correo <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="correo" 
						@if (Auth::user()->tipo != 'administrador')
						readonly="readonly"
						@endif 
						value="{{ $familiares->correo }}" name="correo" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="ln_solid"></div>
				<div class="row text-right form-group">
					<button type="submit" class="btn btn-primary" onclick="history.back()">Volver</button>
					<button type="submit" class="btn btn-success">Modificar</button>
				</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#birthday').daterangepicker({
			singleDatePicker: true,
			calender_style: "picker_4"
		}, function(start, end, label) {
			console.log(start.toISOString(), end.toISOString(), label);
		});
	});
</script>


@endsection


@section('js2')

<script type="text/javascript">



</script>

@endsection