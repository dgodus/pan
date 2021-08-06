<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cliente;
use App\Http\Requests\StoreCliente;

class ClienteController extends Controller
{
    //
    public function index(){
        $cliente = Cliente::orderBy('id','desc')->paginate();

        return view('cliente.index', compact('cliente'));
    }
    public function create(){
        return view('cliente.create');
    }

    public function store(StoreCliente $request){
   
        /*$curso = new Curso();

        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save();*/

        $cliente = Cliente::create($request->all());

        return redirect()->route('cliente.show', $cliente);
    }
    public function show(Cliente $cliente){
    
        return view('cliente.show', compact('cliente'));
    }

    public function edit(Cliente $cliente){

        return view('cliente.edit', compact('cliente'));

    }   

    public function update(Request $request, Cliente $cliente){
        
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);


        // $curso->name = $request->name;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria = $request->categoria;

        // $curso->save();

        $cliente->update($request->all());

        return redirect()->route('cliente.show', $cliente);

    }

    public function destroy(Cliente $cliente){
        $cliente->delete();

        return redirect()->route('cliente.index', $cliente);
    }
}
