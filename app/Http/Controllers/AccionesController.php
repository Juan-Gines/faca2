<?php

namespace App\Http\Controllers;

use App\Imports\AccionsImport;
use App\Exports\AccionsExport;
use Illuminate\Http\Request;

use App\Models\Accion;
use App\Models\Molde;
use App\Models\Referencia;
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
    public function create($id)
    {
        $referencia=Referencia::find($id);
        return view('acciones.create',compact('referencia'));
    }
    public function nuevo($id)
    {
        $referencia=Referencia::find($id);
        return view('acciones.create',compact('referencia'));
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
        $referencia=Referencia::find($request->referencia_id);
        $acciones=Referencia::find($request->referencia_id)->accions->sortBy('fechaEntrada');       
        
        return view('referencias.show',compact('referencia','acciones'));
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
        $accion=Accion::find($id);                
        $accion->referencia_id=$request->referencia_id;
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
        $referencia_id=$request->referencia_id;
        $file=$request->file('accionExcel');
        Excel::import(new AccionsImport($referencia_id),$file );       
        $referencia=Referencia::find($referencia_id);
        $acciones=Referencia::find($referencia_id)->accions->sortBy('fechaEntrada');      
        return view('referencias.show',compact('referencia','acciones'));
    }

    function exportar($id){
        $molde=Molde::find($id);        
        return (new AccionsExport($molde));
    }
}
