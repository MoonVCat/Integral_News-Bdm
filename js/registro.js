//Solo validar contraseña y fecha
const formularioRegistro = document.getElementById('Registro');
const inputs = document.querySelectorAll('input');

var Pass1_Error = new Boolean(true);

function Letra(e) { //FUNCIÓN PARA VALIDAR SÓLO LETRAS (NOMBRE Y APELLIDO)
    key = e.keyCode || e.which;  //Agarra el evento cuando presiono el teclado
    tecla = String.fromCharCode(key).toString();
    letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnopqrstuvwxyzáéíóúñÑ";

    especiales = [8, 13, 32, 164, 165];
    tecla_especial = false;
    for (var i in especiales) {
        if (key === especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) === -1 && !tecla_especial) { //SI PONEMOS UN NÚMERO

        alert("Ingresar solo letras");

        return false;
    }
}

function Numero(e) { //FUNCIÓN PARA VALIDAR SÓLO Numeros
    key = e.keyCode || e.which;  //Agarra el evento cuando presiono el teclado
    tecla = String.fromCharCode(key).toString();
    Numeros = "1234567890";

    especiales = [8, 13, 32, 164, 165];
    tecla_especial = false;
    for (var i in especiales) {
        if (key === especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (Numeros.indexOf(tecla) === -1 && !tecla_especial) { //SI PONEMOS UNa letra

        alert("Ingresar solo numeros");

        return false;
    }
}



/* function verificarPasswords(e){


    var strongRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;

    if(e.value.match(strongRegex)){
        return true;
    }
    else {
        alert("La contraseña debe de incluir 8 caracteres, y debe incluir una mayúscula, un carácter especial, y un número.");

        return false;
    }

} */











