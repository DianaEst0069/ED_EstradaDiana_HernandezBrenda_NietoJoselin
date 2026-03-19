<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    //Método para regresar vista de registro
    public function registerForm(){
        return view('auth.register');
    }

    //Método para registrar los usuarios
    public function register(Request $request){
        $request -> validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',            
            'edad' => 'required',
            'domicilio' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);
        //Guardar información en la base de datos
        $user = User::create([
            #Variable de base de datos -----> variable del formulario
            'name' => $request -> name, 
            'email' => $request -> email,
            'edad' => $request -> edad,
            'domicilio' => $request -> domicilio,
            'password' => Hash::make($request->password),
            'cargo' => $request->has('cargo'),
        ]);

        //Inicio de sesión autómatico
        Auth::login($user);

        return redirect()->route('mascotas.index');
    }

    public function loginForm(){
        return view('auth.login');
    }

    //Método para iniciar sesión
    public function login(Request $request){
        //Validar datos en el formulario
        $data = $request -> validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        //Intentar realizar el inicio de sesion con la información del formulario
        if(Auth::attempt($data)){
            
            $request -> session() -> regenerate();

            //Ruta para enviar al usuario cuando se inicia sesión
            return redirect() -> route('mascotas.index');
        }

        return back()->withErrors([
            'email' => 'Datos incorrectos',

        ]);

    }

    //Método para cerrar sesión
    public function logout(Request $request){

        //Cerrar sesión
        Auth::logout();

        //Cerrar credenciales del usuario
        $request -> session()->invalidate();
        $request -> session()->regenerateToken();

        return redirect('/acceso');

    }

    //Método para regresar vista del administrador
    public function adminDashboard(){
        return view('admin.dashboard');
    }
}
