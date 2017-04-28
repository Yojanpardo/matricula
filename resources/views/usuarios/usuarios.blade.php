@extends('template.principal')

@section('titulo', 'Usuarios')

@section('js1')


@endsection


@section('pagina', 'Usuarios')

@section('contenido')
<a class="btn btn-info" href=" {{ route('usuarios.create') }} " style="float:right">
   Nuevo Usuario
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
                                        Tipo
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
                                @foreach ($users as $user)
                                <tr class="odd gradeX">
                                    <td>
                                        {{ $user->id }}
                                    </td>
                                    <td>
                                        {{ $user->nombre }}
                                    </td>
                                    <td>
                                        {{ $user->apellido }}
                                    </td>
                                    <td>
                                        {{ $user->tipo }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        <a class="glyphicon glyphicon-pencil btn btn-info" href=" {{ route('usuarios.edit', $user->id) }} ">
                                        </a>
                                        <a class="glyphicon glyphicon-trash btn btn-danger" href=" {{ route('usuarios.destroy', $user->id) }} " onclick="return confirm('¿Seguro Desea Eliminarlo?')">
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
               </table>
               {!! Form::button('Regresar', ['class' => 'btn btn-success', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
            </div>
            <div class="text-left">
               {!! $users->render() !!}
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
