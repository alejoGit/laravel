@extends('master')

@section('main')
    <div class="container-fluid">
    	
    	<div class="row-fluid">
    		<div class="span12"><h2>Detalle de Factura <span style="color:red">N°0000-{{$factura->id}}</span> <hr></h2></div>
    	</div>
   		<div class="row-fluid">
   			<div class="span6 offset3" style="box-shadow:0px 0px 2px #222;padding: 12px 20px">
   				 <h4>Factura a nombre de:</h4> {{$factura->cliente->nombre}}
           <hr>
           <h4>Fecha y hora de la compra:</h4> {{$factura->created_at}}
           <hr>
            
            <table class="table table-hover table-nomargin table-bordered">
              <thead >
                <tr >
                  <th style="background:#00ABA9!important; color:white;">Producto</th>
                  <th style="background:#00ABA9!important; color:white;">Cantidad</th>
                  <th style="background:#00ABA9!important; color:white;">Percio unidad</th>
                  <th style="background:#00ABA9!important; color:white;">Subtotal</th>
                </tr>
              </thead>
              <tbody>
                <h4>Detalle de la compra</h4>
                 @foreach($factura->facturaproducto as $fp)
                  <tr>
                    <td> {{$fp->producto->nombre}}</td>
                    <td> {{$fp->cantidad}}</td>
                    <td> {{$fp->producto->precio}}</td>
                    <td> {{$fp->producto->precio*$fp->cantidad}}</td>
                  </tr>
                
                 @endforeach
               
              </tbody>
            </table>
            <span style="float:right; border:1px solid #DDD;padding:5px;margin-top:-18px"><strong style="color:green">Total:</strong>  {{$factura->getTotal()}}</span>
   			  <br>
        </div>
        
        <br>   
        
   		</div>
    </div>
 
 <script>
 $(function(){
		$(".main-nav li").removeClass('active');
		$("#liFacturas").addClass('active');

 });
 </script>
 @stop
