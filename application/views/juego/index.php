<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
        <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
        <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>

    <body class="Login">
    <div></div>
    <div>
        <div class="container fondo">
            <h1 class ="weel">Listado de juegos</h1>
            <div class="row">
                <?php foreach($juego as $j){ ?>
                <div class="container well">
                    <div class="col-md-3">
                        <h1><?php echo $j['nombre']; ?></h1>
                    </div>
                    <div class="col-md-3">
                        <h3>Categoria:</h3>
                        <label><?php echo $j['categoria']; ?></label>
                    </div>
                    <div class="col-md-offset-2 col-md-3">
                        <a class="btn btn-primary btn-lg" href="<?php echo site_url('juego/read/'.$j['id']); ?>">Detalle</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div></div>
    <div></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
    </html>

            <!--<a href="<?php echo site_url('juego/edit/'.$j['id']); ?>">Edit</a> |
            <a href="<?php echo site_url('juego/remove/'.$j['id']); ?>">Delete</a> --->
