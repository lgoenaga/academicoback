<?php

namespace App\Http\Controllers;

use App\Models\Curso_Estudiante;
use Illuminate\Http\Request;

class Curso_EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Curso_Estudiante::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cur = Curso_Estudiante::find($id);
        if (isset($cur)) {
            return response()->json([
                'data' => $cur,
                'mensaje' => 'Encontrado',
            ]);
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => 'Información incorrecta',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cur = Curso_Estudiante::find($id);
        if (isset($cur)) {
            $cur->delete();
            return response()->json([
                'mensaje' => 'Eliminado',
            ]);
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => 'Información incorrecta',
            ]);
        }
    }
}
