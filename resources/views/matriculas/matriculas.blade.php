@extends('template.principal')

@section('titulo', 'Estudiantes')

@section('js1')


@endsection


@section('pagina', 'Estudiantes')

@section('contenido')

<div class="row">
	<div class="col-md-5">
		<div class="form-group">
		{!! Form::open(['route' => 'matriculas.index', 'method' => 'GET', 'files' => true, 'class' => '']) !!}

			{!! Form::select('id', $colegios, null, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione Institución', 'id' => 'id', 'name' => 'id', 'required', 'onclick' => "alert('hola');"]) !!}

		</div>
	</div>
	<div class="col-md-5">
		<button type="submit" class="glyphicon glyphicon-search btn btn-default btn-xs" title="Busqueda"> </button>

	</div>

	<a href=" {{ route('estudiantes.create') }} " class="btn btn-info" style="float:right"> Nuevo Estudiante</a>
</div>

<div class="clearfix"></div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Cedula</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Genero</th>
								<th>Telefono</th>
								<th>Email</th>
								<th>Accion</th>
							</tr>
						</thead>
						<tbody>

						@if (count($estudiantes) == 0)
							<tr>
								<td colspan="7">
									No Hay Matriculas Para esta Institución
								</td>
							</tr>
						@else
							@for ($i = 0; $i < count($estudiantes); $i++)
								{{-- expr --}}
							
							<tr class="odd gradeX">
								<td>{{ $estudiantes[$i]->id }}</td>
								<td>{{ $estudiantes[$i]->nombre }}</td>
								<td>{{ $estudiantes[$i]->apellido }}</td>
								<td>{{ $estudiantes[$i]->genero }}</td>
								<td>{{ $estudiantes[$i]->telefono }}</td>
								<td>{{ $estudiantes[$i]->correo }}</td>
								<td>
									<a href=" {{ route('instituciones.matricula', $estudiantes[$i]->id) }} " class="glyphicon glyphicon-eye-open btn btn-success" title="Ver Matricula"></a>
									<a href=" {{ route('estudiantes.edit', $estudiantes[$i]->id) }} " class="glyphicon glyphicon-pencil btn btn-info"></a>
								</td>
							</tr>
							@endfor
						@endif

							
						</tbody>
					</table>
					{!! Form::button('Regresar', ['class' => 'btn btn-success', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
				</div>
				<div class="text-left">
					
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->


@endsection


@section('js2')

<script type="text/javascript">

	$("#id").chosen({
			search_contains: true,
			no_results_text: 'No Se Encontraron Resultados',
			allow_single_deselect: true
		});

</script>

@endsection