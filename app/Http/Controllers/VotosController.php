<?php

namespace App\Http\Controllers;

use App\Models\Votos;
use Illuminate\Http\Request;

class VotosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $votos= Votos::all();
        return response()->json($votos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'idvotacion'=>'required',
            'valor_voto'=>'required|string|min:1|max:100',
        ];
        $validator= \Validator::make($request->input(),$rules);
        if($validator->fails()){
            return response()->json([
                'status=>false',
                'errors'=>$validator->errors()->all()
            ],400);
        }
        $voto = new Votos($request->input());
        $voto->save();
        return response()->json([
            'status'=>true,
            'message'=>'Voto Creado Correctamente'
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Votos $votos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Votos $votos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Votos $votos)
    {
        //
    }
}
