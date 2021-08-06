<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ventaDetalle;
use App\Http\Requests\StoreVentaDetalle;

class VentaDetalleController extends Controller
{
    //
    public function index(){
        $ventaDetalle = ventaDetalle::orderBy('id','desc')->paginate();

        return view('ventaDetalle.index', compact('ventaDetalle'));
    }
    public function create(){
        return view('ventaDetalle.create');
    }

    public function store(StoreVentaDetalle $request){
   
        /*$curso = new Curso();

        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save();*/

        $ventaDetalle = ventaDetalle::create($request->all());

        return redirect()->route('ventaDetalle.show', $ventaDetalle);
    }
    public function show(ventaDetalle $ventaDetalle){
    
        return view('ventaDetalle.show', compact('ventaDetalle'));
    }

    public function edit(ventaDetalle $ventaDetalle){

        return view('ventaDetalle.edit', compact('ventaDetalle'));

    }   

    public function update(Request $request, ventaDetalle $ventaDetalle){
        
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);


        // $curso->name = $request->name;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria = $request->categoria;

        // $curso->save();

        $ventaDetalle->update($request->all());

        return redirect()->route('ventaDetalle.show', $ventaDetalle);

    }

    public function destroy(ventaDetalle $ventaDetalle){
        $ventaDetalle->delete();

        return redirect()->route('ventaDetalle.index', $ventaDetalle);
    }
}
