<?php

namespace App\Http\Controllers;

use App\Models\RepresentanteEmpresa;
use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class RepresentanteEmpresaController extends Controller
{
    /**
     * Obtiene todos los representantes
     */
    public function index()
    {
        $representantes = RepresentanteEmpresa::with(['empresa', 'usuario'])->get();
        return response()->json($representantes);
    }

    /**
     * Obtiene un representante específico
     */
    public function show($userId, $empresaId)
    {
        $representante = RepresentanteEmpresa::with(['empresa', 'usuario'])
            ->where('user_id', $userId)
            ->where('empresa_id', $empresaId)
            ->first();
            
        if (!$representante) {
            return response()->json(['message' => 'Representante no encontrado'], 404);
        }
        return response()->json($representante);
    }

    /**
     * Crea un nuevo representante
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'empresa_id' => 'required|exists:empresas,id',
            'user_id' => 'required|exists:usuarios,id',
            'cargo' => 'required|string|max:255',
            'telefono_contacto' => 'required|string|max:20'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Verificar si ya existe un representante para este usuario y empresa
        $existente = RepresentanteEmpresa::where('user_id', $request->user_id)
            ->where('empresa_id', $request->empresa_id)
            ->first();

        if ($existente) {
            return response()->json([
                'message' => 'Este usuario ya es representante de esta empresa'
            ], 422);
        }

        $representante = RepresentanteEmpresa::create($request->all());
        return response()->json([
            'message' => 'Representante creado exitosamente',
            'representante' => $representante
        ], 201);
    }

    /**
     * Actualiza un representante existente
     */
    public function update(Request $request, $userId, $empresaId)
    {
        $representante = RepresentanteEmpresa::where('user_id', $userId)
            ->where('empresa_id', $empresaId)
            ->first();
            
        if (!$representante) {
            return response()->json(['message' => 'Representante no encontrado'], 404);
        }

        $validator = Validator::make($request->all(), [
            'cargo' => 'sometimes|required|string|max:255',
            'telefono_contacto' => 'sometimes|required|string|max:20'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $representante->update($request->all());
        return response()->json([
            'message' => 'Representante actualizado exitosamente',
            'representante' => $representante
        ]);
    }

    /**
     * Elimina un representante
     */
    public function destroy($userId, $empresaId)
    {
        $representante = RepresentanteEmpresa::where('user_id', $userId)
            ->where('empresa_id', $empresaId)
            ->first();
            
        if (!$representante) {
            return response()->json(['message' => 'Representante no encontrado'], 404);
        }

        $representante->delete();
        return response()->json(['message' => 'Representante eliminado exitosamente']);
    }

    /**
     * Obtiene los representantes de una empresa específica
     */
    public function getByEmpresa($empresaId)
    {
        $representantes = RepresentanteEmpresa::with(['usuario'])
            ->where('empresa_id', $empresaId)
            ->get();
        return response()->json($representantes);
    }

    /**
     * Obtiene las empresas de un representante específico
     */
    public function getByUsuario($userId)
    {
        try {
            Log::info('Buscando representaciones para usuario: ' . $userId);
            
            // Verificar si el usuario existe
            $usuario = Usuario::find($userId);
            if (!$usuario) {
                Log::warning('Usuario no encontrado: ' . $userId);
                return response()->json(['message' => 'Usuario no encontrado'], 404);
            }

            // Hacer una consulta directa para verificar
            $representaciones = DB::table('representantes_empresa')
                ->where('user_id', $userId)
                ->get();
            
            Log::info('Representaciones encontradas (consulta directa): ' . $representaciones->count());
            
            if ($representaciones->isEmpty()) {
                return response()->json([], 200);
            }

            // Si hay datos, cargar las relaciones
            $representaciones = RepresentanteEmpresa::with(['empresa'])
                ->where('user_id', $userId)
                ->get();
            
            return response()->json($representaciones);
        } catch (\Exception $e) {
            Log::error('Error al obtener representaciones: ' . $e->getMessage());
            Log::error($e->getTraceAsString());
            return response()->json([
                'message' => 'Error al obtener representaciones',
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ], 500);
        }
    }
} 