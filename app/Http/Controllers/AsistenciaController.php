<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\asistencia;
use App\Http\Requests\StoreAsistencia;

class AsistenciaController extends Controller
{
    //
    public function index(){
        $asistencia = Asistencia::orderBy('id','desc')->paginate();

        return view('asistencia.index', compact('asistencia'));
    }
    public function create(){
        return view('asistencia.create');
    }

    public function store(StoreAsistencia $request){
   
        /*$curso = new Curso();

        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save();*/

        $asistencia = Asistencia::create($request->all());

        return redirect()->route('asistencia.show', $asistencia);
    }
    public function show(Asistencia $asistencia){
    
        return view('asistencia.show', compact('asistencia'));
    }

    public function edit(Asistencia $asistencia){

        return view('asistencia.edit', compact('asistencia'));

    }   

    public function update(Request $request, Asistencia $asistencia){
        
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);


        // $curso->name = $request->name;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria = $request->categoria;

        // $curso->save();

        $asistencia->update($request->all());

        return redirect()->route('asistencia.show', $asistencia);

    }

    public function destroy(Asistencia $asistencia){
        $asistencia->delete();

        return redirect()->route('asistencia.index', $asistencia);
    }
}
