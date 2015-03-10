@extends('master')

@section('main')
    <div class="container-fluid">
    	<div class="row-fluid">
    		<div class="span12"><h2>Administración de Categorías</h2></div>
    	</div>
    	<div class="row-fluid">

    		<div class="span6">
    			<div class="box box-bordered box-color teal">
					<div class="box-title">
						<h3><i class="icon-plus-sign"></i>Crear Categoría</h3>
					</div>
					<div class="box-content nopadding">
						<form action="categoria/crear" method="POST" class="form-horizontal form-bordered">
							<div class="control-group">
								<label for="textfield" class="control-label">Nombre</label>
								<div class="controls">
									<input type="text" id="textfield" name="nombre" placeholder="Ingrese un nombre" class="input-xlarge">
								</div>
							</div>
							<div class="control-group">
								<label for="textarea" class="control-label">Descripción</label>
								<div class="controls">
									<textarea name="descripcion" id="textarea" rows="5"  class="input-block-level" style="resize:none;"></textarea>
									
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Crear Categoría</button>
							</div>
						</form>
					</div>
				</div>
    		</div>
    		<div class="span6">
    			<div class="box box-bordered box-color teal">
					<div class="box-title">
						<h3><i class="icon-th-list"></i>Listado de Categorías</h3>
					</div>
					<div class="box-content nopadding">
						<table class="table table-hover table-nomargin table-bordered">
							<thead>
								<tr>
									<th>Nombre</th>
									<th class="hidden-350">Descripción</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								
								@foreach ($categorias as $cat)
								<tr>
									<td>{{$cat->nombre}}</td>
									<td class="hidden-350">{{$cat->descripcion}}</td>
									<td><a href="/categoria/eliminar/{{$cat->id}}" class="btn btn-mino btn-red">Eliminar <i class="icon-remove"></i></a></td>
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
 	$("#liCategorias").addClass('active');
 </script>
 @stop
