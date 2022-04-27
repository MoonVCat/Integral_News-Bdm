const ComboBox = document.getElementById("cbx_cate1");
const SeccionUno = document.getElementById("uno");
const SeccionDos = document.getElementById("dos");
const SeccionTres = document.getElementById("tres");
const PKSeccionUno = document.getElementById("unoPK");
const PKSeccionDos = document.getElementById("dosPK");
const PKSeccionTres = document.getElementById("tresPK");
const addBtn = document.querySelector(".btn-add");
const refresh = document.querySelector(".btn-add2");

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
  PKSeccionUno.value = "";
  PKSeccionDos.value= "";
  PKSeccionTres.value = "";
  numero=0;
  }
);