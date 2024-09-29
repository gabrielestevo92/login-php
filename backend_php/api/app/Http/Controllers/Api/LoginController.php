<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Exception;
use App\Models\User;


class LoginController extends Controller
{
    //Metodo responsavel pelo login do usuario
    public function login(Request $request): JsonResponse{
        // Valida se o email e a senha estão corretos
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            
            // Recebe os dados do usuario
            $user = Auth::user();

            $token = $request->user()->createToken('token')->plainTextToken;

            return response()->json([
                'status' => true,
                'token' => $token,
                'user' => $user
            ], 201);
        }else{
            return response()->json([
                'status' => false,
                'message' => "Incorrect email or password"
            ], 404);
        }
    }
    // Metodo responsavel pelo logout do usuario
    public function logout(User $user): JsonResponse{
        try{
            $user->tokens()->delete();

            return response()->json([
                'status' => true,
                'message' => 'Successfully logged out'
            ], 200);
        } catch (Exception $e){
            return response()->json([
                'status' => false,
                'message' => 'not logged outt'
            ], 400);
        }
    }
}
