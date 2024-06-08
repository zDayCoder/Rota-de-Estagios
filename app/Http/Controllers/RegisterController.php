<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;


class RegisterController extends Controller
{
    //

    public function index(){
        $tipoUser = Session::get('tipo_user');

        if (!in_array($tipoUser, ['Intern', 'Enterprise', 'Coordinator'])) {
            // Tipo de usuário não está definido ou é inválido, redireciona para a página inicial
            return redirect()->route('intern.index')->with('error', 'Invalid user type.');
        }
        return view('auth.register',compact('tipoUser'));
    }


    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'user_type' => 'required|integer'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
        ]);

        return redirect()->route('dashboard')->with('success', 'Usuário criado com sucesso!');
    }

    public function registerIntern(Request $request){
        // $request->v alidate([
        //     'intern_field' => 'required|string|max:255',
        //     // Adicione validações para outros campos conforme necessário
        // ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => 0,
                // Adicione outros campos específicos para internos conforme necessário
            ]);        
        
            // Redireciona para a rota desejada após o registro
            return redirect()->route('dashboard')->with('success', 'Usuário registrado com sucesso.');
        } catch (Exception $e) {
            if ($e->errorInfo[1] == 1062) { // Código específico para duplicação de chave única
                return redirect()->route('register')->withErrors(['error' => 'O endereço de e-mail já está sendo usado.']);
            } else {
                return redirect()->route('register')->withErrors(['error' => 'Ocorreu um erro ao registrar o usuário.']);
            }
        }
    }


    public function registerEnterprise(Request $request){
        
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => 1,
                // Adicione outros campos específicos para internos conforme necessário
            ]);        
        
            // Redireciona para a rota desejada após o registro
            return redirect()->route('dashboard')->with('success', 'Usuário registrado com sucesso.');
        } catch (Exception $e) {
            if ($e->errorInfo[1] == 1062) { // Código específico para duplicação de chave única
                return redirect()->route('register')->withErrors(['error' => 'O endereço de e-mail já está sendo usado.']);
            } else {
                return redirect()->route('register')->withErrors(['error' => 'Ocorreu um erro ao registrar o usuário.']);
            }
        }
    }

    public function registerCordinator(Request $request){
        

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => 2,
                // Adicione outros campos específicos para internos conforme necessário
            ]);        
        
            // Redireciona para a rota desejada após o registro
            return redirect()->route('dashboard')->with('success', 'Usuário registrado com sucesso.');
        } catch (Exception $e) {
            if ($e->errorInfo[1] == 1062) { // Código específico para duplicação de chave única
                return redirect()->route('register')->withErrors(['error' => 'O endereço de e-mail já está sendo usado.']);
            } else {
                return redirect()->route('register')->withErrors(['error' => 'Ocorreu um erro ao registrar o usuário.']);
            }
        }
        
    }
}