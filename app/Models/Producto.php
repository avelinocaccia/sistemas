<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //PARA CREAR / MODIFICAR / ELIMINAR PRODUCTOS EN LA BASE DE DATOS SE DEBE TENER EL ROL DE ADMINISTRADOR O SUPERVISOR.



   protected $fillable = ['nombre', 'modelo','marca', 'anio', 'codigo_producto', 'descripcion', 'precio', 'existencias', 'imagen', 'categoria', 'subcategoria', 'aplicaciones'];
    
   public static function index(){
       return Producto::all();
   }

   public static function show($param){
        
        $data = Producto::select(['id','nombre', 'modelo', 'marca', 'anio', 'codigo_producto', 'descripcion', 'precio', 'existencias', 'imagen', 'categoria', 'subcategoria', 'aplicaciones'])
		->when($param['id'], function($query) use ($param){
			return  $query->where('id', $param['id']);
		  })
            ->when($param['categoria'], function($query) use ($param){
              return  $query->where('categoria', $param['categoria']);
            })
            ->when($param['subcategoria'], function($query) use ($param){
              return  $query->where('subcategoria', $param['subcategoria']);
            })
            ->when($param['marca'], function($query) use ($param){
              return  $query->where('marca', $param['marca']);
            })
            ->when($param['modelo'], function($query) use ($param){
              return  $query->where('modelo', $param['modelo']);
            })
            ->when($param['anio'], function($query) use ($param){
              return  $query->where('anio', $param['anio']);
            })
            ->when($param['codigo_producto'], function($query) use ($param){
              return  $query->where('codigo_producto', $param['codigo_producto']);
            })
            ->when($param['nombre'], function($query) use ($param){
              return  $query->where('nombre', $param['nombre']);
            })
            ->when($param['descripcion'], function($query) use ($param){
              return  $query->where('descripcion', $param['descripcion']);
            })
            ->when($param['precio'], function($query) use ($param){
              return  $query->where('precio', $param['precio']);
            })
            ->when($param['existencias'], function($query) use ($param){
              return  $query->where('existencias', $param['existencias']);
            })
            ->when($param['imagen'], function($query) use ($param){
              return  $query->where('imagen', $param['imagen']);
            })
            ->when($param['aplicaciones'], function($query) use ($param){
              return  $query->where('aplicaciones', $param['aplicaciones']);
            })
            ->Simplepaginate($param['limit'] ?? 0 ,$param['page'] ?? 0);
           

        return $data;
   }
   
   public static function store($nombre, $modelo, $marca, $anio,$codigo_producto, $descripcion, $precio, $existencias, $imagen, $categoria, $subcategoria, $aplicaciones){

        $product = Producto::create([
            'nombre' => $nombre,
            'modelo' => $modelo,
            'marca' => $marca,
            'anio' => $anio,
            'codigo_producto' => $codigo_producto,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'existencias' => $existencias,
            'imagen' => $imagen,
            'categoria' => $categoria,
            'subcategoria' => $subcategoria,
            'aplicaciones' => $aplicaciones
        ]);
        
        return $product;   
    }


    public static function actualizar($id){

		$ProductoActualizado = Producto::findOrFail($id);
		return $ProductoActualizado;

    }
        
    





}




