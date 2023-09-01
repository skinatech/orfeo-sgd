function validaAgendar(argumento) {
    var f = new Date();
    fecha_hoy = document.write(f.getFullYear() + " - " + (f.getMonth() +1)+ " - "+f.getDate());
    fecha = document.form1.elements['fechaAgenda'].value;

    if (fecha == "" && argumento == "SI") {
        alert("Debe suministrar la fecha de agenda");
        return false;
    }
    if (!fechas_comp_ymd(fecha_hoy, fecha) && argumento == "SI") {
        alert("La fecha de agenda debe ser mayor que la fecha de hoy");
        return false;
    }
    return true;
}