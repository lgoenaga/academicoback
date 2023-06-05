<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Curso::all();
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
        $inputs = $request->input();
        $res = Curso::create($inputs);
        if (isset($res)) {
            return response()->json([
                'data' => $res,
                'mensaje' => 'Curso guardado',
            ]);
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => 'Curso fallido',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cur = Curso::find($id);
        if (isset($cur)) {
            return response()->json([
                'data' => $cur,
                'mensaje' => 'Curso encontrado',
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
        $cur = Curso::find($id);


        if (isset($cur)) {
            $cur->name = $request->name;
            if ($cur->save()) {
                return response()->json([
                    'data' => $cur,
                    'mensaje' => 'Curso actualizado',
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'mensaje' => 'Actualización fallida',
                ]);
            }
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => 'No exist información',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cur = Curso::find($id);
        if (isset($cur)) {
            try {
                $cur->delete();
                return response()->json([
                    'mensaje' => 'Curso Eliminado',
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'mensaje' => 'Curso no puede ser eliminado',
                ], 204);
            }
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => 'Información incorrecta',
            ], 500);
        }
    }
}
