<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="shortcut icon" href="./src/img/entrada-de-cine.png" type="image/x-icon">
    <link rel="stylesheet" href="./src/style/login/style.css">
    <title>Login</title>
</head>

<body>
    <main>
        <section class="glass">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 mb-2 pt-4 mb-lg-1 pt-lg-3 pt-xl-5 mb-xl-2 text-center">
                        <h2 class="fw-bold title">Login</h2>
                    </div>
                </div>
                <div class="row mt-4 px-1 px-lg-3 pt-xl-3">
                    <form id="form" action="./src/php/login/check.php" method="POST" class="form">
                        <div class="col-lg-12">
                            <div id="msgNotificacion"></div>
                        </div>
                        <div class="col-lg-12 mt-5 mb-4 mt-lg-3 mb-lg-3">
                            <label class="form-label lbl">Usuario</label>
                            <input type="text" id="txtUser" name="txtUser" autocomplete="off" autofill="off" class="form-control inpt">
                        </div>
                        <div class="col-lg-12 mt-5 mb-4 mt-lg-5 mb-lg-3">
                            <label class="fomr-label lbl">Contraseña</label>
                            <input type="password" id="txtPassw" name="txtPassw" autocomplete="new-password" autofill="off" class="form-control inpt">
                        </div>
                        <div class="col-lg-12 mt-5 mb-3 mt-lg-5 pt-lg-4">
                            <div class="d-grid">
                                <button type="submit" class="btn btns">INICIAR SESIÓN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <div class="image1">
            <img src="./src/img/camara-de-cine.png">
        </div>
        <div class="image2">
            <img src="./src/img/cine.png">
        </div>
    </main>
    <?php
        if (isset($_GET['status'])) :
        $status = $_GET['status'];
        if ($status == "no") :
            echo "
                <script>
                    var alertPlaceholder = document.getElementById('msgNotificacion');
                    var e = '<div class=\"alert alert-danger fs-6 alert-dismissible\" role=\"alert\">Usuario o contraseña incorrectos<button type=\"button\" id=\"close\" class=\"btn-close btnClose\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>';
                    error();
                    
                    function error(){
                        $('#close').click();
                        var wrapper = document.createElement('div');
                        wrapper.innerHTML = e;
                        alertPlaceholder.append(wrapper);
                    }
                </script>
            ";
            elseif($status == "E333"):
                echo "
                <script>
                    var alertPlaceholder = document.getElementById('msgNotificacion');
                    var e = '<div class=\"alert alert-danger fs-6 alert-dismissible\" role=\"alert\">Necesita una sesión activa<button type=\"button\" id=\"close\" class=\"btn-close btnClose\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>';
                    error();
                                        
                    function error(){
                        $('#close').click();
                        var wrapper = document.createElement('div');
                        wrapper.innerHTML = e;
                        alertPlaceholder.append(wrapper);
                    }
                </script>
            ";
        endif;
        endif;
    ?>
    <script src="src/js/login/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>