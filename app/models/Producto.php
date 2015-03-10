<?php
class Producto extends Eloquent  {

	protected $table = 'productos';

	public function categoria() 
    { 
        return $this->belongsTo('Categoria'); 
    }
    public function facturas() 
    { 
        return $this->belongsToMany('Factura');
    }

    public function factura_producto() 
    { 
        return $this->hasMany('FacturaProducto'); 
    }
}