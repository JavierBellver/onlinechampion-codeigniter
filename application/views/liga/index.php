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
		<h1>Ligas en activo</h1>
	</div>
	<div class="container">
		<?php foreach($liga as $l){ ?>
		<div class="row fondo">
			<div class="col-md-3">
				<h1><?php echo $l['nombre']; ?></h1>
				<h4>Jugadores: <label for="N.Jugadores"><?php echo $l['numjugadores']; ?></label></h4>
				<h4>Plazas: <label for="N.Plazas"><?php echo $l['numplazasdisp']; ?> </label></h4>
				<h4>Temporadas: <label for="N.Temporadas"><?php echo $l['numtemporadas']; ?> </label></h4>
				<h4><a class="btn btn-primary btn-lg" href="<?php echo site_url('juego/read/'.$l['idJuego']); ?>">Enlace al juego</a></h4>
				<h4><a class="btn btn-primary btn-lg" href="<?php echo site_url('torneo/read/'.$l['idRanking']); ?>">Enlace a ranking</a></h4>
				<header></header>
			</div>
			<div class="col-md-3"></div>
			<div class="col-md-3"></div>
			<div class="col-md-3"></div>
		</div>
		<?php } ?>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>