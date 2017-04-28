@extends('template.principal')

@section('titulo', 'Familiares')

@section('js1')


@endsection


@section('pagina', 'Familiares')

@section('contenido')


<a href=" {{ route('familiares.create') }} " class="btn btn-info" style="float:right; display:none;"> Nuevo Familiar</a>
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
								<th>Telefono</th>
								<th>Email</th>
								<th>Accion</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($familiares as $familiar)
							<tr class="odd gradeX">
								<td>{{ $familiar->num_doc }}</td>
								<td>{{ $familiar->nombre }}</td>
								<td>{{ $familiar->apellido }}</td>
								<td>{{ $familiar->telefono }}</td>
								<td>{{ $familiar->correo }}</td>
								<td>
									<a href=" {{ route('familiares.edit', $familiar->num_doc) }} " class="glyphicon glyphicon-pencil btn btn-info"></a>
									<a style="display:none" href=" {{ route('familiares.destroy', $familiar->num_doc) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')" class="glyphicon glyphicon-trash btn btn-danger"></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{!! Form::button('Regresar', ['class' => 'btn btn-success', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
				</div>
				<div class="text-left">
					{!! $familiares->render() !!}
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