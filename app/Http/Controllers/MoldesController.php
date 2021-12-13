<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Molde;

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
    
    public function listado($listado)
    {
        switch ($listado) {
        case 'desconocido':
            $moldes=Molde::where('estadoTexto','Desconocido')->get();
            break;
        case 'ok':
            $moldes=Molde::where('estadoTexto','Ok')->get();
            break;
        case 'reparacion':
            $moldes=Molde::where('estadoTexto','En reparación')->get();
            break;
        case 'nook':
            $moldes=Molde::where('estadoTexto','No ok')->get();
            break;
        default:
            $moldes=Molde::all();
            break;
        }
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
        
        return view('moldes.show',compact('molde'));
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
        return view('moldes.show',compact('molde'));
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
}
