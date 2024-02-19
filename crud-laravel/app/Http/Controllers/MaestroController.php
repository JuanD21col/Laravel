<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maestro;
use App\Models\Carrera;

class MaestroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maestros = Maestro::all();
        return view('maestros.index', ['maestros' => $maestros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('maestros.create', ['carreras' => Carrera::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nit' => 'required|unique:maestros|max:10',
            'nombre' => 'required|max:255',
            'fecha' => 'required|date',
            'telefono' => 'required|',
            'email' => 'nullable|email',
            'carrera' => 'required'
        ]);

        $maestro = new Maestro();
        $maestro->nit = $request->input('nit');
        $maestro->nombre = $request->input('nombre');
        $maestro->fecha_nacimiento = $request->input('fecha');
        $maestro->telefono = $request->input('telefono');
        $maestro->email = $request->input('email');
        $maestro->carrera_id = $request->input('carrera');
        $maestro->save();

        return redirect()->route('maestros.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $maestro = Maestro::find($id);
        return view('maestros.edit', ['maestro' => $maestro, 'carreras' => Carrera::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nit' => 'required|max:10|unique:maestros,nit,' . $id,
            'nombre' => 'required|max:255',
            'fecha' => 'required|date',
            'telefono' => 'required|',
            'email' => 'nullable|email',
            'carrera' => 'required'
        ]);

        $maestro = Maestro::find($id);
        $maestro->nit = $request->input('nit');
        $maestro->nombre = $request->input('nombre');
        $maestro->fecha_nacimiento = $request->input('fecha');
        $maestro->telefono = $request->input('telefono');
        $maestro->email = $request->input('email');
        $maestro->carrera_id = $request->input('carrera');
        $maestro->save();

        return redirect()->route('maestros.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $maestro = Maestro::find($id);
        $maestro->delete();

        return redirect("maestros");
    }
}
