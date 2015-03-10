<?php
class FacturaProducto extends Eloquent  {

	protected $table = 'factura_producto';

	public function factura() 
    { 
        return $this->belongsTo('Factura'); 
    }
    public function producto() 
    { 
        return $this->belongsTo('Producto'); 
    }
}