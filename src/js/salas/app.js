$("#formSalas").submit(function (e) { 
    let val1 = check($("#nombreSala"));
    let val2 = check($("#filas"));
    let val3 = check($("#asientos"));
    let alertPlaceholder = document.getElementById('msgNotificacion1');

    if(val1 == false){
        alerta("Debe ingresar el nombre de la sala");
    }else if(val2 == false){
        alerta("Debe ingresar las filas con las que contara la sala");
    }else if(val3 == false){
        alerta("Debe ingresar la cantidad de asientos por fila de la sala");
    }else{
        return;
    }

    function alerta($message) {
        var wrapper = document.createElement('div');
        wrapper.innerHTML = '<div class="alert alert-danger fs-6 alert-dismissible" role="alert">'+$message+'</div>';
        alertPlaceholder.append(wrapper);
    }

    e.preventDefault();
});

$("#formSalas2").submit(function (e) { 
    let val1 = check($("#sala"));
    let val2 = check($("#pelicula"));
    let val3 = check($("#fecha"));
    let val4 = check($("#hora"));
    let alertPlaceholder = document.getElementById('msgNotificacion2');
    
    if(val1 == false){
        alerta("Debe seleccionar una sala");
    }else if(val2 == false){
        alerta("Debe seleccionar una pelicula");
    }else if(val3 == false){
        alerta("Debe ingresar la fecha de emisión de la pelicula");
    }else if(val4 == false){
        alerta("Debe ingresar la hora en que se emitira la pelicula");
    }else{
        return;
    }

    function alerta($message) {
        var wrapper = document.createElement('div');
        wrapper.innerHTML = '<div class="alert alert-danger fs-6 alert-dismissible" role="alert">'+$message+'</div>';
        alertPlaceholder.append(wrapper);
    }

    e.preventDefault();
});

$("#formEdit").submit(function (e) { 
    let val1 = check($("#sala"));
    let val2 = check($("#pelicula"));
    let val3 = check($("#fecha"));
    let val4 = check($("#hora"));
    let alertPlaceholder = document.getElementById('msgNotificacion2');
    
    if(val1 == false){
        alerta("Debe seleccionar una sala");
    }else if(val2 == false){
        alerta("Debe seleccionar una pelicula");
    }else if(val3 == false){
        alerta("Debe ingresar la fecha de emisión de la pelicula");
    }else if(val4 == false){
        alerta("Debe ingresar la hora en que se emitira la pelicula");
    }else{
        return;
    }

    function alerta($message) {
        var wrapper = document.createElement('div');
        wrapper.innerHTML = '<div class="alert alert-danger fs-6 alert-dismissible" role="alert">'+$message+'</div>';
        alertPlaceholder.append(wrapper);
    }

    e.preventDefault();
});

function check(object) {
    if ($(object).val().length < 1) return false;
    else return true;
}

$("#filas").keypress(function (e) {
    var teclado = (e.which) ? e.which : e.keyCode;

    if (teclado == 8) {
        return true;
    } else if (teclado >= 48 && teclado <= 57) {
        return true;
    } else {
        return false;
    }
});

$("#asientos").keypress(function (e) {
    var teclado = (e.which) ? e.which : e.keyCode;

    if (teclado == 8) {
        return true;
    } else if (teclado >= 48 && teclado <= 57) {
        return true;
    } else {
        return false;
    }
});