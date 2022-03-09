<?php

namespace App\Http\Controllers;

use App\Models\Referencia;
use Illuminate\Http\Request;
use App\Models\Accion;
use App\Models\Molde;
use App\Exports\ReferenciasExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;
use Exception;
use FilesystemIterator;

class ReferenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $referencias=Referencia::all()->sortByDesc('numero');               
        return view('referencias.index',compact('referencias'));
    }
    
    public function ok()
    {
     
        $referencias=Referencia::where('estado','success')->orderBy('numero','desc')->get();       
        return view('referencias.index',compact('referencias'));
    }

    public function nook()
    {
     
        $referencias=Referencia::where('estado','danger')->orderBy('numero','desc')->get();      
        return view('referencias.index',compact('referencias'));
    }

    public function reparando()
    {
     
        $referencias=Referencia::where('estado','warning')->orderBy('numero','desc')->get();        
        return view('referencias.index',compact('referencias'));
    }
    public function desconocido()
    {
        $referencias=Referencia::where('estado','light')->orderBy('numero','desc')->get();        
        return view('referencias.index',compact('referencias')); 
        
    }

    public function buscar(Request $request){
        $referencias=Referencia::where('numero','like','%'.$request->busqueda.'%')                    
                    ->orWhere('ubicacion','like','%'.$request->busqueda.'%')                    
                    ->orWhere('descripcion','like','%'.$request->busqueda.'%')
                    ->orderBy('numero','desc')
                    ->get();
        return view('referencias.index',compact('referencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $moldes=Molde::where('numero','like','%0')->get();
        return view('referencias.create',compact('moldes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(preg_match('#^[0-9]{8}$#',$request->molde_id)){
            $molde = Molde::firstOrCreate(
                ['numero' => $request->molde_id],
                ['descripcion'=>$request->descripcion,
                'comentario'=>'Registro creado automáticamente, por favor añada ubicaciónes y estado.',
                'versionActual'=>'0/0',
                'cavidades'=>$request->cavidades]
            );                        
            $referencia=new Referencia;        
            $referencia->molde_id=$molde->id;
            $referencia->numero=$request->numero;
            $referencia->descripcion=$request->descripcion;        
            $referencia->ubicacion=$request->ubicacion;            
            $referencia->estado=$request->estado;
            switch($request->estado){
                case "success": $referencia->estadoTexto="Ok";
                    break;
                case "danger": $referencia->estadoTexto="No ok";
                    break;            
                case "warning": $referencia->estadoTexto="En reparación";
                    break;
                default: $referencia->estadoTexto="Desconocido";
                    break;
            }       
            $referencia->cavidades=$request->cavidades;
            $referencia->comentario=$request->comentario;
            $referencia->save();
            $moldes=Molde::where('numero','like','%0')->get();
            return view('referencias.create',compact('moldes'));
        }else{
            return "no se guardo nada";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Referencia  $referencia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $referencia=Referencia::find($id);        
        $acciones=Referencia::find($id)->accions->sortBy('fechaEntrada'); 
        return view('referencias.show',compact('referencia','acciones'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Referencia  $referencia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $referencia=Referencia::find($id);
        $moldes=Molde::where('numero','like','%0')->get();
        return view('referencias.edit',compact('referencia','moldes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Referencia  $referencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if(preg_match('#^[0-9]{8}$#',$request->molde_id)){
            $molde = Molde::firstOrCreate(
                ['numero' => $request->molde_id],
                ['descripcion'=>$request->descripcion,
                'comentario'=>'Registro creado automáticamente, por favor añada ubicaciónes y estado.',
                'versionActual'=>'0/0',
                'cavidades'=>$request->cavidades]
            );                        
            $referencia=Referencia::find($id);        
            $referencia->molde_id=$molde->id;
            $referencia->numero=$request->numero;
            $referencia->descripcion=$request->descripcion;        
            $referencia->ubicacion=$request->ubicacion;            
            $referencia->estado=$request->estado;
            switch($request->estado){
                case "success": $referencia->estadoTexto="Ok";
                    break;
                case "danger": $referencia->estadoTexto="No ok";
                    break;            
                case "warning": $referencia->estadoTexto="En reparación";
                    break;
                default: $referencia->estadoTexto="Desconocido";
                    break;
            }       
            $referencia->cavidades=$request->cavidades;
            $referencia->comentario=$request->comentario;
            $referencia->save();
            $acciones=Referencia::find($id)->accions->sortBy('fechaEntrada');            
            return view('referencias.show',compact('referencia','acciones'));
        }else{
            return "no se guardo nada";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Referencia  $referencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referencia $referencia)
    {
        //
    }
    public function export(){
        return Excel::download(new ReferenciasExport,'tablareferencias.xlsx');
    }

    public function directorio(){       
        $directorios= new RecursiveDirectoryIterator('informes',FilesystemIterator::SKIP_DOTS);
        echo"<pre>";
        foreach ($directorios as $direc) {
            $dir= new RecursiveDirectoryIterator($direc->getPathname(), FilesystemIterator::SKIP_DOTS);
            echo $direc->getFilename()."<br>";
            foreach ($dir as $di) {
                if($di->isDir()){
                    $d= new RecursiveDirectoryIterator($di->getPathname(), FilesystemIterator::SKIP_DOTS);
                    foreach($d as $f){
                        if($f->isFile()&& substr($f->getFilename(),0,4)==$direc->getFilename()&&$f->getExtension()=='xlsx'){                            
                            $version=substr($f->getFilename(),4,4);
                            if(preg_match("#[0-9]{4}#",$version))$version=$version;
                            elseif(preg_match("#[_ ]{1}[0-9]{1}[_ ]{1}[0-9]{1}#",$version))$version=str_replace(["_"," "],"0",$version);
                            else $version="0000";
                            $version= $direc->getFilename().$version; 
                            echo $version."<br>";                                                             
                            try{
                                $referencia_id=$referencia_id=Referencia::select('id')->where('numero',$version)->get();
                                $referencia_id=$referencia_id[0]->id;
                                var_dump($referencia_id);
                            }catch(Exception $e){
                                $referencia=new Referencia;
                                $referencia->numero=$direc->getFilename();
                                $referencia->save();
                                $referencia_id=$referencia->getKey();
                            }                                                                                    
                            //Excel::import(new AccionsImport($referencia_id),$f->getFileInfo() );
                        }
                    }
                }elseif($di->isFile()&& substr($di->getFilename(),0,4)==$direc->getFilename()&&$di->getExtension()=='xlsx'){
                    $version=substr($di->getFilename(),4,4);
                    if(preg_match("#[0-9]{4}#",$version))$version=$version;
                    elseif(preg_match("#[_ ]{1}[0-9]{1}[_ ]{1}[0-9]{1}#",$version))$version=str_replace(["_"," "],"0",$version);
                    else $version="0000";
                    $version= $direc->getFilename().$version; 
                    echo $version."<br>";
                    try{
                        $referencia_id=$referencia_id=Referencia::select('id')->where('numero',$direc->getFilename())->get();
                        $referencia_id=$referencia_id[0]->id;
                        var_dump($referencia_id);
                    }catch(Exception $e){
                        $referencia=new Referencia;
                        $referencia->numero=$direc->getFilename();
                        $referencia->save();
                        $referencia_id=$referencia->getKey();
                    }                  
                    //Excel::import(new AccionsImport($referencia_id),$di->getFileInfo());
                }
                /* var_dump($d->getPathname());
                echo "es directorio: ".$d->isDir()." es archivo: ".$d->isFile()." extension: ".$d->getExtension()." fileinfo: ".$d->getFileInfo()."<br>"; */
            }            
        }
        echo"</pre>";
        //linkear en linux ln -s path1 path2
        //en windows mklink /j xxx\public\storage path2
        //C:\Users\Juan Gines\Desktop\archivospacasa\informes
    }
}
