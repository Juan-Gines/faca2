<?php

namespace App\Http\Controllers;

use App\Models\Maquina;
use Illuminate\Http\Request;

class MaquinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maquinas=Maquina::all();
        return view('maquinas.index',compact('maquinas'));
    }

    public function buscar(Request $request){
        $maquinas=Maquina::where('numero','like','%'.$request->busqueda.'%')                                       
                    ->orWhere('descripcion','like','%'.$request->busqueda.'%')
                    ->orderBy('numero','desc')
                    ->get();
        return view('maquinas.index',compact('maquinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maquinas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $maquina=new Maquina;
        $maquina->numero=$request->numero;
        $maquina->descripcion=$request->descripcion;
        $maquina->sala=$request->sala;
        $maquina->activa=false;
        $maquina->save();
        return view('maquinas.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maquina  $maquina
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maquina=Maquina::find($id);
        return view('maquinas.show', compact('maquina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maquina  $maquina
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maquina=Maquina::find($id);
        return view('maquinas.edit', compact('maquina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maquina  $maquina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $maquina=new Maquina;
        $maquina->numero=$request->numero;
        $maquina->descripcion=$request->descripcion;
        $maquina->sala=$request->sala;
        $maquina->save();
        return view('maquinas.show',compact('maquina'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maquina  $maquina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maquina $maquina)
    {
        //
    }
}
