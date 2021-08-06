<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\role;
use App\Http\Requests\StoreRole;

class RoleController extends Controller
{
    //
    public function index(){
        $role = role::orderBy('id','desc')->paginate();

        return view('role.index', compact('role'));
    }
    public function create(){
        return view('role.create');
    }

    public function store(StoreRole $request){
   
        /*$curso = new Curso();

        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save();*/

        $role = role::create($request->all());

        return redirect()->route('role.show', $role);
    }
    public function show(role $role){
    
        return view('role.show', compact('role'));
    }

    public function edit(role $role){

        return view('role.edit', compact('role'));

    }   

    public function update(Request $request, role $role){
        
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);


        // $curso->name = $request->name;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria = $request->categoria;

        // $curso->save();

        $role->update($request->all());

        return redirect()->route('role.show', $role);

    }

    public function destroy(role $role){
        $role->delete();

        return redirect()->route('role.index', $role);
    }
}
