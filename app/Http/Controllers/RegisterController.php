<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
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
    $user_type = Session::get('tipo_user');
    $user_type_value = User::getUserTypeValue($user_type);

    if ($user_type_value === null) {
        // Tipo de usuário não está definido ou é inválido, redireciona para a página inicial
        return redirect()->route('intern.index')->with('error', 'Invalid user type.');
    }

    $this->validate($request, [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    try {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => $user_type_value,
        ]);
        return redirect()->route('dashboard')->with('success', 'Usuário criado com sucesso!');
    } catch (QueryException $e) {
        if ($e->errorInfo[1] == 1062) { // Código específico para duplicação de chave única
            return redirect()->route('register')->withErrors(['error' => 'O endereço de e-mail já está sendo usado.']);
        } else {
            return redirect()->route('register')->withErrors(['error' => 'Ocorreu um erro ao registrar o usuário.']);
        }
    } catch (QueryException $e) {
        return redirect()->route('register')->withErrors(['error' => 'Ocorreu um erro inesperado ao registrar o usuário.']);
    }
}

}