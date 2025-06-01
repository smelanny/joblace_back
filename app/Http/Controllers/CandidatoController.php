<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class CandidatoController extends Controller
{
    /**
     * Lista todos los candidatos con su usuario
     */
    public function index()
    {
        $candidatos = Candidato::with('usuario')->get();
        return response()->json($candidatos);
    }

    /**
     * Muestra un candidato específico por ID de usuario
     */
    public function show($userId)
    {
        $candidato = Candidato::with('usuario')->where('user_id', $userId)->first();

        if (!$candidato) {
            return response()->json(['message' => 'Candidato no encontrado'], 404);
        }

        return response()->json($candidato);
    }

    /**
     * Crea un nuevo candidato
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:usuarios,id',
            'titulo_profesional' => 'required|string|max:255',
            'resumen_perfil' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Verifica que no exista un candidato para el usuario
        if (Candidato::where('user_id', $request->user_id)->exists()) {
            return response()->json([
                'message' => 'Este usuario ya es un candidato registrado'
            ], 422);
        }

        $candidato = Candidato::create($request->all());

        return response()->json([
            'message' => 'Candidato creado exitosamente',
            'candidato' => $candidato
        ], 201);
    }

    /**
     * Actualiza un candidato existente
     */
    public function update(Request $request, $userId)
    {
        $candidato = Candidato::where('user_id', $userId)->first();

        if (!$candidato) {
            return response()->json(['message' => 'Candidato no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'titulo_profesional' => 'sometimes|required|string|max:255',
            'resumen_perfil' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $candidato->update($request->all());

        return response()->json([
            'message' => 'Candidato actualizado exitosamente',
            'candidato' => $candidato
        ]);
    }

    /**
     * Elimina un candidato
     */
    public function destroy($userId)
    {
        $candidato = Candidato::where('user_id', $userId)->first();

        if (!$candidato) {
            return response()->json(['message' => 'Candidato no encontrado'], 404);
        }

        $candidato->delete();

        return response()->json(['message' => 'Candidato eliminado exitosamente']);
    }
}

