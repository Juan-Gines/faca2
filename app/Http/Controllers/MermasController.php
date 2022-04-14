<?php

namespace App\Http\Controllers;

use App\Models\Merma;
use App\Models\Pedido;
use Hamcrest\Core\IsNull;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\IsEmpty;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class MermasController extends Controller
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
        return view('mermas.create',compact('pedido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                
        if(Merma::where('pedido_id',$request->pedido_id)                
                ->where('fecha',$request->fecha)
                ->doesntExist()){
            $merma=$request->all();
            $resultado=Merma::create($merma);            
        }       
        $pedido=Pedido::find($request->pedido_id);
        $color=$this->color;
        $texto=$this->texto;        
        return redirect()->route('pedidos.show',compact('pedido'));    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merma  $merma
     * @return \Illuminate\Http\Response
     */
    public function show(Merma $merma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merma  $merma
     * @return \Illuminate\Http\Response
     */
    public function edit(Merma $merma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merma  $merma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Merma $merma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merma  $merma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merma $merma)
    {
        //
    }
}
