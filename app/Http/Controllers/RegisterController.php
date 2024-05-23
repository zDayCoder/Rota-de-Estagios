<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

    public function index(){
        $tipoUser = Session::get('tipo_user', 'coordinator'); // 'default_value' caso não exista 'tipo_user'
        return view('auth.register',compact('tipoUser'));
    }

    public function registerIntern(Request $request){
        // $request->v alidate([
        //     'intern_field' => 'required|string|max:255',
        //     // Adicione validações para outros campos conforme necessário
        // ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 0,
            //'intern_field' => $request->intern_field,
            // Adicione outros campos específicos para internos conforme necessário
        ]);

        // Redireciona para a rota desejada após o registro
        return redirect()->route('dashboard');
    }


    public function registerEnterprise(Request $request){
        

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 'enterprise',
            // 'enterprise_field' => $request->enterprise_field,
            // Adicione outros campos específicos para empresas conforme necessário
        ]);

        // Redireciona para a rota desejada após o registro
        return redirect()->route('dashboard');
    }

    public function registerCordinator(Request $request){
        

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 'enterprise',
            // 'enterprise_field' => $request->enterprise_field,
            // Adicione outros campos específicos para empresas conforme necessário
        ]);

        // Redireciona para a rota desejada após o registro
        return redirect()->route('dashboard');
    }
}