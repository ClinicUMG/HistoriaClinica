<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use App\Http\Requests\Role\StoreRequest;
use App\Http\Requests\Role\UpdateRequest;
use Illuminate\Http\Request;



class RoleController extends Controller
{
    //retornar vistas
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('theme.backoffice.pages.role.index',[
             //todos los campos que tiene la tabla role
            'roles'=> Role::all(),
            
        ]);
    }       
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function create()
    {
        return view('theme.backoffice.pages.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //funcon de request para envio de datos
    public function store(StoreRequest $request, Role $role)
    {
        $role = $role->store($request);
        return redirect()->route('backoffice.role.show',$role);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    //retorna la vista show
    public function show(Role $role)
    

    {
        return view('theme.backoffice.pages.role.show', [
            'permissions' => Permission::all(),
            'role' => $role, 
            'permissions' => $role->permissions
            
            
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('theme.backoffice.pages.role.edit', [
            'role' => $role, 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    
    public function update(UpdateRequest $request, Role $role)
    {
        $role->my_update($request);
        return redirect()->route('backoffice.role.show',$role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    //eliminacion del un rol
    public function destroy(Role $role)
    {
        $role->delete();
        alert('exito','Rol eliminado','success')->showConfirmButton();
        return redirect()->route('backoffice.role.index');

    }
}
