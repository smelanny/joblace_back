<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulacion;
use App\Models\OfertaEmpleo;
use Illuminate\Support\Facades\Validator;

class PostulacionController extends Controller
{
    // Método para que un candidato se postule a una oferta
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:usuarios,id',
            'oferta_id' => 'required|exists:ofertas_empleo,id',
            'mensaje_adicional' => 'nullable|string|max:1000'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

         // Verificar si ya existe una postulacion
        $existe = Postulacion::where('user_id', $request->user_id)
            ->where('oferta_id', $request->oferta_id)
            ->exists();

        if ($existe) {
            return response()->json(['message' => 'Ya has postulado a esta oferta.'], 409);
        }

        $data = $request->only('user_id', 'oferta_id', 'mensaje_adicional');
        $data['fecha_postulacion'] = date('Y-m-d');
        $data['estado'] = 'pendiente';

        $postulacion = Postulacion::create($data);

        return response()->json(['message' => 'Postulación realizada con éxito', 'postulacion' => $postulacion], 201);
    }


    // Método para que representantes vean las postulaciones a ofertas de su empresa
    public function getByEmpresa($empresaId)
    {
        $ofertas = OfertaEmpleo::where('empresa_id', $empresaId)->pluck('id');

        $postulaciones = Postulacion::with(['usuario', 'oferta'])
            ->whereIn('oferta_id', $ofertas)
            ->get();

        return response()->json($postulaciones);
    }
}
