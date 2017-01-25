<?php echo validation_errors(); ?>

<?php echo form_open('liga/edit/'.$liga['id']); ?>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Liga</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
    </head>

    <body>

    <div class="container">
        <h1><strong>Nueva Liga</strong></h1>
        <div class="well">
            <div class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Nombre : </label>
                    <div class="col-md-5">
                        <input type="text" name="nombre" value="<?php echo ($this->input->post('nombre') ? $this->input->post('nombre') : $liga['nombre']); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Juego: </label>
                    <div class="col-md-5">
                        <select value="<?php echo $this->input->post('idJuego'); ?>" >
                            <?php foreach($Juegos as $j){ ?>
                                <option value=.$j['id']><?php echo $j['nombre']; ?></option>
                            <?php } ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Ranking: </label>
                    <div class="col-md-5">
                        <select value="<?php echo $this->input->post('idRanking'); ?>" >
                            <?php foreach($Rankings as $r){ ?>
                                <option value=.$r['id']><?php echo $r['id']; ?></option>
                            <?php } ?></select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Jugadores : </label>
                    <div class="col-md-5">
                        <input type="number" name="numjugadores" value="<?php echo ($this->input->post('numjugadores') ? $this->input->post('numjugadores') : $liga['numjugadores']); ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Temporadas: </label>
                    <div class="col-md-5">
                        <input type="number" name="numtemporadas" value="<?php echo ($this->input->post('numtemporadas') ? $this->input->post('numtemporadas') : $liga['numtemporadas']); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Plazas : </label>
                    <div class="col-md-5">
                        <input type="number" name="numplazasdisp" value="<?php echo ($this->input->post('numplazasdisp') ? $this->input->post('numplazasdisp') : $liga['numplazasdisp']); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>

    </html>
<?php echo form_close(); ?>