<?php

class CategoriaController extends BaseController {

	public function getIndex()
	{
		$categorias = Categoria::all();
		return View::make('categorias.index')->with('categorias',$categorias);
	}

	public function postCrear()
	{
		$rules=array(
                'nombre'=>'required|max:50|unique:categorias',  
                'descripcion'=>'max:300',           
                    
        );

        $validation = Validator::make(Input::all(),$rules);
        if($validation->fails()){
            return Redirect::back()->withInput()->withErrors($validation);
        }
        $categoria = new Categoria;
        $categoria->nombre = Input::get('nombre');
        $categoria->descripcion = Input::get('descripcion');
        $categoria->save();
		return Redirect::to('/categoria');
	}

	public function getEliminar($id)
	{
		$cat = Categoria::find($id);
		$cat->delete();
		return Redirect::to('/categoria');
	}

}