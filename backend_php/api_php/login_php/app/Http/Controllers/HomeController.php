<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
class HomeController extends Controller
{

    public function index(){
        $token = Session::get('token');
    
        // Faz a requisição enviando o token no header para validar o login do usuario
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('http://127.0.0.1:8000/api/user');


        if ($response->getStatusCode() == 200){
            
            $name = $response->json()['user']['name'];
            if (session()->has('login_time')) {
                $loginTime = session()->get('login_time');
                $timeLogged = now()->diffForHumans($loginTime, true); // Calcula a diferença de tempo
                
                
            }else{
                Session::put('login_time', now());
                $loginTime = session()->get('login_time');
                $timeLogged = now()->diffForHumans($loginTime, true);
                
            }
            return view('home', ['name' => $name, 'timeLogged' => $timeLogged]);
        }
            
        return redirect()->back()->withErrors('SignIn.');
       

    }
}
