<?php

namespace App\Http\Controllers;

use App\Models\Produccion;
use App\Models\Pedido;
use Illuminate\Http\Request;

class ProduccionesController extends Controller
{

    protected $color=['light','warning','success','danger','primary'];

    protected $texto=['Sin empezar','En preparación','En producción','Parado avería','Acabado'];


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
        //
    }

    public function nuevo($id)
    {
        $pedido=Pedido::find($id);
        return view('producciones.create',compact('pedido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Produccion::where('pedido_id',$request->pedido_id)                
                ->where('fecha',$request->fecha)
                ->where('turno',$request->turno)
                ->doesntExist()){
            $produccion=$request->all();
            $resultado=Produccion::create($produccion);            
        }            
        $pedido=Pedido::find($request->pedido_id);
        $color=$this->color;
        $texto=$this->texto;
        $producciones=$pedido->producciones;
        $mermas=$pedido->mermas;
        return view('pedidos.show',compact('pedido','color','texto','producciones','mermas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produccion  $produccion
     * @return \Illuminate\Http\Response
     */
    public function show(Produccion $produccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produccion  $produccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Produccion $produccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produccion  $produccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produccion $produccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produccion  $produccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produccion $produccion)
    {
        //
    }
}
