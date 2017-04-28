@extends('template.principal')

@section('titulo', 'Inicio')

@section('js1')

<script type="text/javascript" src="http://www.google.com/jsapi?key=AIzaSyBoi-RhPgD-YKJ0PARg__XK-nNLZFmDcPs"></script>

<script type="text/javascript">

	$(document).ready(function() {

		//location.reload();

		//alert('Recuerde que al quitar un curso, se eliminaran los estudiantes matriculados en este¡¡¡¡');
	});

	google.load('maps', '2', {callback:simple3});

	var map;	
	function simple3(){	
		if (GBrowserIsCompatible()) { 
			function createMarker(point,html) {
				var marker = new GMarker(point);
				GEvent.addListener(marker, "click", function() {
					marker.openInfoWindowHtml(html);});
				return marker;
			}			
			var map = new GMap2(document.getElementById("mapa"));
			map.addControl(new GLargeMapControl());
			map.addControl(new GMapTypeControl());	  
			map.setCenter(new GLatLng(4.3345364233209205,-74.36971664428711),14);
		}	  

		var point = new GLatLng({{ $colegio->latitud }},{{ $colegio->longitud }});
		var marker = createMarker(point,'<div style="width:240px"> {{ $colegio->nombre }}  <\/div>')
		map.addOverlay(marker);
		var coordenadas = "";

		GEvent.addListener(map, "click", function (overlay,point){
			if (point){

				marker.setPoint(point);
				var coordenadas = point + "";

				/*cadena=coordenadas.replace('(','');
				cadena=coordenadas.replace(')','');*/

				coordenadas = coordenadas.split('(');
				coordenadas = coordenadas[1].replace(')','');
				coordenadas = coordenadas.split(',');
				$('#latitud').val(coordenadas[0]);
				coordenadas[1] = coordenadas[1].replace(' ','');
				$('#longitud').val(coordenadas[1]);
				//console.log(marker);
			}
		});

		


	}
	window.onload=function(){simple3();
	}

</script>


@endsection

@section('pagina', 'Edición de Institucion')

@section('contenido')

<div class="clearfix"></div>
<div class="row">
	<div class="col-md-6 col-sm-6 col-xs-6">
		<div class="x_panel">
			<div class="x_title">
				<h2>Formulario de registro</h2>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				{!! Form::open(['route' => ['instituciones.update', $colegio], 'method' => 'PUT', 'files' => true, 'class' => 'form-horizontal form-label-left']) !!}

				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="nombre" name="nombre" value="{{ $colegio->nombre }}" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Rector <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						{!! Form::select('rector', $rectores, $colegio->rector, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione Rector', 'id' => 'rector', 'name' => 'rector', 'required', 'value' => '$colegio->rector']) !!}
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Numero de Institucion <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						@if (Auth::user()->tipo != 'administrador')
						<input type="text" id="id" name="id" value="{{ $colegio->id }}" readonly="readonly"  required="required" class="form-control col-md-7 col-xs-12">
						@else
						<input type="text" id="id" name="id" value="{{ $colegio->id }}" required="required" class="form-control col-md-7 col-xs-12">
						@endif
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefono <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="telefono" value="{{ $colegio->telefono }}" name="telefono" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Dirección <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="direccion" value="{{ $colegio->direccion }}" name="direccion" required="required" class="form-control col-md-7 col-xs-12">
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
						value="{{ $colegio->correo }}" name="correo" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Sede <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="sede" name="sede" value="{{ $colegio->sede }}" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Latitud <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="latitud" value="{{ $colegio->latitud }}" readonly="" name="latitud" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Longitud <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="text" id="longitud" value="{{ $colegio->longitud }}" readonly="" name="longitud" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Cupos <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12">
						<input type="number" id="cupos" name="cupos" required="required" class="form-control col-md-7 col-xs-12">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Cursos y Jornadas <span class="required">*</span>
					</label>
					<div class="col-md-6 col-sm-6 col-xs-12" >
						{!! Form::select('cursos[]', $cursos, $curso, ['class' => 'form-control', 'required', 'id' => 'cursos', 'required', 'multiple', 'data-placeholder' => 'Seleccione curso y jornada']) !!}
					</div>
				</div>
				<div class="ln_solid"></div>
				<div class="row text-right form-group">
					<button type="submit" class="btn btn-primary" onclick="history.back()">Volver</button>
					<button type="submit" class="btn btn-success">Editar</button>
				</div>

				
			</div>
		</div>
	</div>

	<div class="col-md-6 col-sm-6 col-xs-6">
		<div class="x_panel">
			<div class="x_title">
				<h2>Ubicación de la institución</h2>

				<div class="clearfix"></div>
			</div>
			<div class="x_panel" style="height:400px;">
				<div id="mapa" style="width:100%;height:100%;border:2px solid violet;">

				</div>

			</div>
		</div>
	</div>
	{!! Form::close() !!}
</div>

<script type="text/javascript">
	$("#rector").chosen({
		search_contains: true,
		no_results_text: 'No Se Encontraron Resultados',
		allow_single_deselect: true
	});
	$("#cursos").chosen({
		search_contains: true,
		no_results_text: 'No Se Encontraron Resultados',
		title: 'Seleccione Curso y Jornada'
	});

</script>


@endsection


@section('js2')

<script type="text/javascript">



</script>

@endsection