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

<body>
<div>
    <div class="container ">
        <div>
                <div class="container well margin">
                    <div class="row">
                        <div class="col-md-4">
                            <h3>Jugadores admitidos:</h3>
                            <h1><?php echo $torneo['numjugadores']; ?></h1>
                        </div>
                        <div class="col-md-4">
                            <h3>Categoria:</h3>
                            <label><?php echo $torneo['numtemporadas']; ?></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h3>Primer premio:</h3>
                            <h1><?php echo $torneo['1Premio']; ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h3>Segundo premio:</h3>
                            <h1><?php echo $torneo['2Premio']; ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <h3>Tercer premio:</h3>
                            <h1><?php echo $torneo['3Premio']; ?></h1>
                        </div>
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
