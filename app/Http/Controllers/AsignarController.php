<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class AsignarController extends Controller
{
    public function __construct(){

        $this->middleware('can:AdministracionUsuario')->only('index');
        $this->middleware('can:AdministracionUsuario')->only('create');
        $this->middleware('can:AdministracionUsuario')->only('edit');
        $this->middleware('can:AdministracionUsuario')->only('destroy');
       
       
    }    
   
    public function index()
    {
       $users = User::all();
       return view('listUser',compact('users'));

    }

  
    public function create()
    {
        //
    }

 
   

    public function store(Request $request)
    {
        // Validar la solicitud
        $validator = $request->validate([
            'nombre' =>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8' // Cambia las reglas de validación según tus requisitos
        ]);
    
        // Verificar si el usuario ya existe
        if (User::where('email', $request->input('email'))->exists()) {
            return back()->withErrors(['email' => 'El email ya existe.'])->withInput();
        }
    
        // Crear el usuario si no existe
        $usuario = User::create([
            'name' => $request->input('nombre'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')) // Encriptar la contraseña antes de guardarla
        ]);
        
        // Redirigir con un mensaje de éxito
        return back()->with('message', 'Usuario registrado correctamente!');
    }

   function show($id)
    {
        //
    }

   
    public function edit(string $id)
    {
       $user = User::find($id); 
       $roles = Role::all();

       return view('userRol',compact('user','roles'));

    }

   
    public function update(Request $request, $id)
    {
       $user = User::find($id);
       $user->roles()->sync($request->roles);
       
       return redirect()->route('asignar.edit',$user);
        
    }

    
    public function destroy($user_id)
    {
        $user = User::find($user_id);
        $user -> delete();
    
        return back()->with('message','Eliminado correctamente!');
    }
}
