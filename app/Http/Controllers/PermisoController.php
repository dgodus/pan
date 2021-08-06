<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\permiso;
use App\Http\Requests\StorePermiso;

class PermisoController extends Controller
{
    //
    public function index(){
        $permiso = Permiso::orderBy('id','desc')->paginate();

        return view('permiso.index', compact('permiso'));
    }
    public function create(){
        return view('permiso.create');
    }

    public function store(StorePermiso $request){
   
        /*$curso = new Curso();

        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save();*/

        $permiso = Permiso::create($request->all());

        return redirect()->route('permiso.show', $permiso);
    }
    public function show(Permiso $permiso){
    
        return view('permiso.show', compact('permiso'));
    }

    public function edit(Permiso $permiso){

        return view('permiso.edit', compact('permiso'));

    }   

    public function update(Request $request, Permiso $permiso){
        
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);


        // $curso->name = $request->name;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria = $request->categoria;

        // $curso->save();

        $permiso->update($request->all());

        return redirect()->route('permiso.show', $permiso);

    }

    public function destroy(Permiso $permiso){
        $permiso->delete();

        return redirect()->route('permiso.index', $permiso);
    }
}
