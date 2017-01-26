<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Rankings</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Login-Form-Clean.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Login-Form-Dark.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Registration-Form-with-Photo.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
</head>

<body class="Login">
<div>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">OnlineChampion</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="<?php echo site_url('home'); ?>">Home</a></li>
					<li><a href="<?php echo site_url('juego'); ?>">Juegos</a></li>
					<li ><a href="<?php echo site_url('torneo'); ?>">Torneos</a></li>
					<li><a href="<?php echo site_url('liga'); ?>">Ligas</a></li>
					<li class="active"><a href="<?php echo site_url('ranking'); ?>">Rankings</a></li>
					<?php if($this->session->has_userdata('usuario')) {?>
						<li><a href="<?php echo site_url('equipo'); ?>">Equipos</a></li>
						<li><a href="<?php echo site_url('usuario/read/'.$this->session->id); ?>">Mi perfil</a></li>
					<?php } ?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php if($this->session->has_userdata('usuario')) {?>
						<li><a href="<?php echo site_url('usuario/logout'); ?>">Logout</a></li>
					<?php } else {?>
						<li class="active"><a href="<?php echo site_url('usuario/login'); ?>">Login <span class="sr-only">(current)</span></a></li>
						<li><a href="<?php echo site_url('usuario/register'); ?>">Registrarse</a></li>
					<?php }?>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container fondo">
        <h1><b>Listado de rankings</b></h1>
			<?php foreach($ranking as $r){ ?>
                <div class="well">
                    <div class="row">
						<div class="col-md-4">
							<h3>Número de temporada</h3>
							<h1><?php echo $r['numRanking']; ?></h1>
						</div>
                        <div class="row">
							<a class="btn btn-lg btn-primary" href="<?php echo site_url('juego/read/'.$r['juego']); ?>">Enlace al juego</a>
							<a class="btn btn-lg btn-primary" href="<?php echo site_url('ranking/read/'.$r['id']); ?>">Detalles del ranking</a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>