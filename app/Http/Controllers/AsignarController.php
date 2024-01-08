<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

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
        //
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

    
    public function destroy($id)
    {
        //
    }
}
