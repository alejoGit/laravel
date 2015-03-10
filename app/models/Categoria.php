<?php
class Categoria extends Eloquent  {

	protected $table = 'categorias';

	public function productos() 
    { 
        return $this->hasMany('Producto'); 
    }

}