@extends('template.principal')

@section('titulo', 'Inicio')

@section('js1')


@endsection


@section('pagina', 'Usuarios')

@section('contenido')


<a href=" {{ route('rectores.create') }} " class="btn btn-info" style="float:right"> Nuevo Rector</a>
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
							@foreach ($rectores as $rector)
							<tr class="odd gradeX">
								<td>{{ $rector->id }}</td>
								<td>{{ $rector->nombre }}</td>
								<td>{{ $rector->apellido }}</td>
								<td>{{ $rector->genero }}</td>
								<td>{{ $rector->telefono }}</td>
								<td>{{ $rector->correo }}</td>
								<td>
									<a href=" {{ route('rectores.edit', $rector->id) }} " class="glyphicon glyphicon-pencil btn btn-info"></a>
									<a href=" {{ route('rectores.destroy', $rector->id) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')" class="glyphicon glyphicon-trash btn btn-danger"></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{!! Form::button('Regresar', ['class' => 'btn btn-success', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
				</div>
				<div class="text-left">
					{!! $rectores->render() !!}
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