<?php

namespace App\Http\Controllers;

use App\Models\clase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clase=clase::paginate(5);
        return view('clase.index')
                     ->with('clases',$clase);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clase.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'docente'=> 'required|max:15',
        'estudiante'=> 'required|max:15',
        'asignatura'=> 'required|max:20']);

        $clase=clase::create($request->only('docente','estudiante','asignatura'));
        Session::flash('mensaje','Registro creado con Exito');
        return redirect()->route('clase.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function show(clase $clase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function edit(clase $clase)
    {
        return view('clase.form')
                     ->with('clase',$clase);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, clase $clase)
    {
        $request->validate([
            'docente'=> 'required|max:15',
            'estudiante'=> 'required|max:15',
            'asignatura'=> 'required|max:20']);
            
            $clase->docente = $request['docente'];
            $clase->estudiante = $request['estudiante'];
            $clase->asignatura = $request['asignatura'];
            $clase->save();
        Session::flash('mensaje','Registro EDITADO con Exito');
        return redirect()->route('clase.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\clase  $clase
     * @return \Illuminate\Http\Response
     */
    public function destroy(clase $clase)
    {
        $clase->delete();
        Session::flash('mensaje','Registro Eliminado con Exito');
        return redirect()->route('clase.index');
    }
}