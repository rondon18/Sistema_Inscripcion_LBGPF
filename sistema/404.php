<?php

    session_start();

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>404 - DIRECTORIO O RUTA NO ENCONTRADA</title>
        <link rel="stylesheet" type="text/css" href="/Sistema_Inscripcion_LBGPF/sistema/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="/Sistema_Inscripcion_LBGPF/sistema/css/estilos.css" />
        <link rel="stylesheet" type="text/css" href="/Sistema_Inscripcion_LBGPF/sistema/css/all.min.css" />
        <link rel="icon" type="img/png" href="/Sistema_Inscripcion_LBGPF/sistema/img/icono.png">
    </head>

    <body>
        <main class="d-flex flex-column justify-content-between vh-100">
            <?php include('header.php'); ?>

            <div class="container mx-md-5 px-md-5 my-5 d-flex align-self-center justify-content-center">

                <div class="card shadow overflow-hidden rounded-3" style="max-width: 600px !important;">

                    <div class="card-body text-center p-4">

                        <div class="d-flex flex-column align-items-center justify-content-center">

                            <p class="display-1 fw-bold">404</p>

                            <p class="fs-4 fw-bold text-white badge bg-danger">
                                <i class="fas fa-lg fa-warning"></i>
                                <span class="mx-2">
                                    Directorio o ruta no encontrada
                                </span>
                                <i class="fas fa-lg fa-warning"></i>
                            </p>

                            <p class="fs-5 mx-5">El directorio o fichero solicitado no se encuentra en el servidor.</p>


                        </div>

                    </div>

                    <div class="card-footer d-flex flex-column align-items-center justify-content-center">
                        <a href="/Sistema_Inscripcion_LBGPF/sistema/" class="btn btn-primary">
                            <i class="fa-solid fa-lg me-1 fa-home"></i>
                            Volver al inicio
                        </a>
                    </div>

                </div>

            </div>
            <?php include('footer.php'); ?>
        </main>
    </body>
</html>