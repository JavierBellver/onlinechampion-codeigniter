<!DOCTYPE html>
<html>

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listado de Torneos</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Login-Form-Clean.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Login-Form-Dark.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Registration-Form-with-Photo.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
</head>

<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand navbar-link" href="#"><strong>OnlineChampion</strong></a>
            <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="nav navbar-nav">
                <li role="presentation"><a href="<?php echo site_url('Backoffice/Juegos'); ?>">Juegos </a></li>
                <li class="active" role="presentation"><a href="<?php echo site_url('Backoffice/Torneos'); ?>">Torneos </a></li>
                <li role="presentation"><a href="<?php echo site_url('Backoffice/Ligas'); ?>">Ligas </a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container fluid">
    <table class="table table-striped">
        <tr>
            <th>Jugadores</th>
            <th>Temporadas</th>
            <th>Juego</th>
            <th>Primer Premio</th>
            <th>Segundo Premio</th>
            <th>Tercer Premio</th>
            <th>Actions</th>

        </tr>
        <?php foreach($Torneos as $t){ ?>
            <tr>
                <td><?php echo $t['numjugadores']; ?></td>
                <td><?php echo $t['numtemporadas']; ?></td>
                <td><?php echo $t['juego']; ?></td>
                <td><?php echo $t['1Premio']; ?></td>
                <td><?php echo $t['2Premio']; ?></td>
                <td><?php echo $t['3Premio']; ?></td>
                <td>
                    <a class="glyphicon glyphicon-pencil" href="<?php echo site_url('torneo/edit/'.$t['id']); ?>"></a> |
                    <a class="glyphicon glyphicon-trash "href="<?php echo site_url('torneo/remove/'.$t['id']); ?>"></a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <a class="glyphicon glyphicon-plus" href="<?php echo site_url('torneo/add'); ?>"></a>
</div>
</body>

</html>