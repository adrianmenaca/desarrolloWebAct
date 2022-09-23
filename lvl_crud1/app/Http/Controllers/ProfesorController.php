<?php

namespace App\Http\Controllers;

use App\Models\profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesor=Profesor::paginate(5);
        return view('profesor.index')
                     ->with('profesors',$profesor);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesor.form');
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
        'name'=> 'required|max:15',
        'materia'=> 'required|max:20']);

        $profesor=Profesor::create($request->only('name','materia'));
        Session::flash('mensaje','Registro creado con Exito');
        return redirect()->route('profesor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show(profesor $profesor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit(profesor $profesor)
    {
        return view('profesor.form')
                     ->with('profesor',$profesor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, profesor $profesor)
    {
        $request->validate([
            'name'=> 'required|max:15',
            'materia'=> 'required|max:20']);
            $profesor->name = $request['name'];
            $profesor->materia = $request['materia'];
            $profesor->save();
        Session::flash('mensaje','Registro EDITADO con Exito');
        return redirect()->route('profesor.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy(profesor $profesor)
    {
        $profesor->delete();
        Session::flash('mensaje','Registro Eliminado con Exito');
        return redirect()->route('profesor.index');
    }
}
