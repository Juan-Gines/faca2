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
    public function index(Request $request)
    {
        $campo=request('campo','id'); 
        $orden=request('orden','asc');
        $busqueda=request('busqueda');
        $filtro=request('filtro');
        $busqueda=request('busqueda');
        
        if (request('filtro')=='inactiva') {
            $maquinas=Maquina::where('activa',false)
                        ->where(function($query)use($busqueda){                                       
                            $query->where('numero','like','%'.$busqueda.'%')
                            ->orWhere('descripcion','like','%'.$busqueda.'%');
                        })
                        ->orderBy($campo,$orden)
                        ->get();
        } else if (request('filtro')=='activa'){
            $maquinas=Maquina::where('activa',true)
                        ->where(function($query)use($busqueda){                                       
                            $query->where('numero','like','%'.$busqueda.'%')
                            ->orWhere('descripcion','like','%'.$busqueda.'%');
                        })
                        ->orderBy($campo,$orden)
                        ->get();
        }else {            
            $maquinas=Maquina::where('numero','like','%'.$busqueda.'%')
                        ->orWhere('descripcion','like','%'.$busqueda.'%')
                        ->orderBy($campo,$orden)
                        ->get();
        } 
    

        $parametros=[            
            'campo'=>$campo,
            'orden'=>$orden,
            'busqueda'=>$busqueda,
            'filtro'=>$filtro,            
        ];
       
        return view('maquinas.index',compact('maquinas','parametros'));
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
        return redirect()->route('maquinas.show',compact('maquina'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maquina  $maquina
     * @return \Illuminate\Http\Response
     */
    public function show(Maquina $maquina)
    {        
        return view('maquinas.show', compact('maquina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maquina  $maquina
     * @return \Illuminate\Http\Response
     */
    public function edit(Maquina $maquina)
    {        
        return view('maquinas.edit', compact('maquina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maquina  $maquina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maquina $maquina)
    {
        $maquina->update($request->all());        
        return redirect()->route('maquinas.show',compact('maquina'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maquina  $maquina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maquina $maquina)
    {
        $maquina->delete();
        return redirect()->route('maquinas.index');
    }
}
