<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    //
    protected $fillable = ['nombre', 'Apellido', 'Correo', 'Foto'];


    public static function index (){
        $data = Empleado::all();
        return $data;
    }

    
    

    public static function createNew($nombre, $Apellido, $Correo, $Foto)
    {
        return static::create([
            'nombre' => $nombre,
            'Apellido' => $Apellido,
            'Correo' => $Correo,
            'Foto' => $Foto
        ]);
    }

    
    public static function actualizar($id){

        $data = Empleado::find($id);
        return $data;    
    
    }

    public static function filterByEmail($Correo){
        $data = Empleado::where('Correo', 'LIKE', '%'.$Correo.'%')->get();
        return $data;   
    }

    public static function getNames($name){
        $data = Empleado::where('nombre' , '=' , $name)->get();
        return $data;   
    }

    public static function indexNameImage($request){

        //RETORNA EL/LOS REGISTRO CON EL CUAL HAYA MATCHEADO LO QUE SE LE ENVIO POR REQUEST
        
        return Empleado::selectRaw("nombre, Foto")
        ->where('nombre', $request['nombre'])
        ->where('Foto', $request['Foto'])
        ->get();


        // RETORNA SOLO LAS COLUMNAS SELECIONADAS

        // return Empleado::selectRaw("nombre, Foto")
        //     ->when($request['nombre'], function ($query,  $value) {
        //         return $query->where('nombre', $value);
        //     })
        //     ->when($request['Foto'], function ($query,  $value) {
        //         return $query->where('Foto', $value);
        //     })
        //     ->get();
    }
    


    public static function filtroFind($request){
        return Empleado::find($request->id);
    } 

    public static function filtroWhere($apellido){
        $apellido = urldecode($apellido);
        $data = Empleado::where('Apellido', $apellido)->first();
        return $data;
    }












}



    












