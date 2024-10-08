<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\Autocadastro;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailValidator;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index(){
        //$users = User::get();
        return response()->json([
            'status' => true,
        ], 200);
    }

    public function autoregister(Request $request) {
        //dd(Auth::attempt(['email' => $request->email]));;
        $email = $request->email;
        $user = User::where('email', $email)->exists();
        $autocadastro = Autocadastro::where('email', $email)->exists();
        //dd($user);
        
        if (!$user && !$autocadastro){
            // Gera o Codigo de confirmação
            $code = mt_rand(100000,999999);

            // Conteúdo do e-mail
            $messageContent = "Use o Codigo $code para confirmar seu cadastro!"; 
            // Assunto do e-mail
            $subject = 'Confirmação de Cadastro!'; 

            // Envio de e-mail
            // $mail = Mail::raw($messageContent, function ($message) use ($subject, $request) {
            //     $message->to($request->email) 
            //             ->subject($subject); 
            // });

            $autocadastro = Autocadastro::create([
                'email' => $request->email,
                'password' => $code, // Criptografando a senha
            ]);
            return response()->json([
                'status' => true,
                'user'=> $request->email,
                'message' => "code sent by email"
            ], 201);
        }
        else{
            return response()->json([
                'status' => false,
                'user'=> $request->email,
                'message' => "Email ja cadastrado"
            ], 400);
        }
        
    }

    // Metodo responsavel pelo cadastro do usuario
    public function signup(UserRequest $request){

        


        $teste = Autocadastro::where('password', $request->cod)->first();
        if ($teste && ($teste->email == $request->email)){
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
                    'cod' => mt_rand(100000, 999999)
                ], 201);

                // Retorna uma mensagem de excessão/erro com status 400 
            }catch(Exception $e){
                DB::rollBack();

                return response()->json([
                    'status' => false,
                    'message' => "User has not been registered $request",
                ], 400);
            }
        }
        else{
            return response()->json([
                'status' => false,
                'user'=> 'Code invalid',
            ], 201);
        }
        
    }
}


