<?php

namespace App\Http\Controllers;

use App\Imports\AccionsImport;
use App\Imports\MoldesImport;
use App\Models\Accion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Molde;
use Directory;
use DirectoryIterator;
use Exception;
use FilesystemIterator;
use Illuminate\Contracts\Filesystem\Filesystem as FilesystemFilesystem;
use Maatwebsite\Excel\Facades\Excel;
use Nette\Utils\FileSystem;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;

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
        $acciones=Molde::find($id)->accions->sortBy('fechaEntrada');     
        
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
        $acciones=Molde::find($id)->accions->sortBy('fechaEntrada');
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
                            echo $f->getFileInfo()."<br>";                                                               
                            try{
                                $molde_id=$molde_id=Molde::select('id')->where('numero',$direc->getFilename())->get();
                                $molde_id=$molde_id[0]->id;
                                var_dump($molde_id);
                            }catch(Exception $e){
                                $molde=new Molde;
                                $molde->numero=$direc->getFilename();
                                $molde->save();
                                $molde_id=$molde->getKey();
                            }                                                                                    
                            Excel::import(new AccionsImport($molde_id),$f->getFileInfo() );
                        }
                    }
                }elseif($di->isFile()&& substr($di->getFilename(),0,4)==$direc->getFilename()&&$di->getExtension()=='xlsx'){
                    echo $di->getFileInfo()."<br>";
                    try{
                        $molde_id=$molde_id=Molde::select('id')->where('numero',$direc->getFilename())->get();
                        $molde_id=$molde_id[0]->id;
                        var_dump($molde_id);
                    }catch(Exception $e){
                        $molde=new Molde;
                        $molde->numero=$direc->getFilename();
                        $molde->save();
                        $molde_id=$molde->getKey();
                    }                  
                    Excel::import(new AccionsImport($molde_id),$di->getFileInfo());
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
