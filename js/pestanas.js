function validaAgendar(argumento) {
    var f = new Date();
    fecha_hoy = f.getFullYear() + "-" + ("0" + (f.getMonth() + 1)).slice(-2) + "-" + ("0" + f.getDate()).slice(-2);
    fecha = document.getElementById('fechaAgenda').value;
    
    if (fecha <= fecha_hoy) {
        alert("La fecha seleccionada no puede ser inferior o igual a la fecha actual");
        return false;
    }

    if (fecha == "" && argumento == "SI") {
        alert("Debe suministrar la fecha de agenda");
        return false;
    }

    return true;
}

function changedepesel(enviara) {

    document.form1.codTx.value = enviara;
    document.getElementById('depsel').style.display = 'none';
    document.getElementById('carpper').style.display = 'none';
    document.getElementById('depsel8').style.display = 'none';
    document.getElementById('Enviar').style.display = 'none';

    if (enviara == 10) {
        document.getElementById('depsel').style.display = 'none';
        document.getElementById('carpper').style.display = '';
        document.getElementById('carpper').focus();
        document.getElementById('depsel8').style.display = 'none';
        document.getElementById('Enviar').style.display = '';
    }

    if (enviara == 13) {
        document.getElementById('depsel').style.display = 'none';
        document.getElementById('depsel8').style.display = 'none';
        document.getElementById('carpper').style.display = 'none';
        envioTx();
    }

    if (enviara == 16) {
        document.getElementById('depsel').style.display = 'none';
        document.getElementById('depsel8').style.display = 'none';
        document.getElementById('carpper').style.display = 'none';
        envioTx();
    }

    //Devolver
    if (enviara == 12) {
        envioTx();
    }

    //by skina trd multiple 
    if (enviara == 61) {
        document.getElementById('depsel').style.display = 'none';
        document.getElementById('depsel8').style.display = 'none';
        document.getElementById('carpper').style.display = 'none';
        envioTx();
    }

    //by skina exp multiple 
    if (enviara == 62) {
        document.getElementById('depsel').style.display = 'none';
        document.getElementById('depsel8').style.display = 'none';
        document.getElementById('carpper').style.display = 'none';
        envioTx();
    }

    if (enviara == 11) {
        //document.getElementById('Enviar').value = "ARCHIVAR";
    }

    if (enviara == 10) {
        document.getElementById('depsel').style.display = 'none';
        document.getElementById('carpper').style.display = '';
        document.getElementById('depsel8').style.display = 'none';
    }

    //Reasignar
    if (enviara == 9) {
        document.getElementById('depsel').style.display = '';
        document.getElementById('depsel').focus();
        document.getElementById('carpper').style.display = 'none';
        document.getElementById('depsel8').style.display = 'none';
        document.getElementById('Enviar').style.display = '';
    }

//    //Visto bueno
    if (enviara == 14) {
        document.getElementById('depsel').style.display = '';
        document.getElementById('depsel').focus();
        document.getElementById('carpper').style.display = 'none';
        document.getElementById('depsel8').style.display = 'none';
        document.getElementById('Enviar').style.display = '';
    }


    //Informar
    if (enviara == 8) {
        document.getElementById('depsel').style.display = 'none';
        document.getElementById('depsel8').style.display = '';
        document.getElementById('depsel8').focus();
        document.getElementById('carpper').style.display = 'none';
        document.getElementById('Enviar').style.display = '';
    }
}