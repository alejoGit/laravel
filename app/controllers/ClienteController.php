<?php

class ClienteController extends BaseController {

	public function getIndex()
	{
		$clientes = Cliente::all();
		return View::make('clientes.index')->with('clientes',$clientes);
	}

	public function postCrear()
	{
		$rules=array(
                'nombre'=>'required|max:50',  
                'cedula'=>'unique:clientes', 
                'email'=>'unique:clientes|email',           
                    
        );

        $validation = Validator::make(Input::all(),$rules);
        if($validation->fails()){
            return Redirect::back()->withInput()->withErrors($validation);
        }
        $cliente = new Cliente;
        $cliente->nombre = Input::get('nombre');
        $cliente->cedula = Input::get('cedula');
        $cliente->email = Input::get('email');
        $cliente->save();
		return Redirect::to('/cliente');
	}

	public function getEliminar($id)
	{
		$cli = Cliente::find($id);
		$cli->delete();
		return Redirect::to('/cliente');
	}

}