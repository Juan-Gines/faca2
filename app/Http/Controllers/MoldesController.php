<?php

namespace App\Http\Controllers;

use App\Exports\MoldesExport;
use App\Http\Requests\StoreMolde;
use App\Imports\AccionsImport;
use App\Imports\MoldesImport;
use App\Imports\ReferenciasImports;
use App\Imports\VersionsImport;
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

    public $color=['secondary','warning','success','danger','primary'];

    public $texto=['Desconocido','En reparación','Ok','No ok','Primario'];     
    public function index(Request $request)
    {
        $campo=request('campo','numero'); 
        $orden=request('orden','desc');
        $busqueda=request('busqueda');
        $filtro=request('filtro');        
        if(request('busqueda')&& (request('filtro')||request('filtro')==='0')){
            $moldes=Molde::where('estado',$filtro)
                ->where(function($query)use($busqueda){
                    $query->where('numero','like','%'.$busqueda.'%')                    
                    ->orWhere('ubicacionReal','like','%'.$busqueda.'%')
                    ->orWhere('ubicacionActual','like','%'.$busqueda.'%')
                    ->orWhere('descripcion','like','%'.$busqueda.'%');
                })
                
                ->orderBy($campo,$orden)
                ->paginate(15);
        }elseif(request('busqueda')){
            $moldes=Molde::where('numero','like','%'.$busqueda.'%')                    
            ->orWhere('ubicacionReal','like','%'.$busqueda.'%')
            ->orWhere('ubicacionActual','like','%'.$busqueda.'%')
            ->orWhere('descripcion','like','%'.$busqueda.'%')
            ->orderBy($campo,$orden)
            ->paginate(15);
        }elseif(request('filtro')||request('filtro')==='0'){
            $moldes=Molde::where('estado',$filtro)->orderBy($campo,$orden)->paginate(15);
        }else{    
            $moldes=Molde::orderBy($campo,$orden)->paginate(15);
        };
        $color=$this->color;
        $texto=$this->texto;
        $parametros=[            
            'campo'=>$campo,
            'orden'=>$orden,
            'busqueda'=>$busqueda,
            'filtro'=>$filtro
        ];
                       
        return view('moldes.index',compact('moldes','parametros','color','texto'));
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
    public function store(StoreMolde $request)
    {        
        $molde=Molde::create($request->all());               
        return redirect()->route('moldes.show',compact('molde'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Molde $molde)
    {      
        $color=$this->color;               
        $texto=$this->texto;           
        return view('moldes.show',compact('molde','color','texto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Molde $molde)
    {
        $color=$this->color;               
        $texto=$this->texto;        
        return view('moldes.edit',compact('molde','color','texto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Molde $molde)
    {
        $molde->update($request->all());               
        return redirect()->route('moldes.show',compact('molde'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Molde $molde)
    {
        $molde->delete();        
        return redirect()->route('moldes.index');
    }

    /*Importar de excel*/

    public function import()
    {
        Excel::import(new MoldesImport,'listado/tablamoldes.xlsx');
        Excel::import(new ReferenciasImports,'listado/tablareferencias.xlsx');
    }

    public function directorio(){       
        /* $directorios= new RecursiveDirectoryIterator('informes',FilesystemIterator::SKIP_DOTS);
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
                            //Excel::import(new AccionsImport($molde_id),$f->getFileInfo() );
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
                    //Excel::import(new AccionsImport($molde_id),$di->getFileInfo());
                }
                /* var_dump($d->getPathname());
                echo "es directorio: ".$d->isDir()." es archivo: ".$d->isFile()." extension: ".$d->getExtension()." fileinfo: ".$d->getFileInfo()."<br>"; */
            //}            
        //}
        //echo"</pre>";
        //linkear en linux ln -s path1 path2
        //en windows mklink /j xxx\public\storage path2
        //C:\Users\Juan Gines\Desktop\archivospacasa\informes*/
    } 
    
    public function export(){
        return Excel::download(new MoldesExport,'tablamoldes.xlsx');
    }
}
