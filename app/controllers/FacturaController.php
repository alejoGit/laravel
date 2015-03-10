<?php

class FacturaController extends BaseController {

	public function getIndex()
	{
		$clientes = Cliente::all();
		$productos = Producto::all();
		return View::make('facturas.index')->with('clientes',$clientes)->with('productos',$productos);
	}

	public function postGenerar()
	{
		if(Request::ajax()){
			
			$arrItems = json_decode(Input::get('items'));
			$factura = new Factura;
			$factura->cliente_id = Input::get('cliente');
			$factura->save();
			foreach($arrItems as $item){
				$fp = new FacturaProducto;
				$fp->factura_id = $factura->id;
				$fp->producto_id = $item->producto;
				$fp->cantidad = $item->cantidad;
				$fp->save();
			}
			$url = "http://localhost:8000/factura/detalle/".$factura->id;
			$this->getEnviar($factura->cliente->nombre,$factura->cliente->email,$url);
			return "".$factura->id;
		}
		
	}

	public function getDetalle($id)
	{
		$factura = Factura::find($id);
		if($factura==null){
			return "No se encontro esta factura";
		}
		return View::make('facturas.detalle')->with('factura',$factura);
	}


	public function getEnviar($pCliente,$pEmail,$pUrl){
		$data = [ "cliente" => $pCliente,"email"=>$pEmail,"url"=>$pUrl];
		Mail::send('emails.template', $data, function($message) use ($pEmail)
		{
		    $message->to($pEmail, 'alejo')->subject('Factura Generada!');
		});
		return "se envio correctamente";
	}

	

}