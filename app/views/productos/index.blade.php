@extends('master')

@section('main')
    <div class="container-fluid">
    	<div class="row-fluid">
    		<div class="span12"><h2>Administración de Productos</h2></div>
    	</div>
    	<div class="row-fluid">

    		<div class="span5">
    			<div class="box box-bordered box-color teal">
					<div class="box-title">
						<h3><i class="icon-plus-sign"></i>Crear Producto</h3>
					</div>
					<div class="box-content nopadding">
						<form action="producto/crear" method="POST" class="form-horizontal form-bordered" enctype="multipart/form-data">
							<div class="control-group">
								<label for="textfield" class="control-label">Seleccione la categoria del producto</label>
								<div class="controls">
									<select name="categoria" id="">
										@foreach ($categorias as $cat)
											<option value="{{$cat->id}}">{{$cat->nombre}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="control-group">
								<label for="textfield" class="control-label">Nombre del producto</label>
								<div class="controls">
									<input type="text" id="textfield" name="nombre" placeholder="Ingrese un nombre" class="input-xlarge" required>
								</div>
							</div>
							<div class="control-group">
								<label for="precio" class="control-label">Precio del producto</label>
								<div class="controls">
									<input type="number" id="precio" name="precio" placeholder="Ingrese un precio" min="0" class="input-xlarge" required>
								</div>
							</div>
							<div class="control-group">
	                            <label for="textfield" class="control-label">Imagen del producto</label>
	                            <div class="controls">
                                    <div class="fileupload fileupload-new" data-provides="fileupload"><input type="hidden">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"></div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                            <span class="btn btn-file"><span class="fileupload-new">Seleccione la imagen</span><span class="fileupload-exists">Cambiar</span><input type="file" name="imagen" required="required"></span>
                                            <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">eliminar</a>
                                        </div>
                                    </div>
	                            </div>
		                    </div>
							<div class="control-group">
								<label for="textarea" class="control-label">Descripción del producto</label>
								<div class="controls">
									<textarea name="descripcion" id="textarea" rows="5"  class="input-block-level" style="resize:none;"></textarea>
									
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-primary">Crear Producto</button>
							</div>
						</form>
					</div>
				</div>
    		</div>
    		<div class="span7">
    			<div class="box box-bordered box-color teal">
					<div class="box-title">
						<h3><i class="icon-th-list"></i>Listado de Productos</h3>
					</div>
					<div class="box-content nopadding">
						<table class="table table-hover table-nomargin table-bordered">
							<thead>
								<tr>
									<th>Imagen</th>
									<th>Nombre</th>
									<th class="hidden-768">Categoría</th>
									<th>Precio</th>
									<th class="hidden-768">Descripción</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								
								@foreach ($productos as $pro)
								<tr>
									<td><img src="imagenes/{{$pro->imagen}}" width="80px"></td>
									<td>{{$pro->nombre}}</td>
									<td class="hidden-768">{{$pro->categoria->nombre}}</td>
									<td>{{$pro->precio}}</td>
									<td class="hidden-768">{{$pro->descripcion}}</td>
									<td><a href="/producto/eliminar/{{$pro->id}}" class="btn btn-mino btn-red"> <i class="icon-remove"></i></a></td>
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
 	$("#liProductos").addClass('active');
 </script>
 @stop
