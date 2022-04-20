<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Referencia;
use App\Models\Maquina;
use App\Models\Produccion;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $color=['secondary','warning','success','danger','primary'];

    protected $texto=['Sin empezar','En preparación','En producción','Parado avería','Acabado'];

    public function index(Request $request)
    {
        $campo=request('campo','numero');
        $orden=request('orden','desc');
        $filtro1=request('filtro1');
        $busqueda=request('busqueda');
        $producciones=Produccion::select('pedido_id',Pedido::raw('MAX(cantidad) as tope'))
                        ->groupBy('pedido_id');                        
        $pedidos=Pedido::select('pedidos.*','tope','maquinas.numero as maquina','referencias.numero as referencia','referencias.descripcion')
                        ->join('referencias','pedidos.referencia_id','=','referencias.id')
                        ->join('maquinas','pedidos.maquina_id','=','maquinas.id')
                        ->joinSub($producciones,'produccion', function ($join){
                            $join->on('pedidos.id','=','produccion.pedido_id');
                        })
                        ->orderBy($campo,$orden)->paginate(15);        
        
        
        $color=$this->color;
        $texto=$this->texto;
        $parametros=[
            'campo'=>$campo,
            'orden'=>$orden,
            'filtro1'=>$filtro1,
            'busqueda'=>$busqueda,
        ];                              
        return view('pedidos.index',compact('pedidos','color','texto','parametros'));
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
                ['descripcion'=>'Registro creado automáticamente, por favor termine de llenar la info.',
                 'estado' => false]
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
            return redirect()->route('pedidos.show',compact('pedido'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {        
        $color=$this->color;
        $texto=$this->texto;
        $producciones=$pedido->producciones()->orderBy('cantidad')->get();
        $mermas=$pedido->mermas()->orderBy('fecha')->get();
        return view('pedidos.show',compact('pedido','color','texto','producciones','mermas'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {       
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
    public function update(Request $request, Pedido $pedido)
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
            return redirect()->route('pedidos.show',compact('pedido'));        }
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
