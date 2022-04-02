$("#sala").change(function () {
    var id = $(this).find(":selected").val();

    if (id != "") {
        $.ajax({
            type: "POST",
            url: "../src/php/ventas/peliculaSala.php",
            data: {
                'idSala': id
            },
            cache: false,
            success: function (response) {
                $("#pelSala").html(response);
            }
        });
    }

});

$("#pelSala").dblclick(function () {
    var idPel = $("input[name='pelicula']:checked").val();
    var id = $("#sala").find(":selected").val();

    if (idPel != "") {

        $.ajax({
            type: "POST",
            url: "../src/php/ventas/asientosCine.php",
            data: {
                'idSala': id,
                'idPelicula': idPel
            },
            cache: false,
            success: function (response) {
                $("#asientosSala").html(response);
            }
        });
    }
});

$("#formVentas").submit(function (e) {
    let alertPlaceholder = document.getElementById('mensajeError');
    let val1 = validar($("#dni"));
    let val2 = validar($("#nombre"));
    let val3 = validar($("#apellido"));
    let val4 = validar($("#edad"));
    let val5 = validar($("#genero"));
    let val6 = validar($("#sala"));
    let val7 = validarRadio();
    let val8 = validarCheck();

    if(val1 == false){
        alerta("Debe ingresar el DNI");
    }else if(val2 == false){
        alerta("Debe ingresar su nombre");
    }else if(val3 == false){
        alerta("Debe ingresar su apellido");
    }else if(val4 == false){
        alerta("Debe ingresar su edad");
    }else if(val5 == false){
        alerta("Debe seleccionar su genero");
    }else if(val6 == false){
        alerta("Debe seleccionar una sala");
    }else if(val7 == true){
        alerta("Debe seleccionar una pelicula");
    }else if(val8 == true){
        alerta("Debe seleccionar minimo un asiento");
    }else return;

    function validarCheck(){
        if($("input[name='asiento[]']:checkbox").is(':checked')){
            return false;
        }else return true;
    }

    function validarRadio(){
        if($("input[name='pelicula']:radio").is(":checked")){
            return false;
        }else return true;
    }

    function validar(objeto) {
        if ($(objeto).val().length < 1) return false;
        else return true;
    }

    function alerta($message) {
        var wrapper = document.createElement('div');
        wrapper.innerHTML = '<div class="alert alert-danger fs-6 alert-dismissible" role="alert">' + $message + '</div>';
        alertPlaceholder.append(wrapper);
    }
    e.preventDefault();
});

$("#dni").keypress(function (event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        var dni = $("#dni").val();
        $.ajax({
            type: "POST",
            url: "../src/php/ventas/consultaCliente.php",
            async: true,
            data: {
                'dni': dni
            },
            dataType: 'json',
            success: function (data) {

                if (data.data == 'noData') {
                    $('#idCliente').val("");
                    $('#nombre').val("");
                    $('#apellido').val("");
                    $('#edad').val("");
                    $("#genero").val("");
                } else {
                    $('#idCliente').val(data.id);
                    $('#nombre').val(data.nombre);
                    $('#apellido').val(data.apellido);
                    $('#edad').val(data.edad);
                    $("#genero").val(data.genero);
                }
            }
        });
    }
});

$("#dni").keypress(function (e) {
    var esc = e.keyCode || e.wich;
    var entrada = String.fromCharCode(esc);

    var validos = "0123456789";
    teclas = "8-37-38-46";
    var t_especial = false;


    for (var i in teclas) {
        if (esc == validos[i]) {
            t_especial = true;
        }
    }
    if (validos.indexOf(entrada) == -1 && !t_especial) {
        return false;
    }
});

$("#edad").keypress(function (e) {
    var esc = e.keyCode || e.wich;
    var entrada = String.fromCharCode(esc);

    var validos = "0123456789";
    teclas = "8-37-38-46";
    var t_especial = false;

    for (var i in teclas) {
        if (esc == validos[i]) {
            t_especial = true;
        }
    }
    if (validos.indexOf(entrada) == -1 && !t_especial) {
        return false;
    }
});

$("#nombre").keypress(function (e) {
    var key = e.keyCode || e.which;
    var tecla = String.fromCharCode(key).toLocaleLowerCase();
    var letras = " áéíóúabcdefghijklmnopqrstuvwxyz";

    if (letras.indexOf(tecla) == -1) {
        return false;
    }
});

$("#apellido").keypress(function (e) {
    var key = e.keyCode || e.which;
    var tecla = String.fromCharCode(key).toLocaleLowerCase();
    var letras = " áéíóúabcdefghijklmnopqrstuvwxyz";

    if (letras.indexOf(tecla) == -1) {
        return false;
    }
});
