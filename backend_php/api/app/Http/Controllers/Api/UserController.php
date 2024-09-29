<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;


class UserController extends Controller
{
    public function index(){
        //$users = User::get();
        return response()->json([
            'status' => true,
        ], 200);
    }

    public function signup(Request $request){
        
        DB::beginTransaction();

        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password'=> $request->password
            ]);
            
            // Registra o usuario
            DB::commit();

            return response()->json([
                'status' => true,
                'user'=> $user,
                'message' => "user successfully registered",
            ], 201);

        // Retorna uma mensagem de excessão/erro com status 400 
        }catch(Exception $e){
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => "User has not been registered",
            ], 400);
        }
    }
}


