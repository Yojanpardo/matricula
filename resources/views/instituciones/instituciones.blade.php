@extends('template.principal')

@section('titulo', 'Inicio')

@section('js1')


@endsection


@section('pagina', 'Institucion')

@section('contenido')


<a href=" {{ route('instituciones.create') }} " class="btn btn-info" style="float:right"> Nueva Institucion</a>
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
								<th>id</th>
								<th>Nombre</th>
								<th>Rector</th>
								<th>Direccion</th>
								<th>Telefono</th>
								<th>Correo</th>
								<th>Accion</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($instituciones as $institucion)
							<tr class="odd gradeX">
								<td>{{ $institucion->id }}</td>
								<td>{{ $institucion->nombre }}</td>
								<td>{{ $institucion->rector }}</td>
								<td>{{ $institucion->direccion }}</td>
								<td>{{ $institucion->telefono }}</td>
								<td>{{ $institucion->correo }}</td>
								<td>
									<a href=" {{ route('instituciones.edit', $institucion->id) }} " class="glyphicon glyphicon-pencil btn btn-info"></a>
									<a href=" {{ route('instituciones.destroy', $institucion->id) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')" class="glyphicon glyphicon-trash btn btn-danger"></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{!! Form::button('Regresar', ['class' => 'btn btn-success', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
				</div>
				<div class="text-center">
					{!! $instituciones->render() !!}
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



</script>

@endsection