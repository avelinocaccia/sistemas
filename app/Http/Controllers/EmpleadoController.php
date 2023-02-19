<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpleadoController extends Controller
{
  
    public function index()
    {
        //
        $data = Empleado::index();
        return response()->json($data);
    }

 
    public function create(Request $request)
    {
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'Apellido' => 'required',
            'Correo' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $empleado = Empleado::createNew(
            $request->input('nombre'),
            $request->input('Apellido'),
            $request->input('Correo'),
            $request->input('Foto')
        );

        return response()->json(['message' => 'empleado creado', 'empleado' => $empleado], 201);
    }

  
    public function indexIF(Request $request)
    {
        $data = Empleado::indexNameImage($request);
        return response()->json($data);
    }


    public function edit(Empleado $empleado)
    {
        //
    }

  
    public function update(Request $request, $id)
    {   
        $empleado = new Empleado;
        $empleado = Empleado::actualizar($id);
        $empleado->nombre = $request->nombre;
        $empleado->Apellido = $request->Apellido;
        $empleado->Correo = $request->Correo;
        $empleado->Foto = $request->Foto;
        $empleado->save();
        $data = [ 'message' => 'actualizado con éxito',
                  'client' => $empleado ,
                ];
        
    
        return response()->json($data, 200);

    }

    public function filter($Correo){
        $dataFiltrada = Empleado::filterByEmail($Correo);
        
        return response()->json($dataFiltrada)->header('content-type', 'application/json');
    
    }

    public function filterByName($name){
        $dataFiltrada = Empleado::getNames($name);
        if (count($dataFiltrada)>0) {
            
            return response()->json($dataFiltrada)->header('content-type', 'application/json');
        }else{
            return response()->json('el nombre no existe');
        
        }
    
    }
    
    public function destroy(Empleado $empleado)
    {
        //
    }
}
