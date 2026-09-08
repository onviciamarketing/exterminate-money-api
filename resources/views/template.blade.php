@extends('layouts/app')
@section('meta')


<title>Aplicación web de monitoreo de terremotos</title> 

<link rel="canonical" href="{{env('APP_URL')}}" />

<meta name="description" content="Tienda Online Caracas / Venezuela,cartas tcg,tazos,albums, Ofertas, Promociones, Descuentos en tiendapokemon.store">

<title>jQuery UI Datepicker - Default functionality</title>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.2/themes/base/jquery-ui.css">
{{-- <link rel="stylesheet" href="/resources/demos/style.css"> --}}
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.2/jquery-ui.js"></script>

{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
crossorigin=""/>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> --}}
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>






@endsection 

@section('content')

 {{-- <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>  --}}


{{-- @if(!Auth::user())   
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>


@endif --}}

<style type="text/css">
	

	{{-- .custom-info {
		padding: 4px;
		/*padding-top:0px;*/
			/*padding-bottom:  30px;
			padding-left: 30px;*/
		}

		p{
			font-size: 18px;  
		} --}}


		
/*
	#mainContent div.FCKEditor {
		margin: 0 -14px 0 -6px;width: 
		}*/

	</style>
	
	@include('inc/navbar')
	


	<div class="row">

		<div class="col-12">

			{{-- @include('inc/categories') --}}

		</div>

	</div>
	<br>

	<div class="row subforum">

		<div class="container">

			<div class="card">

				<div class="card-body">

					<h1 class="display-4">Aplicación web de monitoreo de terremotos</h1>

				

					
					<hr>
					<br>
					<br>
					<br>
					<br>
					<br>
					{{-- <br>
					<br>
					<br>
					<br> --}}
					<hr>

					

					<div class="col-12">  
						<div id="mapid" style="width: 100%;height: 480px;box-shadow: 5px 5px 5px #888;"></div>
					</div>
					<hr>
					

					



  </div> 

<!-- end row -->



<br>

<!-- end row -->



<br>

</div>

</div>

</div>

</div>


@endsection 




