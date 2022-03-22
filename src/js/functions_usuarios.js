 $('#tableUsuarios').dataTable(); 
 function agregar() {
     alert("Hola")
    var txtUsuario = $("#txtUsuario").val();
    var clave = $("#txtClave").val();
    crearCodigo();
    if (usuario == "" || clave == "") {
        error();
    } else {
      //buscar en la fila
      if ($('#tableUsuarios tr:contains("' + txtUsuario +'")').length > 0 ) {
        swal({
            title:'Error!',
            text:'El usuario ya existe.',
            icon:'error'
        });
      } else {
      
            correcto();

           
      }
     
    }
  }

    function correcto(){
        swal({
            title:'Registro',
            text:'Datos agregados correctamente.',
            icon:'success'
        });
    }

    function error(){
        swal({
            title:'Error!',
            text:'Todos los campos son obligarios.',
            icon:'error'
        });
    }