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

    protected $color=['secondary','warning','success','danger','primary'];

    protected $texto=['Desconocido','En reparación','Ok','No ok','Primario'];


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
        
    }
    public function nuevo(Referencia $referencia)
    {        
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
        $accion=Accion::create($request->all());               
        $referencia=Referencia::find($request->referencia_id);
        $acciones=Referencia::find($request->referencia_id)->accions->sortBy('fechaEntrada');       
        $color=$this->color;
        $texto=$this->texto;
        return view('referencias.show',compact('referencia','acciones','color','texto'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Accion $accion)
    {        
        return view('acciones.show',compact('accion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Accion $accion)
    {      
        return view('acciones.edit',compact('accion'));      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accion $accion)
    {
        $accion->update($request->all());       
        return view('acciones.show',compact('accion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accion $accion)
    {        
        $referencia=Referencia::find($accion->referencia->id);      
        $color=$this->color;
        $texto=$this->texto;      
        $accion->delete();
        $acciones=$referencia->accions->sortBy('fechaEntrada');            
        return view('referencias.show',compact('referencia','acciones','color','texto'));
    }
    //importar excel
    function importar(Request $request){
        $referencia_id=$request->referencia_id;
        $file=$request->file('accionExcel');
        Excel::import(new AccionsImport($referencia_id),$file );       
        $referencia=Referencia::find($referencia_id);
        $acciones=Referencia::find($referencia_id)->accions->sortBy('fechaEntrada');
        $color=$this->color;
        $texto=$this->texto;      
        return view('referencias.show',compact('referencia','acciones','color','texto'));
    }

    function exportar($id){
        $referencia=Referencia::find($id);        
        return (new AccionsExport($referencia));
    }
}
