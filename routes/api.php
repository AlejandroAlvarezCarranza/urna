<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VotacionesController;
use App\Http\Controllers\VotantesController;
use App\Http\Controllers\VotosController;
use App\Models\Votaciones;
use App\Models\Votantes;
use App\Models\Votos;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('votantes',VotantesController::class);
Route::resource('votaciones',VotacionesController::class);
Route::resource('votos',VotosController::class);
Route::get('votaciones/select/{id}',function(Request $request,$id){
    return Votaciones::findOrFail($id);
});
Route::delete('votaciones/select/{id}', function ($id) {
    $votaciones=Votaciones::findOrFail($id);
    $votaciones->delete();
    return response()->json([
        'status'=>true,
        'message'=>'Votación Eliminado Correctamente'
    ],200);
});
Route::put('votaciones/select/{id}', function (Request $request, $id) {
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
    $votaciones=Votaciones::findOrFail($id);
    $votaciones->update($request->input());
    return response()->json([
        'status'=>true,
        'message'=>'Votación actualizada Correctamente'
    ],200);
});

//Votantes
Route::get('votantes/select/{id}',function(Request $request,$id){
    return Votantes::findOrFail($id);
});
Route::delete('votantes/select/{id}', function ($id) {
    $votante=Votantes::findOrFail($id);
    $votante->delete();
    return response()->json([
        'status'=>true,
        'message'=>'Votante Eliminado Correctamente'
    ],200);
});
Route::put('votantes/select/{id}', function (Request $request, $id) {
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
    $votante=Votantes::findOrFail($id);
    $votante->update($request->input());
    return response()->json([
        'status'=>true,
        'message'=>'Votante Actualizado Correctamente'
    ],200);
});

//votos
Route::get('votos/select/{id}',function(Request $request,$id){
    return Votos::findOrFail($id);
});
Route::delete('votos/select/{id}', function ($id) {
    $voto=Votos::findOrFail($id);
    $voto->delete();
    return response()->json([
        'status'=>true,
        'message'=>'Voto Eliminado Correctamente'
    ],200);
});
Route::put('votos/select/{id}', function (Request $request, $id) {
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
    $voto=Votos::findOrFail($id);
    $voto->update($request->input());
    return response()->json([
        'status'=>true,
        'message'=>'Voto Actualizado Correctamente'
    ],200);
});
