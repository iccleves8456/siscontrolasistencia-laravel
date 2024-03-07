<?php

namespace App\Http\Controllers;
use App\Models\Ministerio;
use App\Models\Miembro;
use App\Models\User;
use App\Models\Asistencia;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $ministerios = Ministerio::all();
        $miembros = Miembro::all();
        $usuarios = User::all();
        $asistencias = User::all();
        return view('index',['ministerios'=>$ministerios,
                                   'miembros'=>$miembros,
                                   'asistencias'=>$asistencias,
                                   'usuarios'=>$usuarios]);
    }
}
