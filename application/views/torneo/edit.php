<?php echo validation_errors(); ?>

<?php echo form_open('torneo/edit/'.$torneo['id']); ?>


    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar torneo</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
    </head>

    <body>

    <div class="container">
        <h1><strong>Editar Torneo</strong></h1>
        <div class="well">
            <div class="form-horizontal">

                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Juego: </label>
                    <div class="col-md-5">
                        <select>
                            <?php foreach($Juegos as $j){ ?>
                                <option value="<?php echo $this->input->post('juego'); ?>"><?php echo $j['nombre']; ?></option>
                            <?php } ?>
                            <select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="numtemporadas">Temporadas: </label>
                    <div class="col-md-5">
                        <input type="number" name="numtemporadas" value="<?php echo ($this->input->post('numtemporadas') ? $this->input->post('numtemporadas') : $torneo['numtemporadas']); ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="numjugadores">Jugadores : </label>
                    <div class="col-md-5">
                        <input type="number" name="numjugadores" value="<?php echo ($this->input->post('numjugadores') ? $this->input->post('numjugadores') : $torneo['numjugadores']); ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Primer premio : </label>
                    <div class="col-md-5">
                        <input type="text" name="numtemporadas" value="<?php echo ($this->input->post('1Premio') ? $this->input->post('numtemporadas') : $torneo['1Premio']); ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Segundo premio : </label>
                    <div class="col-md-5">
                        <input type="text" name="numtemporadas" value="<?php echo ($this->input->post('2Premio') ? $this->input->post('numtemporadas') : $torneo['2Premio']); ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="pwd">Tercer premio : </label>
                    <div class="col-md-5">
                        <input type="text" name="numtemporadas" value="<?php echo ($this->input->post('3Premio') ? $this->input->post('numtemporadas') : $torneo['3Premio']); ?>" />
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