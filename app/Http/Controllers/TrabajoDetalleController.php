<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\trabajoDetalle;
use App\Http\Requests\StoreTrabajoDetalle;

class TrabajoDetalleController extends Controller
{
    //
    public function index(){
        $roleUser = roleUser::orderBy('id','desc')->paginate();

        return view('roleUser.index', compact('roleUser'));
    }
    public function create(){
        return view('roleUser.create');
    }

    public function store(StoreRoleUser $request){
   
        /*$curso = new Curso();

        $curso->name = $request->name;
        $curso->descripcion = $request->descripcion;
        $curso->categoria = $request->categoria;

        $curso->save();*/

        $roleUser = roleUser::create($request->all());

        return redirect()->route('roleUser.show', $roleUser);
    }
    public function show(roleUser $roleUser){
    
        return view('roleUser.show', compact('roleUser'));
    }

    public function edit(roleUser $roleUser){

        return view('roleUser.edit', compact('roleUser'));

    }   

    public function update(Request $request, roleUser $roleUser){
        
        $request->validate([
            'name' => 'required',
            'descripcion' => 'required',
            'categoria' => 'required'
        ]);


        // $curso->name = $request->name;
        // $curso->descripcion = $request->descripcion;
        // $curso->categoria = $request->categoria;

        // $curso->save();

        $roleUser->update($request->all());

        return redirect()->route('roleUser.show', $roleUser);

    }

    public function destroy(roleUser $roleUser){
        $roleUser->delete();

        return redirect()->route('roleUser.index', $roleUser);
    }
}
