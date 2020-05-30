<?php $this->load->view('includes/header'); ?>
<?php $usuario = $this->session->userdata('usuario'); ?>
<?php $nombre = $this->session->userdata('nombres'); ?>
<?php $identificacion = $this->session->userdata('identificacion'); ?>
<?php $tipo = $this->session->userdata('tipo'); ?>
<div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container col-lg-8">
        <h1 class="text-center">Revisa la siguiente informacion:</h1>

        <p id="pPrincipal" class="text-center">A continuacion encontraras un formulario de inscripción<br />
            de los usuarios resgistrados a <strong><em>TuClaseEnLinea</em></strong>.<br />
            No olvides validar que tipo de usuario y si su estado sera activo o inactivo. <br />
        </p>
    </div>

    <div class="card bg-light col-lg-8 container border" id="cardFondo"><br>
        <div class="card-header bg-secondary">
            <h2 class="text-center" style="color: white;">Formulario de registros</h2>
        </div>

        <form class="form-group bg-light" action="<?php echo base_url(); ?>Registro/editaUsuario" method="post" name="registro" id="registro">

            <div class="card-body" id="cardbodyfondo">
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="nombreColegio" class="col-form-label">Nombre del Colegio: </label>
                        <input name="nombreColegio" id="nombreColegio" type="text" class="form-control form-control-sm" value="<?php echo $LUsuario[0]['nombreColegio'] ?>" required readonly>
                    </div>

                    <h3 class="text-center container">Diligencia los datos personales: </h3>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Identificación: </label>
                        <input type="text" name="identificacion" id="identificacion" class="form-control form-control-sm" value="<?php echo $LUsuario[0]['identificacion'] ?>" required readonly>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nombres" class="col-form-label">Nombres:</label>
                        <input name="nombres" id="nombres" type="text" value="<?php echo $LUsuario[0]['nombres'] ?>" class="form-control form-control-sm" required readonly>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="apellidos" class="col-form-label">Apellidos:</label>
                        <input name="apellidos" id="apellidos" type="text" value="<?php echo $LUsuario[0]['apellidos'] ?>" class="form-control form-control-sm" required readonly>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Direccion: </label>
                        <input class="form-control form-control-sm" id="direccion" name="direccion" value="<?php echo $LUsuario[0]['direccion'] ?>" type="text" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Grado al que ingresa: </label>
                        <input class="form-control form-control-sm" id="grado" name="grado" type="number" min="1" max="11" value="<?php echo $LUsuario[0]['grado'] ?>" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Correo: </label>
                        <input class="form-control form-control-sm" id="correo" name="correo" type="email" placeholder="nombre@hotmail.com" value="<?php echo $LUsuario[0]['correo'] ?>" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Celular: </label>
                        <input class="form-control form-control-sm" id="telefono" name="telefono" type="tel" value="<?php echo $LUsuario[0]['telefono'] ?>" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Fecha de Nacimiento: </label>
                        <input class="form-control form-control-sm" id="fechadenacimiento" name="fechadenacimiento" type="date" value="<?php echo $LUsuario[0]['fechanacimiento'] ?>" required readonly>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Genero: </label>
                        <input class="form-control form-control-sm" id="genero" name="genero" type="text" value="<?php echo $LUsuario[0]['genero'] ?>" required readonly>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Tipo: </label>
                        <input class="form-control form-control-sm" id="tipo" name="tipo" type="text" value="<?php echo $LUsuario[0]['tipo'] ?>" required readonly>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Usuario: </label>
                        <input class="form-control form-control-sm" id="usuario" name="usuario" type="text" placeholder="usuario" value="<?php echo $LUsuario[0]['usuario'] ?>" required readonly>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Contraseña: </label>
                        <input class="form-control form-control-sm" id="clave" name="clave" type="text" placeholder="clave" value="<?php echo $LUsuario[0]['clave'] ?>" required>
                    </div>
                    <div class="form-group col-lg-12">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="estado1" name="estado" value="1" <?php if ($LUsuario[0]['estado'] == 1) : ?> checked="checked" <?php endif; ?>>activo
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="estado2" name="estado" value="0" <?php if ($LUsuario[0]['estado'] == 0) : ?> checked="checked" <?php endif; ?>>inactivo
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-secondary float-right">
                <button class="btn btn-primary btn-sm pull-right" type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>
</div>
<?php $this->load->view('includes/footer'); ?>
<script>
    $(document).ready(function() {
        $('#100').removeClass("active");
        $('#101').removeClass("active");
        $('#102').removeClass("active");
        $('#103').removeClass("active");
        $('#104').removeClass("active");
        $('#105').removeClass("active");
        $('#106').removeClass("active");
        $('#107').addClass("active");
    });
</script>