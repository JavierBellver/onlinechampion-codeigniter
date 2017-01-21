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
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#"><strong>OnlineChampion</strong></a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav">
                    <li role="presentation"><a href="#">Juegos </a></li>
                    <li role="presentation"><a href="#">Torneos </a></li>
                    <li role="presentation"><a href="#">Ligas </a></li>
                </ul>
            </div>
        </div>
    </nav>
</head>
<body>
<div class="container fluid">
<table class="table table-striped">
    <tr>
        <th>Nombre</th>
        <th>Categoria</th>
        <th>Actions</th>
    </tr>
    <?php foreach($Juegos as $j){ ?>
        <tr>
            <td><?php echo $j['nombre']; ?></td>
            <td><?php echo $j['categoria']; ?></td>
            <td>
                <a class="glyphicon glyphicon-eye-open" href="<?php echo site_url('juego/read/'.$j['id']); ?>"></a>
                <a class="glyphicon glyphicon-pencil" href="<?php echo site_url('juego/edit/'.$j['id']); ?>"></a> |
                <a class="glyphicon glyphicon-trash "href="<?php echo site_url('juego/remove/'.$j['id']); ?>"></a>
            </td>
        </tr>
    <?php } ?>
</table>
    <a class="glyphicon glyphicon-plus" href="<?php echo site_url('juego/add'); ?>"></a>
</div>
</body>
