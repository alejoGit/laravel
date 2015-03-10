@extends('master')

@section('main')
    <div class="container-fluid">
    	<div class="row-fluid">
    		<div class="span12" style="text-align:center;"><h2>Administración de Facturas</h2></div>
    	</div>
    	<div class="row-fluid">

    		<div class="span8 offset2">
    			<div class="box box-bordered box-color teal">
					<div class="box-title">
						<h3><i class="icon-list"></i>Generar factura</h3>
					</div>
					<div class="box-content nopadding">
						<form action="categoria/crear" method="POST" class="form-horizontal form-bordered">
							<div class="control-group">
								<label for="textfield" class="control-label">Seleccione el cliente</label>
								<div class="controls">
									<select name="cliente" id="selectClienteFac" class="input-block-level">
										@foreach($clientes as $cli)
											<option value="{{$cli->id}}">
												{{$cli->nombre}} - {{$cli->cedula}}
											</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="control-group">
								<label for="textarea" class="control-label">Items</label>
								<div class="controls">
									<div class="ctnItemsFactura">
										<div class="itemFactura">
											Producto: 
											<select name="producto" class="selectItem" id="">
												@foreach($productos as $pro)
													<option value="{{$pro->id}}">{{$pro->nombre}}</option>
												@endforeach
											</select>
											 &nbsp;Cantidad&nbsp;&nbsp;
											<input type="number" min="1" value="1" class="cantidadFac">
										</div>
									</div>
									<hr>
									<button class="btn btn-orange " id="addItem" style="float:right;">  Agregar item <i class="icon-plus-sign"></i></button>
								</div>
							</div>
							<div class="form-actions">
								<button type="submit" id="generarFactura" class="btn btn-primary">Generar Factura</button>
							</div>
						</form>
					</div>
				</div>
    		</div>
    	
    	</div>
    </div>
 	<div class="ctnCargando"></div>
 <script>
 $(function(){
		$(".main-nav li").removeClass('active');
		$("#liFacturas").addClass('active');

		$("#addItem").on("click",function(e){
			e.preventDefault();
			$(".ctnItemsFactura").append('<hr><div class="itemFactura">'
										+'Producto:&nbsp;' 
										+'<select name="pro1" id="" class="selectItem">'
										+$(".selectItem").html()
										+'</select>'
										+'&nbsp;&nbsp;&nbsp;Cantidad&nbsp;&nbsp;&nbsp;'
										+'<input type="number" min="1" value="1" class="cantidadFac">'
										+'</div>');

		});
 	
		$("#generarFactura").on("click",function(e){
			e.preventDefault();
			var i = 0;
			var arrAux = [];
			var arrItems =$( ".ctnItemsFactura" ).find(".itemFactura");
			var idCliente = $("#selectClienteFac").val();

			for(var i = 0; i<arrItems.length; i++){
				var productoAux = $(arrItems[i]).find(".selectItem").val();
				var cantidadAux = $(arrItems[i]).find(".cantidadFac").val();
				arrAux.push({"producto":productoAux,"cantidad":cantidadAux})
			}

			var jsonItemsFactura = JSON.stringify(arrAux);
			console.log(jsonItemsFactura)			
			$(".ctnCargando").css("display","block");
			$.ajax({
			  type: "POST",
			  url: "/factura/generar",
			  success: callbackPostGenFac,
			  error:   callbackError,
			  data : {'cliente': idCliente,'items':jsonItemsFactura}
			});

		});

		function callbackPostGenFac (data){
			$(".ctnCargando").css("display","none");
			alert("Se genero la factura correctamente");
			window.location.href = "/factura/detalle/"+data;
		}
		function callbackError (e){
			alert("error");
			 $(".ctnCargando").css("display","none");
		}
 });
 </script>
 @stop
