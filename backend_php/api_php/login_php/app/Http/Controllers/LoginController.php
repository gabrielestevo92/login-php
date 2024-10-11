<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class LoginController extends Controller
{
    public function index(){
        return(view('login'));
    }

    public function email(Request $request){
        
        //Validação do Email
        $request->validate([
            'email'=> 'required|email'
        ]);

        $emailData = [
            'email' => $request->email
        ];
        $response = Http::post('http://127.0.0.1:8000/api/autoregister', $emailData);
        
        // Verificar se é um usuario novo (status 201 CREATED)
        if ($response->getStatusCode() == 201){
            return view('register', ['email' => $request->email]);
        } // Codigo 200 é retornado para usuarios já cadastrados
        else if($response->getStatusCode() == 200){
            return view('password', ['email' => $request->email]);
        }
    }

    public function register(Request $request) {
        var_dump($request->code);

        $registerData = [
            "name"=> $request->name ,
            "email"=> $request->email ,
            "password"=> $request->password ,
            "cod"=> $request->code ,
        ];

        $response = Http::post('http://127.0.0.1:8000/api/signup', $registerData);

        if (!$response['status']){
            return redirect()->back()->withErrors($response['message']);
        }

        return redirect()->route('home');
        

    }


    public function store(Request $request){
        //var_dump('login');
        $request->validate([
            'email'=> 'required|email',
            'password' => 'required|min:5'
        ]);

        $loginData = [            
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        $response = Http::post('http://127.0.0.1:8000/api/login', $loginData);
        
        // Validando Login
        if ($response->getStatusCode() === 201){
            $token = $response->json()['token'];
            Session::put('token', $token);
            Session::put('login_time', now());
            var_dump($token);
            return redirect()->route('home')->with('success', 'logged in');
        }
        return redirect()->route('login.index')->withErrors(['error' => 'Email or password invalid']);
        var_dump($response->json());

    }
    public function destroy($id){
        
        $token = Session::get('token');
        var_dump($token);
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->post("http://127.0.0.1:8000/api/logout/{$id}");
        
        Session::forget('token');

            return redirect()->route('login.index');
    }
}
