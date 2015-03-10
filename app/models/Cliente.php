<?php
class Cliente extends Eloquent  {

	protected $table = 'clientes';
	public function facturas() 
    { 
        return $this->hasMany('Factura'); 
    }
}