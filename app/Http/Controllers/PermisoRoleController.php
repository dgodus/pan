<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PermisoRole;
use App\Http\Requests\StorePermisoRole;

class PermisoRoleController extends Controller
{
    //
    public function index(){
        $permisorole = PermisoRole::orderBy('id','desc')->paginate();

        return view('permisorole.index', compact('permisorole'));
    }
    public function create(){
        return view('permisorole.create');
    }

    public function store(StorePermisoRole $request){
   
        /*$curso = new Curso();

        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save();*/

        $permisorole = PermisoRole::create($request->all());

        return redirect()->route('permisorole.show', $permisorole);
    }
    public function show(PermisoRole $permisorole){
    
        return view('permisorole.show', compact('permisorole'));
    }

    public function edit(PermisoRole $permisorole){

        return view('permisorole.edit', compact('permisorole'));

    }   

    public function update(Request $request, PermisoRole $permisorole){
        
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);


        // $curso->name = $request->name;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria = $request->categoria;

        // $curso->save();

        $permisorole->update($request->all());

        return redirect()->route('permisorole.show', $permisorole);

    }

    public function destroy(PermisoRole $permisorole){
        $permisorole->delete();

        return redirect()->route('permisorole.index', $permisorole);
    }
}
