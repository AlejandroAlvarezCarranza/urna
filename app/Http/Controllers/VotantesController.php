<?php

namespace App\Http\Controllers;

use App\Models\Votantes;
use Illuminate\Http\Request;

class VotantesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $votantess= Votantes::all();
        return response()->json($votantess);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre'=>'required|string|min:1|max:100',
            'apellido_pat'=>'required|string|min:1|max:100',
            'apellido_mat'=>'required|string|min:1|max:100',
            'email'=>'required|max:80',
            'telefono'=>'required|max:15'
        ];
        $validator= \Validator::make($request->input(),$rules);
        if($validator->fails()){
            return response()->json([
                'status=>false',
                'errors'=>$validator->errors()->all()
            ],400);
        }
        $votante = new Votantes($request->input());
        $votante->save();
        return response()->json([
            'status'=>true,
            'message'=>'Votante Creado Correctamente'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Votantes $votantes)
    {
        return response()->json(['status'=>true,'data'=>$votantes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Votantes $votantes)
    {
        $rules = [
            'nombre'=>'required|string|min:1|max:100',
            'apellido_pat'=>'required|string|min:1|max:100',
            'apellido_mat'=>'required|string|min:1|max:100',
            'email'=>'required|max:80',
            'telefono'=>'required|max:15'
        ];
        $validator= \Validator::make($request->input(),$rules);
        if($validator->fails()){
            return response()->json([
                'status=>false',
                'errors'=>$validator->errors()->all()
            ],400);
        }
        $votantes->update($request->input());
        return response()->json([
            'status'=>true,
            'message'=>'Votante Actualizado Correctamente'
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Votantes $votantes)
    {
        $votantes->delete();
        return response()->json([
            'status'=>true,
            'message'=>'Votante Eliminado Correctamente'
        ],200);
    }
}
