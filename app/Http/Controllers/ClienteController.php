<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Cliente;

class ClienteController extends Controller
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
    public function store(Request $request)
    {
        //

        
        $validator = Validator::make($request, [
            'Name' => 'required',
            'Telefono' => 'required',
            'CorreoElectronico' => 'required|email',
            'Direccion' => 'required',
            'Ciudad' => 'required',
            'CodigoPostal' => 'required',
            'Pais' => 'required'
        ]);

        $cliente = new Cliente;

        $cliente->Name = $request->Name;
        $cliente->Telefono = $request->Telefono;
        $cliente->CorreoElectronico = $request->CorreoElectronico;
        $cliente->Direccion = $request->Direccion;
        $cliente->Ciudad = $request->Ciudad;
        $cliente->EstadoProvincia = $request->EstadoProvincia;
        $cliente->Pais = $request->Pais;
        $cliente->CodigoPostal = $request->CodigoPostal;
        $cliente->FechaRegistro = $request->FechaRegistro;
        $cliente->FechaUltimaCompra = $request->FechaUltimaCompra;
        $cliente->TotalGastado = $request->TotalGastado;
        $cliente->Notas = $request->Notas;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
