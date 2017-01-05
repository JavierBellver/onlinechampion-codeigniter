<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de juego</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../../../assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="../../../assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="../../../assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="../../../assets/css/styles.css">
</head>

<body class="Login">
<div>
    <div class="container ">
        <div>
                <div class="container well margin">
                    <div>
                        <h1><?php echo $juego['nombre']; ?></h1>
                    </div>

                    <div>

                        <h3><?php echo $juego['categoria']; ?></h3>
                    </div>

                    <div>
                        <h3>Descripción: </h3>
                        <p><?php echo $juego['descripcion']; ?></p>
                    </div>
                </div>
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
