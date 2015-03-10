<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('home');
});

Route::controller("categoria","CategoriaController");
Route::controller("producto","ProductoController");
Route::controller("cliente","ClienteController");
Route::controller("factura","FacturaController");