<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
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
        $inputs['password'] = Hash::make($request->password);
        $res = User::create($inputs);
        if(isset($res)){
            return response()->json([
                'data'=>$res,
                'mensaje'=>'Usuario guardado',
            ]);
        }else{
            return response()->json([
                'error'=>true,
                'mensaje'=>'Guardado fallido',
        ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usr = User::find($id);
        if(isset($usr)){
            return response()->json([
                'data'=>$usr,
                'mensaje'=>'Usuario encontrado',
            ]);
        }else{
            return response()->json([
                'error'=>true,
                'mensaje'=>'Información incorrecta',
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
        $usr = User::find($id);


        if(isset($usr)){
            $usr->name = $request->name;
            $usr->email = $request->email;
            $usr->password = Hash::make($request->password);
            if($usr->save()){
                return response()->json([
                    'data'=>$usr,
                    'mensaje'=>'Usuario actualizado',
                ]);
            }else
            {
                return response()->json([
                        'error'=>true,
                        'mensaje'=>'Actualización fallida',
                ]);
            }       
            
        }else
        {
            return response()->json([
                    'error'=>true,
                    'mensaje'=>'No exist información',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usr = User::find($id);
        if(isset($usr)){
            $usr->delete();
            return response()->json([
                'mensaje'=>'Usuario Eliminado',
            ]);
        }else{
            return response()->json([
                'error'=>true,
                'mensaje'=>'Información incorrecta',
        ]);
        }
    }
}
