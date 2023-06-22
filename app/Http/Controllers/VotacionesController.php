<?php

namespace App\Http\Controllers;

use App\Models\Votaciones;
use Illuminate\Http\Request;

class VotacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $votacioness= Votaciones::all();
        return response()->json($votacioness);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre_votacion'=>'required|string|min:1|max:100',
            'fecha_inicio'=>'required|string|min:1|max:100',
            'fecha_termino'=>'required|string|min:1|max:100'
        ];
        $validator= \Validator::make($request->input(),$rules);
        if($validator->fails()){
            return response()->json([
                'status=>false',
                'errors'=>$validator->errors()->all()
            ],400);
        }
        $votacion = new Votaciones($request->input());
        $votacion->save();
        return response()->json([
            'status'=>true,
            'message'=>'Votacion Creada Correctamente'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Votaciones $votaciones)
    {
        return response()->json(['status' => true,'data' => $votaciones]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Votaciones $votaciones)
    {
        $rules = [
            'nombre_votacion'=>'required|string|min:1|max:100',
            'fecha_inicio'=>'required|string|min:1|max:100',
            'fecha_termino'=>'required|string|min:1|max:100'
        ];
        $validator= \Validator::make($request->input(),$rules);
        if($validator->fails()){
            return response()->json([
                'status=>false',
                'errors'=>$validator->errors()->all()
            ],400);
        }
        $votaciones->update($request->input());
        return response()->json([
            'status'=>true,
            'message'=>'Votación Actualizado Correctamente'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Votaciones $votaciones)
    {
        $votaciones->delete();
        return response()->json([
            'status'=>true,
            'message'=>'Votación Eliminado Correctamente'
        ],200);
    }
}
