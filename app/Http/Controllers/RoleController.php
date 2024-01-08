<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sumario;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function __construct(){

        $this->middleware('can:AdministrarRoles')->only('index');
        $this->middleware('can:AdministrarRoles')->only('create');
        $this->middleware('can:AdministrarRoles')->only('edit');
        $this->middleware('can:AdministrarRoles')->only('destroy');
       
       
    }    
   
    public function index()
    {
        $roles = Role::all();
        return view('roles',compact('roles'));

    }

    
    public function create()
    {
        $rol = Role::all();
        return view('roles-create',compact('rol'));
    }

    
    public function store(Request $request)
    {
        $validator = $request -> validate ([
           
            'nombre'=> 'required'
                                               
           ]);
            $role = Role::create(['name' => $request->input('nombre')]);
            return back()->with('message','Registrado correctamente!');
    }

    
    public function show($role_id)
    {
       /* $role = Role::find($role_id);
        //return $role;
        $permisos = Permission::all(); 
        return view('roles-show',compact('role','permisos'));*/
    }

   
    public function edit(Role $role)
    {
        //$role = Role::find($role_id);
       //return $role;
        $permisos = Permission::all(); 
        return view('rolePermiso',compact('role','permisos'));
    }

   
    public function update(Request $request, Role $role)
    {
            // dd($request->all());    
            // dd($role->all());
            //$role->permissions()->sync($request->input('permisos'));
            $role->permissions()->sync($request->permisos);
          
            return redirect()->route('roles.edit',$role);//->with('message','Actualizado correctamente!');
            
    }

  
    public function destroy($role_id)
    {
        $rol = Role::find($role_id);
        $rol -> delete();
        return back()->with('message','Eliminado correctamente!');
        
    }
}
