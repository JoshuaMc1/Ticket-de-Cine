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

        $.ajax({
            type: "POST",
            url: "../src/php/ventas/asientosCine.php",
            data: {
                'idSala': id
            },
            cache: false,
            success: function (response) {
                $("#asientosSala").html(response);
            }
        });
    }
});

$("#dni").change(function () { 
    if($("#dni").val().length >= 13){
        alert("Ejecuntado consulta");
        // $.ajax({
        //     type: "POST",
        //     url: "",
        //     data: {
        //         'idSala': id
        //     },
        //     cache: false,
        //     success: function (response) {
        //         $("#asientosSala").html(response);
        //     }
        // });
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

    function validar(objeto) {
        if ($(objeto).val().length < 1) return true;
        else return false;
    }

    function alerta($message) {
        var wrapper = document.createElement('div');
        wrapper.innerHTML = '<div class="alert alert-danger fs-6 alert-dismissible" role="alert">' + $message + '</div>';
        alertPlaceholder.append(wrapper);
    }
    e.preventDefault();
    return false;
});

$("#dni").keydown(function (e) {
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

$("#edad").keydown(function (e) {
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
