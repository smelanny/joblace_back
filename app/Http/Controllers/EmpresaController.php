<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpresaController extends Controller
{
    /**
     * Obtiene todas las empresas
     */
    public function index()
    {
        $empresas = Empresa::all();
        return response()->json($empresas);
    }

    /**
     * Obtiene una empresa específica
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);
        if (!$empresa) {
            return response()->json(['message' => 'Empresa no encontrada'], 404);
        }
        return response()->json($empresa);
    }

    /**
     * Crea una nueva empresa
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'industria' => 'required|string|max:255',
            'sitio_web' => 'nullable|url|max:255',
            'logo_url' => 'nullable|url|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $empresa = Empresa::create($request->all());
        return response()->json([
            'message' => 'Empresa creada exitosamente',
            'empresa' => $empresa
        ], 201);
    }

    /**
     * Actualiza una empresa existente
     */
    public function update(Request $request, $id)
    {
        $empresa = Empresa::find($id);
        if (!$empresa) {
            return response()->json(['message' => 'Empresa no encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string',
            'industria' => 'sometimes|required|string|max:255',
            'sitio_web' => 'nullable|url|max:255',
            'logo_url' => 'nullable|url|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $empresa->update($request->all());
        return response()->json([
            'message' => 'Empresa actualizada exitosamente',
            'empresa' => $empresa
        ]);
    }

    /**
     * Elimina una empresa
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id);
        if (!$empresa) {
            return response()->json(['message' => 'Empresa no encontrada'], 404);
        }

        $empresa->delete();
        return response()->json(['message' => 'Empresa eliminada exitosamente']);
    }
} 