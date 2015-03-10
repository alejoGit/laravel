<?php

class ProductoController extends BaseController {

	public function getIndex()
	{
		$productos = Producto::all();
		$categorias = Categoria::all();
		return View::make('productos.index')->with('productos',$productos)->with('categorias',$categorias);
	}

	public function postCrear()
	{
		$rules=array(
                'nombre'=>'required|max:50|unique:categorias',  
                'precio'=>'required',  
                'descripcion'=>'max:300',           
                    
        );

        $validation = Validator::make(Input::all(),$rules);
        if($validation->fails()){
            return Redirect::back()->withInput()->withErrors($validation);
        }

        $producto = new Producto;
        $imagen   = Input::file('imagen');
        $ext_imagen =  $imagen->guessClientExtension();

      	
        $producto->categoria_id = Input::get('categoria');
        $producto->nombre = Input::get('nombre');
        $producto->precio = Input::get('precio');
        $producto->descripcion = Input::get('descripcion');
        $producto->save();
        $producto->imagen = "PRO-".$producto->id.".".$ext_imagen;
        $producto->save();
        $imagen->move("public/imagenes",$producto->imagen);
		return Redirect::to('/producto');
	}

	public function getEliminar($id)
	{
		$pro = Producto::find($id);
		File::delete(public_path().'/imagenes/'.$pro->imagen);
		$pro->delete();

		return Redirect::to('/categoria');
	}

}