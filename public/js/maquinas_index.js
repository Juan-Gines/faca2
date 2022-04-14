
const numero=document.getElementById('numero');
const descripcion=document.getElementById('descripcion');
const sala=document.getElementById('sala');
const estado=document.getElementById('estado');

const sinFiltro=document.getElementById('todos');
const activa=document.getElementById('activa');
const inactiva=document.getElementById('inactiva');

const filter=document.getElementById('filter');
// const btnSinFiltro=document.getElementById('btnSinFiltro');

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

const elementos=[numero,descripcion,sala,estado];
const filtros=[activa,inactiva];
const noFiltros=[sinFiltro,btnSinFiltro];

console.log(filtros)

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
  if(parametros.filtro||parametros.filtro===false){
    filter.classList.add('text-success');
    btnSinFiltro.removeAttribute('disabled');
  }else{
    filter.classList.remove('text-success');
    btnSinFiltro.setAttribute('disabled','');
  };     
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

filtros.forEach(filt=>{
  filt.addEventListener('click',()=>{        
      parametros.filtro=filt.id;       
    construirURL();
  })
})

noFiltros.forEach(filt=>{
  filt.addEventListener('click',()=>{        
      parametros.filtro='';   
    construirURL();
  })
})

const construirURL=()=>{
  if(parametros.busqueda&&parametros.filtro){
    location=url+'?filtro='+parametros.filtro+'&busqueda='+parametros.busqueda+'&campo='+parametros.campo+'&orden='+parametros.orden;
  }else if(parametros.busqueda){
    location=url+'?busqueda='+parametros.busqueda+'&campo='+parametros.campo+'&orden='+parametros.orden;
  }else if(parametros.filtro){
    location=url+'?filtro='+parametros.filtro+'&campo='+parametros.campo+'&orden='+parametros.orden;
  }else{
    location=url+'?campo='+parametros.campo+'&orden='+parametros.orden;
  }
  location.href();
}



  


