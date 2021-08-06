<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;
use App\Http\Requests\StoreProducto;

class ProductoController extends Controller
{
    //
    public function index(){
        $producto = producto::orderBy('id','desc')->paginate();

        return view('producto.index', compact('producto'));
    }
    public function create(){
        return view('producto.create');
    }

    public function store(StoreProducto $request){
   
        /*$curso = new Curso();

        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save();*/

        $producto = producto::create($request->all());

        return redirect()->route('producto.show', $producto);
    }
    public function show(producto $producto){
    
        return view('producto.show', compact('producto'));
    }

    public function edit(producto $producto){

        return view('producto.edit', compact('producto'));

    }   

    public function update(Request $request, producto $producto){
        
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);


        // $curso->name = $request->name;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria = $request->categoria;

        // $curso->save();

        $producto->update($request->all());

        return redirect()->route('producto.show', $producto);

    }

    public function destroy(producto $producto){
        $producto->delete();

        return redirect()->route('producto.index', $producto);
    }
}
