<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Miembro;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

/**
 * Class AsistenciaController
 * @package App\Http\Controllers
 */
class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistencias = Asistencia::paginate();

        return view('asistencia.index', compact('asistencias'))
            ->with('i', (request()->input('page', 1) - 1) * $asistencias->perPage());
    }

    public function reportes()
    {
     //   $asistencia = new Asistencia();
     //   $miembro = Miembro::pluck('nombre_apellido','id');
     //   return view('asistencia.report', compact('asistencia','miembro'));
        return view('asistencia.reportes');
    }

    public function pdf()
    {
        // mirar que esta mostrando pdf
     //  $pdf = App::make('dompdf.wrapper');
     //  $pdf->loadHTML('<h1>Test</h1>');
     //   return $pdf->stream();

        $asistencias = Asistencia::paginate();
        $pdf = Pdf::loadView('asistencia.pdf', ['asistencias'=>$asistencias]);
        return $pdf->download('rep_asistencia.pdf');

    }

    public function pdf_fechas(Request $request)
    {
        // visualizar datos por json
       // $fechas = $request->all();
       // return response()->json($fechas);


        $fi = $request->fi;
        $ff = $request->ff;
       $asistencias = Asistencia::where('fecha','>=',$fi)
                                ->where('fecha','<=',$ff)->get();
       $pdf = Pdf::loadView('asistencia.pdf_fechas', ['asistencias'=>$asistencias]);
       return $pdf->download('rep_asistencia.pdf');

       // retorna en la vista
        // return view('asistencia.pdf_fechas',  ['asistencias'=>$asistencias]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asistencia = new Asistencia();
        $miembro = Miembro::pluck('nombre_apellido','id');
        return view('asistencia.create', compact('asistencia','miembro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Asistencia::$rules);

        $asistencia = Asistencia::create($request->all());

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asistencia = Asistencia::find($id);

        return view('asistencia.show', compact('asistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asistencia = Asistencia::find($id);
        $miembro = Miembro::pluck('nombre_apellido','id');
        return view('asistencia.edit', compact('asistencia','miembro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Asistencia $asistencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asistencia $asistencia)
    {
        request()->validate(Asistencia::$rules);

        $asistencia->update($request->all());

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $asistencia = Asistencia::find($id)->delete();

        return redirect()->route('asistencias.index')
            ->with('success', 'Asistencia deleted successfully');
    }
}
