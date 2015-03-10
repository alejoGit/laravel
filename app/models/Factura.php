<?php
class Factura extends Eloquent  {

	protected $table = 'facturas';

	public function productos() 
    { 
        return $this->belongsToMany('Producto');
    }

    public function cliente() 
    { 
        return $this->belongsTo('Cliente'); 
    }

    public function facturaproducto() 
    { 
        return $this->hasMany('FacturaProducto'); 
    }

    public function getTotal(){
    	$sum = 0;
    	foreach($this->facturaproducto as $fp){
    		$sum+= $fp->producto->precio * $fp->cantidad;
    	}
    	return $sum;
    }
}