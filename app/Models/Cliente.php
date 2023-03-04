<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $fillable = ['Nombre', 'Telefono', 'CorreoElectronico', 'Direccion', 'Ciudad', 'EstadoProvincia', 'Pais', 'CodigoPostal', 'FechaRegistro', 'FechaUltimaCompra', 'TotalGastado', 'Notas'];


    public static function index(){
        return Cliente::all();
    }
}
