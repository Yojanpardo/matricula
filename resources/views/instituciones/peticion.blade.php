@extends('template.principal')

@section('titulo', 'Matricula')

@section('js1')

<script type="text/javascript">
	

</script>

@endsection


@section('pagina', 'Matricula')

@section('contenido')

<div class="clearfix"></div>

<div class="row">

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel" style="height:600px;">
			<div class="row" >

				<div class="col-md-6">
					<div class="box box-solid" style="height:500px;">

						<div class="x_content">

							<h2><i class=""></i> Formulario Estudiante <small></small></h2>
							{!! Form::open(['route' => 'instituciones.matricular', 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal form-label-left']) !!}

							<input type="hidden" id="colegio" name="colegio" required="" value="{{ $informacion[0] }}" >
							<input type="hidden" id="gradogrupo" name="gradogrupo" required="" value="{{ $informacion[1] }}" >

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="nombre" name="nombre" value="{{ Auth::user()->nombre  }}" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="apellido" name="apellido" value="{{ Auth::user()->apellido  }}" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Numero de Documento <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									@if (Auth::user()->tipo != 'administrador')
									<input type="text" id="id" name="id" value="{{ Auth::user()->id  }}" readonly="readonly"  required="required" class="form-control col-md-7 col-xs-12">
									@else
									<input type="text" id="id" name="id" value="{{ Auth::user()->id  }}" required="required" class="form-control col-md-7 col-xs-12">
									@endif
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Documento</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select class="form-control" id="tipo_doc" name="tipo_doc">
										<option value="TI">Tarjeta de Identidad</option>
										<option value="CC">Cedula de Ciudadania</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Departamento de Expedición</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									
									{!! Form::select('depa_expedicion', $departamentos, null, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione Departamento', 'id' => 'depa_expedicion', 'name' => 'depa_expedicion', 'required']) !!}

								</div>
							</div>
							<div class="form-group">
								<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Municipio de Expedición</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									{!! Form::select('muni_expedicion', $ciudades, null, ['class' => 'form-control', 'required', 'placeholder' => 'Seleccione Municipio', 'id' => 'muni_expedicion', 'name' => 'muni_expedicion', 'required']) !!}
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefono <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="telefono" name="telefono" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Dirección <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="direccion" name="direccion" required="required" class="form-control col-md-7 col-xs-12">
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
									value="{{ Auth::user()->email  }}" name="correo" required="required" class="form-control col-md-7 col-xs-12">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Genero</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div id="gender" class="btn-group" data-toggle="buttons">
										<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
											<input type="radio" name="genero" value="Masculino"> &nbsp; Masculino &nbsp;
										</label>
										<label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
											<input type="radio" name="genero" value="Femenino" checked=""> Femenino
										</label>
									</div>
								</div>
							</div>
							<div class="ln_solid"></div>



						</div>

					</div>
				</div>

				<div class="col-md-6">
					<div class="box box-solid" style="height:500px;">


						<div class="x_content">

							<!-- start accordion -->
							<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
								<div class="panel">
									<a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										<h4 class="panel-title">Informacion</h4>
									</a>
									<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true" style="height: 0px;">
										<div class="panel-body">
											<div class="box-body">
												<dl class="dl-horizontal">

													@foreach ($cole as $element)
													<dt>Colegio</dt>
													<dd>{{ $element->colegio }}</dd>
													<dt>Grado</dt>
													<dd>{{ $element->grado }}</dd>
													<dt>Jornada</dt>
													<dd>{{ $element->jornada }}</dd>

													@endforeach

												</dl>
											</div>
										</div>
									</div>
								</div>
								<div class="panel">
									<a class="panel-heading collapsed" role="tab" id="headingTre" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
										<h4 class="panel-title">Acudiente</h4>
									</a>
									<div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
										<div class="panel-body">
											<div class="x_content form-horizontal form-label-left">
												<h2><i class=""></i> Formulario Acudiente <small></small></h2>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<input type="text" id="nombrea" name="nombrea" required="required" class="form-control col-md-7 col-xs-12">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<input type="text" id="apellidoa" name="apellidoa" required="required" class="form-control col-md-7 col-xs-12">
													</div>
												</div>

												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Numero de Documento <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<input type="text" id="num_doca" name="num_doca" required="required" class="form-control col-md-7 col-xs-12">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Documento</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<select class="form-control" id="tipo_doca" name="tipo_doca">
															<option value="TI">Tarjeta de Identidad</option>
															<option value="CC">Cedula de Ciudadania</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefono <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<input type="text" id="telefonoa" name="telefonoa" required="required" class="form-control col-md-7 col-xs-12">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12">Parentesco</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<select class="form-control" id="parentescoa" name="parentescoa">
															<option value="">Seleccione Parentesco</option>
															<option value="Hermano">Hermano</option>
															<option value="Hermana">Hermana</option>
															<option value="Abuelo">Abuelo</option>
															<option value="Abuela">Abuela</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Correo <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<input type="text" id="correoa" name="correoa" required="required" class="form-control col-md-7 col-xs-12">
													</div>
												</div>
												<div class="form-group" style="display: none;">
													<label class="control-label col-md-3 col-sm-3 col-xs-12">Acudiente</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div id="gender" class="btn-group" data-toggle="buttons">
															<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
																<input type="radio" name="acudientea" checked="" value="Si"> &nbsp; Si &nbsp;
															</label>
															<label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
																<input type="radio" name="acudientea" value="NO" > No
															</label>
														</div>
													</div>
												</div>
												<div class="ln_solid"></div>


												
											</div>
										</div>
									</div>
								</div>
								<div class="panel">
									<a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										<h4 class="panel-title">Padre</h4>
									</a>
									<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
										<div class="panel-body">
											<div class="x_content form-horizontal form-label-left">
												<h2><i class=""></i> Formulario Padre <small></small></h2>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<input type="text" id="nombrep" name="nombrep" required="required" class="form-control col-md-7 col-xs-12" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<input type="text" id="apellidop" name="apellidop" required="required" class="form-control col-md-7 col-xs-12" value="">
													</div>
												</div>

												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Numero de Documento <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<input type="text" id="num_docp" name="num_docp" required="required" class="form-control col-md-7 col-xs-12" value="">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Documento</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<select class="form-control" id="tipo_docp" name="tipo_docp">
															<option value="TI">Tarjeta de Identidad</option>
															<option value="CC">Cedula de Ciudadania</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefono <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<input type="text" id="telefonop" name="telefonop" required="required" class="form-control col-md-7 col-xs-12">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12">Parentesco</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<select class="form-control" id="parentescop" name="parentescop">
															<option value="Padre">Padre</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Correo <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<input type="text" id="correop" name="correop" required="required" class="form-control col-md-7 col-xs-12">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12">Acudiente</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div id="gender" class="btn-group" data-toggle="buttons">
															<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
																<input type="radio" name="acudientep" value="Si"> &nbsp; Si &nbsp;
															</label>
															<label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
																<input type="radio" name="acudientep" value="NO" checked=""> No
															</label>
														</div>
													</div>
												</div>
												<div class="ln_solid"></div>


												
											</div>
										</div>
									</div>
								</div>

								<div class="panel">
									<a class="panel-heading collapsed" role="tab" id="headingma" data-toggle="collapse" data-parent="#accordion" href="#collapsema" aria-expanded="false" aria-controls="collapsema">
										<h4 class="panel-title">Madre</h4>
									</a>
									<div id="collapsema" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingma" aria-expanded="false">
										<div class="panel-body">
											<div class="x_content form-horizontal form-label-left">
												<h2><i class=""></i> Formulario Madre <small></small></h2>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<input type="text" id="nombrem" name="nombrem" required="required" class="form-control col-md-7 col-xs-12">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<input type="text" id="apellidom" name="apellidom" required="required" class="form-control col-md-7 col-xs-12">
													</div>
												</div>

												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Numero de Documento <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<input type="text" id="num_docm" name="num_docm" required="required" class="form-control col-md-7 col-xs-12">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo de Documento</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<select class="form-control" id="tipo_docm" name="tipo_docm">
															<option value="TI">Tarjeta de Identidad</option>
															<option value="CC">Cedula de Ciudadania</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefono <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<input type="text" id="telefonom" name="telefonom" required="required" class="form-control col-md-7 col-xs-12">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12">Parentesco</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<select class="form-control" id="parentescom" name="parentescom">
															<option value="Madre">Madre</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Correo <span class="required">*</span>
													</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<input type="text" id="correom" name="correom" required="required" class="form-control col-md-7 col-xs-12">
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3 col-sm-3 col-xs-12">Acudiente</label>
													<div class="col-md-6 col-sm-6 col-xs-12">
														<div id="gender" class="btn-group" data-toggle="buttons">
															<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
																<input type="radio" name="acudientem" value="Si"> &nbsp; Si &nbsp;
															</label>
															<label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
																<input type="radio" name="acudientem" value="NO" checked=""> No
															</label>
														</div>
													</div>
												</div>
												<div class="ln_solid"></div>


												
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- end of accordion -->


						</div>
					</div>
				</div>

			</div>
			<div class="ln_solid"></div>
			<div class="row text-right form-group">
				<button type="submit" class="btn btn-primary" onclick="history.back()">Volver</button>
				<button type="submit" class="btn btn-success">Registrar</button>
			</div>
		</div>
	</div>
	{!! Form::close() !!}

	@endsection


	@section('js2')

	<script type="text/javascript">


		$("#depa_expedicion").chosen({
			search_contains: true,
			no_results_text: 'No Se Encontraron Resultados',
			allow_single_deselect: true
		});

		$("#muni_expedicion").chosen({
			search_contains: true,
			no_results_text: 'No Se Encontraron Resultados',
			allow_single_deselect: true
		});

	</script>

	@endsection