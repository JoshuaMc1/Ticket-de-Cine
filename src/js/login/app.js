$("#form").submit(function (event) {
    let val1 = check($("#txtUser"));
    let val2 = check($("#txtPassw"));
    let alertPlaceholder = document.getElementById('msgNotificacion');
    
    if(val1 == false){
        alerta("Debe ingresar su usuario");
    }else if(val2 == false){
        alerta("Debe ingresar la contraseña");
    }else{
        $("#close").click();
        return;
    }

    function check(object) {
        if ($(object).val().length < 1) return false;
        else return true;
    }

    function alerta($message) {
        $('#close').click();
        var wrapper = document.createElement('div');
        wrapper.innerHTML = '<div class="alert alert-danger fs-6 alert-dismissible" role="alert">'+$message+'<button type="button" id="close" class="btn-close btnClose" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        alertPlaceholder.append(wrapper);
    }
    
    event.preventDefault();
});