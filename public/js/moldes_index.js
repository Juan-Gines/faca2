const numero=document.getElementById('numero');
const descripcion=document.getElementById('descripcion');
const ubicacionReal=document.getElementById('ubicacionReal');
const ubicacionActual=document.getElementById('ubicacionActual');
const versionActual=document.getElementById('versionActual');
const estado=document.getElementById('estado');
const cavidades=document.getElementById('cavidades');

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

const elementos=[numero,descripcion,ubicacionReal,ubicacionActual,versionActual,estado,cavidades];

addEventListener('load',()=>{
  elementos.forEach(element => {
    element.classList.remove('text-success');
    if(element.id==campo){
      element.classList.add('text-success');
      let icon=document.createElement('I');
      if(orden=='asc'){        
        icon.classList.add('fa-solid','fa-arrow-up-long');        
      }else{
        icon.classList.add('fa-solid','fa-arrow-down-long');
      }
      element.prepend(icon);
    }
  });  
})
numero.addEventListener('click',()=>{
  if(campo=='numero'&&orden=='desc'){
    orden='asc';
  }else{
    campo='numero';
    orden='desc';
  }
  location=url+'?campo='+campo+'&orden='+orden;
  location.href();   
})
descripcion.addEventListener('click',()=>{
  if(campo=='descripcion'&&orden=='desc'){
    orden='asc';
  }else{
    campo='descripcion';
    orden='desc';
  }
  location=url+'?campo='+campo+'&orden='+orden;
  location.href();   
})
ubicacionReal.addEventListener('click',()=>{
  if(campo=='ubicacionReal'&&orden=='desc'){
    orden='asc';
  }else{
    campo='ubicacionReal';
    orden='desc';
  }
  location=url+'?campo='+campo+'&orden='+orden;
  location.href();   
})
ubicacionActual.addEventListener('click',()=>{
  if(campo=='ubicacionActual'&&orden=='desc'){
    orden='asc';
  }else{
    campo='ubicacionActual';
    orden='desc';
  }
  location=url+'?campo='+campo+'&orden='+orden;
  location.href();   
})
versionActual.addEventListener('click',()=>{
  if(campo=='versionActual'&&orden=='desc'){
    orden='asc';
  }else{
    campo='versionActual';
    orden='desc';
  }
  location=url+'?campo='+campo+'&orden='+orden;
  location.href();   
})
estado.addEventListener('click',()=>{
  if(campo=='estado'&&orden=='desc'){
    orden='asc';
  }else{
    campo='estado';
    orden='desc';
  }
  location=url+'?campo='+campo+'&orden='+orden;
  location.href();   
})
cavidades.addEventListener('click',()=>{
  if(campo=='cavidades'&&orden=='desc'){
    orden='asc';
  }else{
    campo='cavidades';
    orden='desc';
  }
  location=url+'?campo='+campo+'&orden='+orden;
  location.href();   
})

  


