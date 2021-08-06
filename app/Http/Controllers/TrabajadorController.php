<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\trabajador;
use App\Http\Requests\StoreTrabajador;

class TrabajadorController extends Controller
{
    //
    public function index(){
        $trabajador = trabajador::orderBy('id','desc')->paginate();

        return view('trabajador.index', compact('trabajador'));
    }
    public function create(){
        return view('trabajador.create');
    }

    public function store(StoreTrabajador $request){
   
        /*$curso = new Curso();

        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save();*/

        $trabajador = trabajador::create($request->all());

        return redirect()->route('trabajador.show', $trabajador);
    }
    public function show(trabajador $trabajador){
    
        return view('trabajador.show', compact('trabajador'));
    }

    public function edit(trabajador $trabajador){

        return view('trabajador.edit', compact('trabajador'));

    }   

    public function update(Request $request, trabajador $trabajador){
        
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);


        // $curso->name = $request->name;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria = $request->categoria;

        // $curso->save();

        $trabajador->update($request->all());

        return redirect()->route('trabajador.show', $trabajador);

    }

    public function destroy(trabajador $trabajador){
        $trabajador->delete();

        return redirect()->route('trabajador.index', $trabajador);
    }
}
