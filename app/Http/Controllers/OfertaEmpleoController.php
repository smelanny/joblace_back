<?php

namespace App\Http\Controllers;

use App\Models\OfertaEmpleo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfertaEmpleoController extends Controller
{
    public function index()
    {
        return response()->json(OfertaEmpleo::with(['empresa', 'usuario', 'categorias'])->get());
    }

    public function show($id)
    {
        $oferta = OfertaEmpleo::with(['empresa', 'usuario', 'categorias'])->find($id);
        if (!$oferta) {
            return response()->json(['message' => 'Oferta no encontrada'], 404);
        }
        return response()->json($oferta);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'empresa_id' => 'required|exists:empresas,id',
            'user_id' => 'required|exists:usuarios,id',
            'titulo_puesto' => 'required|string|max:255',
            'descripcion_puesto' => 'required|string',
            'tipo_jornada' => 'required|in:tiempo_completo,medio_tiempo,freelance,practica',
            'ubicacion' => 'required|string',
            'salario_estimado' => 'required|numeric',
            'modalidad' => 'required|in:presencial,remoto,hibrido',
            'categorias' => 'required|array',
            'categorias.*' => 'exists:categorias,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        if (!isset($data['fecha_publicacion'])) {
            $data['fecha_publicacion'] = date('Y-m-d');
        }
        if (!isset($data['estado'])) {
            $data['estado'] = 'activa';
        }

        $categorias = $data['categorias'];
        unset($data['categorias']);

        $oferta = OfertaEmpleo::create($data);
        
        // Asociar categorías con la fecha actual
        $categoriasConFecha = collect($categorias)->mapWithKeys(function ($categoriaId) {
            return [$categoriaId => ['fecha_asociacion' => now()]];
        })->all();
        
        $oferta->categorias()->attach($categoriasConFecha);

        return response()->json([
            'message' => 'Oferta publicada exitosamente', 
            'oferta' => $oferta->load('categorias')
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $oferta = OfertaEmpleo::find($id);
        if (!$oferta) {
            return response()->json(['message' => 'Oferta no encontrada'], 404);
        }

        $validator = Validator::make($request->all(), [
            'titulo_puesto' => 'sometimes|required|string|max:255',
            'descripcion_puesto' => 'sometimes|required|string',
            'tipo_jornada' => 'sometimes|required|in:tiempo_completo,medio_tiempo,freelance,practica',
            'ubicacion' => 'sometimes|required|string',
            'salario_estimado' => 'sometimes|required|numeric',
            'fecha_publicacion' => 'sometimes|required|date',
            'estado' => 'sometimes|required|in:activa,cerrada,cancelada',
            'modalidad' => 'sometimes|required|in:presencial,remoto,hibrido',
            'categorias' => 'sometimes|required|array',
            'categorias.*' => 'exists:categorias,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        
        if (isset($data['categorias'])) {
            $categorias = $data['categorias'];
            unset($data['categorias']);
            
            // Actualizar categorías con la fecha actual
            $categoriasConFecha = collect($categorias)->mapWithKeys(function ($categoriaId) {
                return [$categoriaId => ['fecha_asociacion' => now()]];
            })->all();
            
            $oferta->categorias()->sync($categoriasConFecha);
        }

        $oferta->update($data);
        return response()->json([
            'message' => 'Oferta actualizada exitosamente', 
            'oferta' => $oferta->load('categorias')
        ]);
    }

    public function destroy($id)
    {
        $oferta = OfertaEmpleo::find($id);
        if (!$oferta) {
            return response()->json(['message' => 'Oferta no encontrada'], 404);
        }
        $oferta->delete();
        return response()->json(['message' => 'Oferta eliminada exitosamente']);
    }
} 