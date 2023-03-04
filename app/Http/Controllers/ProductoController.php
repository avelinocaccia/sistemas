<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'nombre' => 'required',
            'modelo' => 'required',
            'marca' => 'required',
            'anio' => 'required',
            'codigo_producto' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'existencias' => 'required',
            'imagen' => 'required',
            'categoria' => 'required',
            'subcategoria' => 'required',
            'aplicaciones' => 'required'
        ],[
            'nombre.required' => 'El campo nombre es obligatorio .',
            'modelo.required' => 'El campo modelo es obligatorio.',
            'marca.required' => 'El campo marca es obligatorio.',
            'anio.required' => 'El campo año es obligatorio.',
            'codigo_producto.required' => 'El campo código de producto es obligatorio.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'precio.required' => 'El campo precio es obligatorio.',
            'existencias.required' => 'El campo existencias es obligatorio.',
            'imagen.required' => 'El campo imagen es obligatorio.',
            'categoria.required' => 'El campo categoría es obligatorio.',
            'subcategoria.required' => 'El campo subcategoría es obligatorio.',
            'aplicaciones.required' => 'El campo aplicaciones es obligatorio.'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $nombre = $req->input('nombre');
        $modelo = $req->input('modelo');
        $marca = $req->input('marca');
        $anio = $req->input('anio');
        $codigo_producto = $req->input('codigo_producto');
        $descripcion = $req->input('descripcion');
        $precio = $req->input('precio');
        $existencias = $req->input('existencias');
        $imagen = $req->input('imagen');
        $categoria = $req->input('categoria');
        $subcategoria = $req->input('subcategoria');
        $aplicaciones = $req->input('aplicaciones');



        $product = Producto::store($nombre, $modelo,$marca, $anio,$codigo_producto, $descripcion, $precio, $existencias, $imagen, $categoria, $subcategoria, $aplicaciones);

        $product->save();

        return response()->json(['success' => 'Producto creado correctamente', 'Producto' => $product], 200);
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
