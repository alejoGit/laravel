<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Proyecto Electiva 1</title>
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style__not-minified.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themes.css') }}">
	
	

	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
	
	<script src="{{ asset('assets/js/plugins/fileupload/bootstrap-fileupload.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/mockjax/jquery.mockjax.js') }}"></script>

    <!--<script src="{{ asset('assets/js/application.js') }}"></script>
    <script src="{{ asset('assets/js/eakroko.js') }}"></script>-->
	
    <style>
    .cantidadFac{
		width: 50px;
    }
	.ctnCargando{
		position:  absolute;
		width:  100%;
		height: 100%;
		top:0;
		background: rgba(0,0,0,0.9);
		background-image: url("{{ asset('assets/img/loading3.gif')}}");
		background-repeat: no-repeat;
		background-position: center;
		background-size: 15%;
		display: none;
	}
    </style>       
</head>
<body class="theme-teal">
	
	<div id="navigation" >
		<div class="container-fluid">
			<a href="#" id="brand">Electiva I</a>
			
			<ul class='main-nav'>
				<li class='active'>
					<a href="/">
						<span><i class="icon-home"></i>&nbsp;Home</span>
					</a>
				</li>
				
				<li id="liCategorias">
					<a href="/categoria" >
						<span><i class="icon-list"></i> Categorías</span>
					</a>
				</li>
				<li id="liProductos">
					<a href="/producto">
						<span><i class="icon-tablet"></i> Productos</span>
					</a>
				</li>

				<li id="liClientes">
					<a href="/cliente">
						<span><i class="glyphicon-group"></i>Clientes</span>
					</a>
				</li>

				<li id="liFacturas">
					<a href="/factura">
						<span><i class="icon-money"></i> Facturas</span>
					</a>
				</li>
				
			</ul>
			<div class="user">
			
				<div class="dropdown">
					<a href="#" class='dropdown-toggle' data-toggle="dropdown">John Doe 
				    <img src="{{ asset('assets/img/demo/user.png')}}" alt=""></a>
					<ul class="dropdown-menu pull-right">
						<li>
							<a href="more-userprofile.html">Edit profile</a>
						</li>
						<li>
							<a href="#">Account settings</a>
						</li>
						<li>
							<a href="more-login.html">Sign out</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	 @section('main')
     
     @show
	
	
</body>
</html>