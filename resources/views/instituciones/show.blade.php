@extends('template.principal')

@section('titulo', $institucion->nombre)

@section('js1')

@endsection


@section('pagina', $institucion->nombre)

@section('contenido')

<div class="clearfix"></div>

<div class="row">

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel" style="height:600px;">
			<div class="row" >
				<div class="col-md-6">
					<div class="box box-solid" style="height:500px;">
						<div class="box-header with-border">
							<i class="fa fa-text-width"></i>

							<h3 class="box-title">Informacion</h3>
						</div>
						
						{!! Form::open(['route'=> 'instituciones.peticion', 'method' => 'POST']) !!}

						{!! csrf_field() !!}

						<div class="box-body">
							<dl class="dl-horizontal">
								<dt>Nombre</dt>
								<dd>{{ $institucion->nombre }}</dd>
								<dt>Rector</dt>
								<dd>{{ $institucion->rector }}</dd>
								<dt>Dirección</dt>
								<dd>{{ $institucion->direccion }}</dd>
								<dt>Telefono</dt>
								<dd>{{ $institucion->telefono }}</dd>
								<dt>Correo</dt>
								<dd>{{ $institucion->correo }}</dd>
								<dt>Sede</dt>
								<dd>{{ $institucion->sede }}</dd>
							</dl>
						</div>

						
						<div class="row">
							<div class="col-md-7">
								<div class="form-group">
									{!! Form::label('gradogrupo', 'Grado y Grupo') !!}
									{!! Form::select('gradogrupo', $cursos, null, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione Curso y jornada', 'id' => 'gradogrupo', 'name' => 'gradogrupo', 'required']) !!}
									{!! Form::hidden('colegio',  $institucion->id, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione Curso y jornada', 'id' => 'colegio', 'name' => 'colegio']) !!}
								</div>
							</div>
						</div>
						<div class="row text-right">
							<div class="col-md-7">
								<button type="submit" href="" class="btn btn-default">Continuar</button>
								<button class="btn btn-default" onclick="history.back()" name="Back2" type="button">Volver</button>
							</div>
						</div>

						<!-- /.box-body -->
					</div>
					{!! Form::close() !!}
				</div>
				<!-- ./col -->
				<div class="col-md-6">
					<div class="box box-solid" style="height:500px;">
						<div id="myCarousel" class="carousel slide" data-ride="carousel">
							<!-- Indicators -->
							<ol class="carousel-indicators">
								<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
								<li data-target="#myCarousel" data-slide-to="1"></li>
								<li data-target="#myCarousel" data-slide-to="2"></li>
								<li data-target="#myCarousel" data-slide-to="3"></li>
							</ol>

							<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
								<div class="item active">
									<img src="http://www.bogota.gov.co/sites/default/files/styles/large/public/field/image/colegio-distrital_0.jpg" alt="Chania">
								</div>

								<div class="item">
									<img src="http://www.bogota.gov.co/sites/default/files/styles/large/public/field/image/colegio-distrital_0.jpg" alt="Chania">
								</div>

								<div class="item">
									<img src="http://www.bogota.gov.co/sites/default/files/styles/large/public/field/image/colegio-distrital_0.jpg" alt="Flower">
								</div>

								<div class="item">
									<img src="http://www.bogota.gov.co/sites/default/files/styles/large/public/field/image/colegio-distrital_0.jpg" alt="Flower">
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
					<!-- /.box -->
				</div>
				<!-- ./col -->
			</div>
		</div>
	</div>
</div>


@endsection


@section('js2')

<script type="text/javascript">

	$("#gradogrupo").chosen({
		search_contains: true,
		no_results_text: 'No Se Encontraron Resultados',
		allow_single_deselect: true
	});


</script>

@endsection