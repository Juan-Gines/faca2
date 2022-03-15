<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Referencia;
use App\Models\Maquina;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $color=['light','warning','success','danger','primary'];

    protected $texto=['Sin empezar','En preparación','En producción','Parado avería','Acabado'];

    public function index()
    {
        $color=$this->color;
        $texto=$this->texto;
        $pedidos=Pedido::all();
        return view('pedidos.index',compact('pedidos','color','texto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $referencias=Referencia::select('numero')->get();
        $maquinas=Maquina::select('numero')->get();
        return view('pedidos.create',compact('referencias','maquinas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(preg_match('#^[0-9]{8}$#',$request->referencia_id)&&preg_match('#^[0-9]{2}$#',$request->maquina_id)){
            $referencia = Referencia::firstOrCreate(
                ['numero' => $request->referencia_id],
                ['comentario'=>'Registro creado automáticamente, por favor termine de llenar la info.',                
                'cavidades'=>$request->cavidades]
            );
            $maquina = Maquina::firstOrCreate(
                ['numero' => $request->maquina_id],
                ['descripcion'=>'Registro creado automáticamente, por favor termine de llenar la info.']
            ); 
            $pedido=new Pedido;        
            $pedido->numero=$request->numero;
            $pedido->referencia_id=$referencia->id;
            $pedido->maquina_id=$maquina->id;
            $pedido->totalPiezas=$request->totalPiezas;
            $pedido->estado=$request->estado;
            $pedido->fechaInicio=$request->fechaInicio;
            $pedido->fechaFin=$request->fechaFin;
            $pedido->tiempoCiclo=$request->tiempoCiclo;
            $pedido->pesoPieza=$request->pesoPieza;
            $pedido->cavidades=$request->cavidades;
            $pedido->material=$request->material;
            $pedido->observaciones=$request->observaciones;
            $pedido->save();
            $referencias=Referencia::select('numero')->get();
            $maquinas=Maquina::select('numero')->get();
            return view('pedidos.create',compact('referencias','maquinas'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido=Pedido::find($id);
        $color=$this->color;
        $texto=$this->texto;
        $producciones=Pedido::find($id)->producciones;
        $mermas=Pedido::find($id)->mermas;
        return view('pedidos.show',compact('pedido','color','texto','producciones','mermas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $pedido=Pedido::find($id);
        $color=$this->color;
        $texto=$this->texto;
        $referencias=Referencia::select('numero')->get();
        $maquinas=Maquina::select('numero')->get();
        return view('pedidos.edit',compact('pedido','color','texto','referencias','maquinas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(preg_match('#^[0-9]{8}$#',$request->referencia_id)&&preg_match('#^[0-9]{2}$#',$request->maquina_id)){
            $referencia = Referencia::firstOrCreate(
                ['numero' => $request->referencia_id],
                ['comentario'=>'Registro creado automáticamente, por favor termine de llenar la info.',                
                'cavidades'=>$request->cavidades]
            );
            $maquina = Maquina::firstOrCreate(
                ['numero' => $request->maquina_id],
                ['descripcion'=>'Registro creado automáticamente, por favor termine de llenar la info.']
            ); 
            $pedido=Pedido::find($id);        
            $pedido->numero=$request->numero;
            $pedido->referencia_id=$referencia->id;
            $pedido->maquina_id=$maquina->id;
            $pedido->totalPiezas=$request->totalPiezas;
            $pedido->estado=$request->estado;
            $pedido->fechaInicio=$request->fechaInicio;
            $pedido->fechaFin=$request->fechaFin;
            $pedido->tiempoCiclo=$request->tiempoCiclo;
            $pedido->pesoPieza=$request->pesoPieza;
            $pedido->cavidades=$request->cavidades;
            $pedido->material=$request->material;
            $pedido->observaciones=$request->observaciones;
            $pedido->save();            
            $color=$this->color;
            $texto=$this->texto;
            $producciones=$pedido->producciones;
            $mermas=$pedido->mermas;
            return view('pedidos.show',compact('pedido','color','texto','producciones','mermas'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
