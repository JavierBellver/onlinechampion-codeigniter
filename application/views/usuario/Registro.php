<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
</head>

<body>
    <div class="register-photo">
        <div class="form-container">
            <div id="register-image"></div>
            

<div>
    <h3>¿Por qué deberia registrarme?</h3>
    <ul class="list-group col-sm-offset-1">
        <li>Participa en las ligas de cada juego</li>
        <li>Compite con la comunidad de usuarios</li>
        <li>Consigue premios jugando</li>
        <li>Monta tu propio equipo</li>
    </ul>  
</div>
            <p><?php echo validation_errors(); ?></p>
            <?php echo form_open('usuario/register'); ?>
                <img class="img-responsive" src="../assets/img/onlinechampion-facebook-image.png">
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="login" placeholder="Username">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
                </div><a href="../usuario/login" class="already">You already have an account? Login here.</a>
            <?php echo form_close(); ?>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>