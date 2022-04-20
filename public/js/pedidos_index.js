const numero=document.getElementById('numero');
const referencia=document.getElementById('referencia');
const descripcion=document.getElementById('descripcion');
const maquina=document.getElementById('maquina');
const totalPiezas=document.getElementById('totalPiezas');
const tope=document.getElementById('tope');
const estado=document.getElementById('estado');
const fechaInicio=document.getElementById('fechaInicio');
const fechaFin=document.getElementById('fechaFin');

const sinFiltro=document.getElementById('fino');
const okFiltro=document.getElementById('fi2');
const prepFiltro=document.getElementById('fi3');
const prodFiltro=document.getElementById('fi1');
const repaFiltro=document.getElementById('fi4');
const descFiltro=document.getElementById('fi0');

/* const todos=document.getElementById('Todos');
const tapa=document.getElementById('Tapa');
const tarro=document.getElementById('Tarro');
const tapones=document.getElementById('Tapones');
const sealed=document.getElementById('Sealed');
const rejilla=document.getElementById('Rejilla');
const polvera=document.getElementById('Polvera');
const obturador=document.getElementById('Obturador');
const dispenser=document.getElementById('Dispenser');
const cubilete=document.getElementById('Cubilete');
const contra=document.getElementById('Contra obturador');
const botella=document.getElementById('Botella'); */

const btnSinFiltro=document.getElementById('btnSinFiltro');
const filter1=document.getElementById('filter');
// const filter2=document.getElementById('filter2');

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

const elementos=[numero,referencia,descripcion,maquina,totalPiezas,tope,estado,fechaInicio,fechaFin];
const filtros1=[sinFiltro,okFiltro,prepFiltro,prodFiltro,repaFiltro,descFiltro];
// const filtros2=[todos,tapa,tarro,tapones,sealed,rejilla,polvera,obturador,dispenser,cubilete,contra,botella];


addEventListener('load',()=>{
  elementos.forEach(element => {
    element.classList.remove('text-success');
    if(element.id==parametros.campo){
      element.classList.add('text-success');
      let icon=document.createElement('I');
      if(parametros.orden=='asc'){        
        icon.classList.add('fa-solid','fa-arrow-up-long');                
      }else{
        icon.classList.add('fa-solid','fa-arrow-down-long');
      }
      element.prepend(icon);
    }
  });
  (parametros.filtro1)? filter1.classList.add('text-success'): filter1.classList.remove('text-success');
   
  // (parametros.filtro2)? filter2.classList.add('text-success'): filter2.classList.remove('text-success');
    
  // (parametros.filtro1||parametros.filtro2) ? btnSinFiltro.removeAttribute('disabled') : btnSinFiltro.setAttribute('disabled','');
  
})

elementos.forEach(element=>{
  element.addEventListener('click',()=>{
    if(parametros.campo==element.id&&parametros.orden=='desc'){
      parametros.orden='asc';
    }else{
      parametros.campo=element.id;
      parametros.orden='desc';
    }
    construirURL();   
  })
})

filtros1.forEach(filt=>{
  filt.addEventListener('click',()=>{
    if(filt.id!='fino'){
      parametros.filtro1=filt.id.substring(2);
    }else{
      parametros.filtro1='';
    }
    construirURL();
  })
})

/* filtros2.forEach(filt=>{
  filt.addEventListener('click',()=>{
    if(filt.id!='Todos'){
      parametros.filtro2=filt.id;
    }else{
      parametros.filtro2='';
    }
    construirURL();
  })
}) */
btnSinFiltro.addEventListener('click',()=>{        
    parametros.filtro1='';   
    //parametros.filtro2='';   
    construirURL();
  })


const construirURL=()=>{
  if/* (parametros.busqueda&&parametros.filtro1&&parametros.filtro2){
    location=url+'?filtro1='+parametros.filtro1+'&filtro2='+parametros.filtro2+'&busqueda='+parametros.busqueda+'&campo='+parametros.campo+'&orden='+parametros.orden;
  }else if */ (parametros.busqueda&&parametros.filtro1){
    location=url+'?filtro1='+parametros.filtro1+'&busqueda='+parametros.busqueda+'&campo='+parametros.campo+'&orden='+parametros.orden;
  }/*else if (parametros.busqueda&&parametros.filtro2){
    location=url+'?filtro2='+parametros.filtro2+'&busqueda='+parametros.busqueda+'&campo='+parametros.campo+'&orden='+parametros.orden;
  } else if (parametros.filtro1&&parametros.filtro2){
    location=url+'?filtro1='+parametros.filtro1+'&filtro2='+parametros.filtro2+'&campo='+parametros.campo+'&orden='+parametros.orden;
  } */else if(parametros.busqueda){
    location=url+'?busqueda='+parametros.busqueda+'&campo='+parametros.campo+'&orden='+parametros.orden;
  }else if(parametros.filtro1){
    location=url+'?filtro1='+parametros.filtro1+'&campo='+parametros.campo+'&orden='+parametros.orden;
  }/* else if(parametros.filtro2){
    location=url+'?filtro2='+parametros.filtro2+'&campo='+parametros.campo+'&orden='+parametros.orden;
  } */else{
    location=url+'?campo='+parametros.campo+'&orden='+parametros.orden;
  }
  location.href();
}



  


