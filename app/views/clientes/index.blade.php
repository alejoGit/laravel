@extends('master')

@section('main')
    <div class="container-fluid">
    	<div class="row-fluid">
    		<div class="span12"><h2>Administración de Clientes</h2></div>
    	</div>
    	<div class="row-fluid">

    		<div class="span6">
    			<div class="box box-bordered box-color teal">
					<div class="box-title">
						<h3><i class="icon-plus-sign"></i>Crear Cliente</h3>
					</div>
					<div class="box-content nopadding">
						<form action="cliente/crear" method="POST" class="form-horizontal form-bordered">
							<div class="control-group">
								<label for="textfield" class="control-label">Nombre del cliente</label>
								<div class="controls">
									<input type="text" id="textfield" name="nombre" placeholder="Ingrese un nombre" class="input-xlarge" required>
								</div>
							</div>
							<div class="control-group">
								<label for="cedula" class="control-label">Cedula del cliente</label>
								<div class="controls">
									<input type="number" id="cedula" name="cedula" placeholder="Ingrese una cedula" class="input-xlarge" required>
								</div>
							</div>
							<div class="control-group">
								<label for="email" class="control-label">Email del cliente</label>
								<div class="controls">
									<input type="email" id="email" name="email" placeholder="Ingrese un email" class="input-xlarge" required>
								</div>
							</div>

							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Crear Cliente</button>
							</div>
						</form>
					</div>
				</div>
    		</div>
    		<div class="span6">
    			<div class="box box-bordered box-color teal">
					<div class="box-title">
						<h3><i class="icon-th-list"></i>Listado de Clientes</h3>
					</div>
					<div class="box-content nopadding">
						<table class="table table-hover table-nomargin table-bordered">
							<thead>
								<tr>
									<th>Nombre</th>
									<th class="hidden-768">Cedula</th>
									<th class="hidden-768">Email</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								
								@foreach ($clientes as $cli)
								<tr>
									<td>{{$cli->nombre}}</td>
									<td class="hidden-768">{{$cli->cedula}}</td>
									<td class="hidden-768">{{$cli->email}}</td>
									<td><a href="/cliente/eliminar/{{$cli->id}}" class="btn btn-mino btn-red">Eliminar <i class="icon-remove"></i></a></td>
								</tr>
								@endforeach
								
							</tbody>
						</table>
					</div>
				</div>
    		</div>
    	</div>
    </div>
 
 <script>
 	$(".main-nav li").removeClass('active');
 	$("#liClientes").addClass('active');
 </script>
 @stop
