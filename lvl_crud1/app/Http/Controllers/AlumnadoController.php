<?php

namespace App\Http\Controllers;

use App\Models\alumnado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class alumnadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnado=alumnado::paginate(5);
        return view('alumnado.index')
                     ->with('alumnados',$alumnado);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnado.form');
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
        'carrera'=> 'required|max:20']);

        $alumnado=alumnado::create($request->only('name','carrera'));
        Session::flash('mensaje','Registro creado con Exito');
        return redirect()->route('alumnado.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\alumnado  $alumnado
     * @return \Illuminate\Http\Response
     */
    public function show(alumnado $alumnado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\alumnado  $alumnado
     * @return \Illuminate\Http\Response
     */
    public function edit(alumnado $alumnado)
    {
        return view('alumnado.form')
                     ->with('alumnado',$alumnado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\alumnado  $alumnado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, alumnado $alumnado)
    {
        $request->validate([
            'name'=> 'required|max:15',
            'carrera'=> 'required|max:20']);
            $alumnado->name = $request['name'];
            $alumnado->carrera = $request['carrera'];
            $alumnado->save();
        Session::flash('mensaje','Registro EDITADO con Exito');
        return redirect()->route('alumnado.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\alumnado  $alumnado
     * @return \Illuminate\Http\Response
     */
    public function destroy(alumnado $alumnado)
    {
        $alumnado->delete();
        Session::flash('mensaje','Registro Eliminado con Exito');
        return redirect()->route('alumnado.index');
    }
}
