<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class EmpleadoController extends Controller
{
  
    public function index(Request $request)
    {
        //
        $limit = $request->query('limit',10);
        $data = Empleado::Simplepaginate($limit);
        // $data = Empleado::paginate($limit);

        return response()->json($data);
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

        if($request->hasFile('Foto')){
            $nombreArchivoOriginal=$request->file('Foto')->getClientOriginalName(); //obtiene el nombre original del archivo qeu nos estan enviando
            $nuevoNombre = Carbon::now()->timestamp."_".$nombreArchivoOriginal; // le asigno un nuevo nombre con un identificador unico qeu es el metodo now.
            $carpetaDestino='./upload/'; //indico la carpeta de destino donde se va a subir el archivo
            $request->file('Foto')->move($carpetaDestino, $nuevoNombre); //muevo el archivo a la carpeta de destino con el nuevo nombre
           
            //campo de la tabla = informacion recibida por postman
           

             $empleado = Empleado::createNew(
            $request->input('nombre'),
            $request->input('Apellido'),
            $request->input('Correo'),
            ltrim($carpetaDestino,'.').$nuevoNombre
            );
        }

       

        return response()->json(['message' => 'empleado creado', 'empleado' => $empleado], 201);
    }

  
    public function indexIF(Request $request)
    {
        $data = Empleado::indexNameImage($request);
        return response()->json($data);
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
