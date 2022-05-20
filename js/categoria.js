const ComboBox = document.getElementById("cbx_cate1");
const SeccionUno = document.getElementById("uno");
const SeccionDos = document.getElementById("dos");
const SeccionTres = document.getElementById("tres");
const addBtn = document.querySelector(".btn-add");
const refresh = document.querySelector(".btn-add2");

const palClave = document.getElementById("claveWord");
const Uno = document.getElementById("claveU");
const Dos = document.getElementById("claveD");
const Tres = document.getElementById("claveT");
const agregar = document.querySelector(".btn-add3");
const refresh1 = document.querySelector(".btn-add4");

const ul = document.querySelector("ul");
var numero=0;

addBtn.addEventListener("click", (a) => {
  a.preventDefault();
  const text = ComboBox.value;
  console.log(text);
  if (text !== ""){
    if(SeccionUno.value != "" && SeccionDos.value == ""){
      numero=1;
    }else if(SeccionUno.value != "" && SeccionDos.value != ""){
      numero=2;
    }
    if(numero==2){
      
      if( text!=SeccionUno.value&&text!=SeccionDos.value){
        if(SeccionTres.value == ""){
          SeccionTres.value = text;
        }
      numero=numero+1;
      }
      else{
        alert('Coloque una sección que no se haya puesto antes porfavor');
      }
      }
      if(numero==1){
        if( text!=SeccionUno.value){
          if(SeccionDos.value == ""){
            SeccionDos.value = text;
          }
        numero=numero+1;
        }
        else{
          alert('Coloque una sección que no se haya puesto antes porfavor');
        }
      }

    if(numero==0){
      if(SeccionUno.value == ""){
        SeccionUno.value = text;
      }
      numero=numero+1;

    }

    ComboBox.value = "";
 
  }
});

refresh.addEventListener("click", (a) => {
  a.preventDefault();
  
  SeccionUno.value = "";
  SeccionDos.value= "";
  SeccionTres.value = "";

  numero=0;
  }
);


const ol = document.querySelector("ol");
var num=0;

agregar.addEventListener("click", (e) => {
  e.preventDefault();
  const texto = palClave.value;
  console.log(texto);
  if (texto !== ""){
    if(Uno.value != "" && Dos.value == ""){
      num=1;
    }else if(Uno.value != "" && Dos.value != ""){
      num=2;
    }
    if(num==2){
      if(texto!=Uno.value && texto!=Dos.value){
        if(Tres.value == ""){
          Tres.value = texto;
        }
      num=num+1;
      }
      else{
        alert('Coloque una palabra clave que no se haya puesto antes porfavor');
      }
      }
      if(num==1){
        if( texto!= Uno.value){
          if(Dos.value == ""){
            Dos.value = texto;
          }
        num=num+1;
        }
        else{
          alert('Coloque una palabra clave que no se haya puesto antes porfavor');
        }
      }

    if(num==0){
      if(Uno.value == ""){
        Uno.value = texto;
      }
    num=num+1;
    }

    palClave.value = "";
 
  }
});

refresh1.addEventListener("click", (e) => {
  e.preventDefault();
  
  Uno.value = "";
  Dos.value= "";
  Tres.value = "";
  num=0;
  }
);