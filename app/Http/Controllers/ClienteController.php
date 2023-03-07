<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Cliente;
use Carbon\Carbon;




class ClienteController extends Controller
{

    

    public function index()
    {
        return Cliente::index();

    }

   


    public function create()
    {
        //
    }



    public function store(Request $request)
    {
        //
        
        
        $validator = Validator::make($request->all(), [
            'Nombre' => 'required',
            'Telefono' => 'required',
            'CorreoElectronico' => 'required|email',
            'Direccion' => 'required',
            'Ciudad' => 'required',
            'CodigoPostal' => 'required',
            'Pais' => 'required'
        ],[
            'Nombre.required' => 'El campo nombre es obligatorio .',
            'Telefono.required' => 'El campo teléfono es obligatorio.',
            'CorreoElectronico.required' => 'El campo correo electrónico es obligatorio.',
            'CorreoElectronico.email' => 'El campo correo electrónico debe ser una dirección de correo válida.',
            'Direccion.required' => 'El campo dirección es obligatorio.',
            'Ciudad.required' => 'El campo ciudad es obligatorio.',
            'CodigoPostal.required' => 'El campo código postal es obligatorio.',
            'Pais.required' => 'El campo país es obligatorio.'
        ]);
        
        
        
        $cliente = new Cliente;
        

        
        $cliente->Nombre = $request->Nombre;
        $cliente->Telefono = $request->Telefono;
        $cliente->CorreoElectronico = $request->CorreoElectronico;
        $cliente->Direccion = $request->Direccion;
        $cliente->Ciudad = $request->Ciudad;
        $cliente->EstadoProvincia = $request->EstadoProvincia;
        $cliente->Pais = $request->Pais;
        $cliente->CodigoPostal = $request->CodigoPostal;
        $cliente->FechaRegistro = Carbon::now()->format('Y-m-d H:i:s');
        //$cliente->FechaUltimaCompra = $request->FechaUltimaCompra;
        $cliente->TotalGastado = $request->TotalGastado;
        $cliente->Notas = $request->Notas;
     
        
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }else if($cliente->wasRecentlyCreated){
            return response()->json('el cliente ya existe');
        }else{
            $cliente->save();
        }
        
        return response()->json($cliente, 200);
        
    }



    public function show($id)
    {
        //
    }
    
   


    public function edit($id)
    {
        //
    }
    



    public function update(Request $request, $id)
    {
        //
    }




    public function destroy($id)
    {
        //
    }
}