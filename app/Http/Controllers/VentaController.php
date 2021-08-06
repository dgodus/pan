<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\venta;
use App\Http\Requests\StoreVenta;

class VentaController extends Controller
{
    //
    public function index(){
        $venta = venta::orderBy('id','desc')->paginate();

        return view('venta.index', compact('venta'));
    }
    public function create(){
        return view('venta.create');
    }

    public function store(StoreVenta $request){
   
        /*$curso = new Curso();

        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save();*/

        $venta = venta::create($request->all());

        return redirect()->route('venta.show', $venta);
    }
    public function show(venta $venta){
    
        return view('venta.show', compact('venta'));
    }

    public function edit(venta $venta){

        return view('venta.edit', compact('venta'));

    }   

    public function update(Request $request, venta $venta){
        
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);


        // $curso->name = $request->name;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria = $request->categoria;

        // $curso->save();

        $venta->update($request->all());

        return redirect()->route('venta.show', $venta);

    }

    public function destroy(venta $venta){
        $venta->delete();

        return redirect()->route('venta.index', $venta);
    }
}
