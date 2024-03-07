<?php

namespace App\Http\Controllers;

use App\Models\Miembro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MiembroController extends Controller
{

    public function index(){
        $miembros = Miembro::all()->sortByDesc('id');
        return view ('miembros.index',['miembros'=>$miembros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('miembros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      // $miembro= request()->all();
      // return response()->json($miembro);

        $request->validate([
           'nombre_apellido'=>'required',
           'direccion'=>'required',
           'telefono'=>'required',
           'fecha_nacimiento'=>'required',
           'email'=>'required',
           'ministerio'=>'required',
        ]);

        $miembro = new Miembro();
        $miembro->nombre_apellido = $request->nombre_apellido;
        $miembro->direccion = $request->direccion;
        $miembro->telefono = $request->telefono;
        $miembro->fecha_nacimiento = $request->fecha_nacimiento;
        $miembro->genero = $request->genero;
        $miembro->email = $request->email;
        $miembro->estado = '1';
        $miembro->ministerio = $request->ministerio;
        if($request->hasFile('fotografia')){
           $miembro->fotografia = $request->file('fotografia')->store('fotografia_miembros','public');
        }
        $miembro->fecha_ingreso = date($format = 'Y-m-d');

        $miembro->save();

        return redirect()->route('miembros.index')->with('mensaje','se registró el miembro de la manera correcta');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $miembro = Miembro::findOrFail($id);
      //  return response()->json($miembro);
        return view ('miembros.show',['miembro'=>$miembro]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $miembro = Miembro::findOrFail($id);
        return view ('miembros.edit',['miembro'=>$miembro]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_apellido'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'fecha_nacimiento'=>'required',
            'email'=>'required',
            'ministerio'=>'required',
        ]);

        $miembro = Miembro::find($id);

        $miembro->nombre_apellido = $request->nombre_apellido;
        $miembro->direccion = $request->direccion;
        $miembro->telefono = $request->telefono;
        $miembro->fecha_nacimiento = $request->fecha_nacimiento;
        $miembro->genero = $request->genero;
        $miembro->email = $request->email;
        $miembro->ministerio = $request->ministerio;
        if($request->hasFile('fotografia')){
            Storage::delete('public/'.$miembro->fotografia);
            $miembro->fotografia = $request->file('fotografia')->store('fotografia_miembros','public');
        }

        $miembro->save();

        return redirect()->route('miembros.index')->with('mensaje','se actualizó el miembro de la manera correcta');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $miembro = Miembro::find($id);
        if($request->hasFile('fotografia')){
            Storage::delete('public/'.$miembro->fotografia);
       }
        $miembro->estado = '0';
        $miembro->save();

    //   Miembro::destroy($id);
        return redirect()->route('miembros.index')->with('mensaje','se eliminó el miembro de la manera correcta');
    }

}
