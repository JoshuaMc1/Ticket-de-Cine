<?php 
    session_start();
    if(isset($_SESSION['id_user'])):
    include 'templates/header_admin.php'; 
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fas fa-store-alt"></i> Ventas de tickets</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                
            </div>
        </div>
    </div>
</main>
<?php 
    include 'templates/footer_admin.php'; 
    else:
        echo '
            <script>
                window.location = "../?status=E333";
            </script>
        ';
    endif;
?>