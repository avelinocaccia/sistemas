<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    //

    public static function index (){
        $data = Empleado::all();
        return $data;
    }

  

    protected $fillable = ['nombre', 'Apellido', 'Correo', 'Foto'];

    public static function createNew($nombre, $Apellido, $Correo, $Foto)
    {
        return static::create([
            'nombre' => $nombre,
            'Apellido' => $Apellido,
            'Correo' => $Correo,
            'Foto' => $Foto
        ]);
    }
       
    }



    












