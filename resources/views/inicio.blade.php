@extends('template.principal')

@section('titulo', 'Inicio')

@section('js1')

<script type="text/javascript" src="http://www.google.com/jsapi?key=AIzaSyBoi-RhPgD-YKJ0PARg__XK-nNLZFmDcPs"></script>

<script type="text/javascript">

	$(document).ready(function() {

		//location.reload();

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
		/*var point = new GLatLng(4.332482,-74.368161);
		var marker = createMarker(point,'<div style="width:240px">Mi casa <\/div>')
		map.addOverlay(marker);
		
		var point = new GLatLng(4.3478905,-74.3672471);
		var marker = createMarker(point,'Estadio')
		map.addOverlay(marker);

		var point = new GLatLng(4.3478705,-74.3672451);
		var marker = createMarker(point,'Estadio')
		map.addOverlay(marker);

		var point = new GLatLng(4.3478505,-74.3672431);
		var marker = createMarker(point,'Estadio')
		map.addOverlay(marker);*/

		var datos;

		$.ajax({
			type:"GET",
			url: "/matriculas/public/instituciones",
			async: false//,
			//data: 'modulo='+modulo+'&tema='+tema+'&opc='+opc+'&division='+division
		}).done(function(data){
			//var s = JSON.parse(data);
			datos = data;
		});
		//console.table(datos);
		console.log(datos.length);
		
		for(i = 1; i <= datos.length; i++){
			var point = new GLatLng(datos[i]['latitud'],datos[i]['longitud']
				);

			var a = "";
			
			if(datos[0]['nombre'] != "Activa" || datos[0]['sede'] == "administrador"){
				a = '<a href="/matriculas/public/instituciones/'+datos[i]['id'] +'"> Mas Información </a>';
			}else{
				a = "Ya se encuentra registrado en un Colegio, por favor termine el proceso";
			}

			var marker = createMarker(point,'<div style="width:340px"><h2>'+ datos[i]['nombre'] +' </h2> <\/div> ' + a);
			map.addOverlay(marker);

		}

		
	}
	window.onload=function(){simple3();
	}

</script>

@endsection


@section('pagina', 'Mapa Fusagasugá')

@section('contenido')

<div class="clearfix"></div>

<div class="row">

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel" style="height:600px;">
			<div id="mapa" style="width:100%;height:100%;border:2px solid violet;">

			</div>
		</div>
	</div>
</div>


@endsection


@section('js2')

<script type="text/javascript">



</script>

@endsection