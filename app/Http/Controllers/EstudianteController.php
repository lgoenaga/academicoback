<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Estudiante::all();
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
        $res = Estudiante::create($inputs);
        if (isset($res)) {
            return response()->json([
                'data' => $res,
                'mensaje' => 'Estudiante guardado',
            ]);
        } else {
            return response()->json([
                'error' => true,
                'mensaje' => 'Guardado fallido',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $est = Estudiante::find($id);
        if (isset($est)) {
            return response()->json([
                'data' => $est,
                'mensaje' => 'Estudiante encontrado',
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
        $est = Estudiante::find($id);


        if (isset($est)) {
            $est->firstName = $request->firstName;
            $est->lastName = $request->lastName;
            $est->photo = $request->photo;
            if ($est->save()) {
                return response()->json([
                    'data' => $est,
                    'mensaje' => 'Estudiante actualizado',
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
        $est = Estudiante::find($id);
        if (isset($est)) {
            try {
                $est->delete();
                return response()->json([
                    'mensaje' => 'Estudiante Eliminado',
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'mensaje' => 'Estudiante no puede ser eliminado',
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
