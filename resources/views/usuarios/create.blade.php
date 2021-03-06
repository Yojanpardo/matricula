@extends('template.principal')

@section('titulo', 'Inicio')

@section('js1')


@endsection

@section('pagina', 'Creación de Usuarios')

@section('contenido')

<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">

			@if(count($errors) > 0)
		        <div class="alert alert-danger" role="alert">
		            @foreach ($errors->all() as $error)
		            <li>
		                {{ $error }}
		            </li>
		            @endforeach
		        </div>
	        @endif

			<div class="x_title">
				<h2>Formulario de registro</h2>

				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				{!! Form::open(['route' => 'usuarios.store', 'method' => 'POST', 'files' => true]) !!}
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('cedula', 'Cedula') !!}
        {!! Form::text('id', null, ['class'       => 'form-control', 'placeholder' => 'Numero De Cedula', 'required', 'pattern' => '[0-9]{8,30}', 'title' => 'La Cedula Solo Debe Contener Numeros y tener una longitud minima de 8 Digitos']) !!}
        
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class'   => 'form-control', 'placeholder' => 'Nombre Completo', 'required', 'title' => 'El Nombre Solo Debe Tener Letras']) !!}
        
        {!! Form::label('apellido', 'Apellido') !!}
        {!! Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Apellido Completo', 'required', 'title' => 'El Nombre Solo Debe Tener Letras']) !!}
                
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email', null, ['class'   => 'form-control', 'placeholder' => 'example@gmail.com', 'required', 'pattern' => '[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$', 'title' => 'El Email Debe De Tener el Formato example@example.com']) !!}

        {!! Form::label('password', 'Contraseña') !!}
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '***************', 'required', 'title' => 'Debe contener al menos un número y una mayúscula y minúscula, y al menos 8 o más caracteres']) !!}

        {!! Form::label('tipo', 'Nivel De Usuario') !!}
        {!! Form::select('tipo', ['administrador' => 'Administrador', 'usuario' => 'Estudiante', 'rector' => 'Rector'], null, ['class' => 'form-control', 'placeholder' => 'Seleccione Nivel De Usuario', 'required', 'id' => 'tipo']) !!}

        {!! Form::label('imagen', 'Imagen') !!}
        {!! Form::file('imagen', ['class' => '']) !!}
                <br>
                    {!! Form::submit('Registrar', ['class' => 'btn btn-default'])!!}
        {!! Form::button('Volver', ['class' => 'btn btn-default', 'onclick' => 'history.back()', 'name' => 'Back2'])!!}
                </br>
            </div>
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