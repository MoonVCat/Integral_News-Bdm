const palClave = document.getElementById("claveWord");
const refresh = document.getElementById("limpiado1");
const Uno = document.getElementById("claveU");
const Dos = document.getElementById("claveD");
const Tres = document.getElementById("claveT");
const PKUno = document.getElementById("claveUPK");
const PKDos = document.getElementById("claveDPK");
const PKTres = document.getElementById("claveTPK");
const agregar = document.querySelector(".btn-add3");
const limpiar = document.querySelector(".btn-add4");

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

limpiar.addEventListener("click", (e) => {
  e.preventDefault();
  
  refresh.value = 1;
  Uno.value = "";
  Dos.value= "";
  Tres.value = "";
  PKUno.value = "";
  PKDos.value= "";
  PKTres.value = "";
  num=0;
  }
);