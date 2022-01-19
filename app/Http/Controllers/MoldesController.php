<?php

namespace App\Http\Controllers;

use App\Imports\MoldesImport;
use App\Models\Accion;
use Illuminate\Http\Request;

use App\Models\Molde;
use Maatwebsite\Excel\Facades\Excel;

class MoldesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $moldes=Molde::all()->sortBy('numero');       
        return view('moldes.index',compact('moldes'));
    }
    
    public function ok()
    {
     
        $moldes=Molde::where('estado','success')->orderBy('numero')->get();       
        return view('moldes.index',compact('moldes'));
    }

    public function nook()
    {
     
        $moldes=Molde::where('estado','danger')->orderBy('numero')->get();      
        return view('moldes.index',compact('moldes'));
    }

    public function reparando()
    {
     
        $moldes=Molde::where('estado','warning')->orderBy('numero')->get();       
        return view('moldes.index',compact('moldes'));
    }
    public function desconocido()
    {
        $moldes=Molde::where('estado','light')->orderBy('numero')->get();       
        return view('moldes.index',compact('moldes')); 
        
    }

    public function buscar(Request $request){
        $moldes=Molde::where('numero','like','%'.$request->busqueda.'%')
                    ->orWhere('nombre','like','%'.$request->busqueda.'%')
                    ->orWhere('ubicacionReal','like','%'.$request->busqueda.'%')
                    ->orWhere('ubicacionActual','like','%'.$request->busqueda.'%')
                    ->orderBy('numero')
                    ->get();
        return view('moldes.index',compact('moldes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('moldes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $molde=new Molde;
        $molde->numero=$request->numero;
        $molde->nombre=$request->nombre;
        $molde->ubicacionReal=$request->ubicacionReal;
        $molde->ubicacionActual=$request->ubicacionActual;
        $molde->versionActual=$request->versionActual;
        $molde->estado=$request->estado;
        switch($request->estado){
            case "success": $molde->estadoTexto="Ok";
                break;
            case "danger": $molde->estadoTexto="No ok";
                break;            
            case "warning": $molde->estadoTexto="En reparación";
                break;
            default: $molde->estadoTexto="Desconocido";
                break;
        }       
        $molde->cavidades=$request->cavidades;
        $molde->comentario=$request->comentario;
        $molde->save();
        return view('moldes.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $molde=Molde::find($id);
        $acciones=Molde::find($id)->accions;       
        
        return view('moldes.show',compact('molde','acciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {       
        $molde=Molde::find($id);
        
        
        return view('moldes.edit',compact('molde'));
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
        $molde=Molde::find($id);
        $acciones=Molde::find($id)->accions;
        $molde->numero=$request->numero;
        $molde->nombre=$request->nombre;
        $molde->ubicacionReal=$request->ubicacionReal;
        $molde->ubicacionActual=$request->ubicacionActual;
        $molde->versionActual=$request->versionActual;
        $molde->estado=$request->estado;        
        switch($request->estado){
            case "success": $molde->estadoTexto="Ok";
                break;
            case "danger": $molde->estadoTexto="No ok";
                break;            
            case "warning": $molde->estadoTexto="En reparación";
                break;
            default: $molde->estadoTexto="Desconocido";
                break;
        }
        $molde->cavidades=$request->cavidades;
        $molde->comentario=$request->comentario;
        $molde->save();       
        return view('moldes.show',compact('molde','acciones'));
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

    /*Importar de excel*/

    public function import()
    {
        Excel::import(new MoldesImport,'listado/listado_moldes.xlsx');        
    }
    
}
