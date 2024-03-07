<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        return view ('usuarios.index',['usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'required',
        ]);

        $usuario = new User();

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->estado = '1';
        $usuario->fecha_ingreso = date($format = 'Y-m-d');

        $usuario->save();

        return redirect()->route('usuarios.index')->with('mensaje','se registró el usuario de la manera correcta');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = User::findOrFail($id);
        return view ('usuarios.show',['usuario'=>$usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);
        return view ('usuarios.edit',['usuario'=>$usuario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => 'required',
        ]);

        $usuario = User::find($id);

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);

        $usuario->save();

        return redirect()->route('usuarios.index')->with('mensaje','se actualizó el usuario de la manera correcta');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('usuarios.index')->with('mensaje','se eliminó el usuario de la manera correcta');
    }
}
