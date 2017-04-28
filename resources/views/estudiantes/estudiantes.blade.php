@extends('template.principal')

@section('titulo', 'Estudiantes')

@section('js1')


@endsection


@section('pagina', 'Estudiantes')

@section('contenido')
<a class="btn btn-info" href=" {{ route('estudiantes.create') }} " style="float:right">
   Nuevo Estudiante
</a>
<div class="clearfix">
</div>
<div class="row">
   <div class="col-lg-12">
      <div class="panel panel-default">
         <!-- /.panel-heading -->
         <div class="panel-body">
            <div class="dataTable_wrapper">
               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                     <tr>
                        <th>
                           Cedula
                        </th>
                        <th>
                           Nombre
                        </th>
                        <th>
                           Apellido
                        </th>
                        <th>
                           Genero
                        </th>
                        <th>
                           Telefono
                        </th>
                        <th>
                           Email
                        </th>
                        <th>
                           Accion
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($estudiantes as $estudiante)
                     <tr class="odd gradeX">
                        <td>
                           {{ $estudiante->id }}
                        </td>
                        <td>
                           {{ $estudiante->nombre }}
                        </td>
                        <td>
                           {{ $estudiante->apellido }}
                        </td>
                        <td>
                           {{ $estudiante->genero }}
                        </td>
                        <td>
                           {{ $estudiante->telefono }}
                        </td>
                        <td>
                           {{ $estudiante->correo }}
                        </td>
                        <td>
                           <a class="glyphicon glyphicon-eye-open btn btn-success" href=" {{ route('instituciones.matricula', $estudiante->id) }} " title="Ver Matricula">
                           </a>
                           <a class="glyphicon glyphicon-pencil btn btn-info" href=" {{ route('estudiantes.edit', $estudiante->id) }} ">
                           </a>
                           <a class="glyphicon glyphicon-trash btn btn-danger" href=" {{ route('estudiantes.destroy', $estudiante->id) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')">
                           </a>
                        </td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
               {!! Form::button('Regresar', ['class' => 'btn btn-success', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
            </div>
            <div class="text-left">
               {!! $estudiantes->render() !!}
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
