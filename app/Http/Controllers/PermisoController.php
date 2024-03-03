<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisoController extends Controller
{
    public function __construct(){

        $this->middleware('can:AdministrarPermisos')->only('index');
        $this->middleware('can:AdministrarPermisos')->only('create');
        $this->middleware('can:AdministrarPermisos')->only('edit');
        $this->middleware('can:AdministrarPermisos')->only('destroy');
       
       
    }    
   
   
    public function index()
    {
        $permisos = Permission::all();
        return view('permisos',compact('permisos'));
        
       
    }

    
    public function create()
    {
        
        $permiso = Permission::all();
        return view('permisos-create',compact('permiso'));
    }

    
    public function store(Request $request)
    {
           $validator = $request -> validate ([
           
            'name'=> 'required',
            'name'=> 'unique:permissions'
                                               
           ]);
        
            $permiso = Permission::create(['name' => $request->input('nombre')]);
            return back()->with('message','Registrado correctamente!');
    }

   
    public function show($permiso_id)
    {
       
    }

   
    public function edit(Permission $permiso)
    {
       
        return view('permisos-edit',compact('permiso'));
        
    }

    
    public function update(Request $request, Permission $permiso)
    {
        $validator = $request->validate([
            'name' => 'required|unique:permissions,name,' . $permiso->id,
        ]);

        $permiso->update($request->all());

        return redirect()->route('permisos.index')->with('message', 'Actualizado correctamente!');
    }



    
    public function destroy($permiso_id)
    {
        $permiso = Permission::find($permiso_id);
        $permiso -> delete();
    
        return back()->with('message','Eliminado correctamente!');
    }
}
