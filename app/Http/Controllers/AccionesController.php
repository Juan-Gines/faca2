<?php

namespace App\Http\Controllers;

use App\Imports\AccionsImport;
use Illuminate\Http\Request;

use App\Models\Accion;
use App\Models\Molde;
use Maatwebsite\Excel\Facades\Excel;

class AccionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('acciones.create',compact('id'));
    }
    public function nuevo($id)
    {
        $molde=Molde::find($id);
        return view('acciones.create',compact('molde'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $accion=$request->all();
        $resultado=Accion::create($accion);       
        $molde=Molde::find($request->molde_id);
        $acciones=Molde::find($request->molde_id)->accions->sortBy('fechaEntrada');       
        
        return view('moldes.show',compact('molde','acciones'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accion=Accion::find($id);        

        return view('acciones.show',compact('accion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accion=Accion::find($id);       
        return view('acciones.edit',compact('accion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $accion=accion::find($id);
        $acciones=accion::find($id)->accions;
        $accion->molde_id=$request->molde_id;
        $accion->tipo=$request->tipo;
        $accion->lugar=$request->lugar;
        $accion->descripcion=$request->descripcion;
        $accion->reparacion=$request->reparacion;
        $accion->fechaSalida=$request->fechaSalida;        
        $accion->fechaPrueba=$request->fechaPrueba;        
        $accion->fechaEntrada=$request->fechaEntrada;        
        $accion->ok=$request->ok;       
        $accion->save();       
        return view('acciones.show',compact('accion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //importar excel
    function importar(Request $request){
        $molde_id=$request->molde_id;
        $file=$request->file('accionExcel');
        Excel::import(new AccionsImport($molde_id),$file );       
        $molde=Molde::find($molde_id);
        $acciones=Molde::find($molde_id)->accions->sortBy('fechaEntrada');       
        
        return view('moldes.show',compact('molde','acciones'));
    }
}
