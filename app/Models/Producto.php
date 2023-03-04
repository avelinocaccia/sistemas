<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
   protected $fillable = ['nombre', 'modelo','marca', 'anio', 'codigo_producto', 'descripcion', 'precio', 'existencias', 'imagen', 'categoria', 'subcategoria', 'aplicaciones'];
    
   
   
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
}




