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

    <div class="container col-lg-8">
        <h1 class="text-center">Introduce la siguiente informacion:</h1>

        <p id="pPrincipal" class="text-center">A continuacion encontraras un formulario para poder<br />
            hacer parte de la familia <strong><em>TuClaseEnLinea</em></strong>.<br />
            No olvides llenar todos los espacios para poder <br />
            ponernos en contacto contigo lo antes posible.
        </p>
    </div>


    <div class="card bg-light col-lg-8 container border" id="cardFondo"><br>
        <div class="card-header bg-secondary">
            <h2 class="text-center" style="color: white;">Formulario</h2>
        </div>

        <form class="form-group bg-light" action="<?php echo base_url(); ?>Registro/creaUsuario" method="post" name="registro" id="registro">

            <div class="card-body" id="cardbodyfondo">
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="nombreColegio" class="col-form-label">Nombre del Colegio: </label>
                        <input name="nombreColegio" id="nombreColegio" type="text" class="form-control form-control-sm" required>
                    </div>

                    <h3 class="text-center container">Diligencia los datos personales: </h3>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Identificación: </label>
                        <input type="text" name="identificacion" id="identificacion"  class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="nombres" class="col-form-label">Nombres:</label>
                        <input  name="nombres" id="nombres" type="text" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="apellidos"class="col-form-label">Apellidos:</label>
                        <input name="apellidos" id="apellidos" type="text" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Direccion: </label>
                        <input class="form-control form-control-sm" id="direccion" name="direccion" type="text" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Grado al que ingresa: </label>
                        <input class="form-control form-control-sm" id="grado" name="grado" type="number" min="1" max="11" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Correo: </label>
                        <input class="form-control form-control-sm" id="correo" name="correo" type="email" placeholder="nombre@hotmail.com" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Celular: </label>
                        <input class="form-control form-control-sm" id="celular" name="celular" type="tel" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Fecha de Nacimiento: </label>
                        <input class="form-control form-control-sm" id="fechadenacimiento" name="fechadenacimiento" type="date" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Genero: </label>
                        <select name="genero" id="genero" name="genero" class="form-control form-control-sm">
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                        </select>
                    </div>                    
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Tipo: </label>
                        <select name="tipo" id="tipo" class="form-control form-control-sm">
                            <option value="Estudiante">Estudiante</option>
                            <option value="Docente">Docente</option>
                            <option value="Administrador">Administrador</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Usuario: </label>
                        <input class="form-control form-control-sm" id="usuario" name="usuario" type="text" placeholder="usuario" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Contraseña: </label>
                        <input class="form-control form-control-sm" id="clave" name="clave" type="text" placeholder="clave" required>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-secondary float-right">
                <button class="btn btn-primary btn-sm pull-right" type="submit">Enviar</button>
            </div>

        </form>
    </div>    
</div>
<?php $this->load->view('includes/footer'); ?>
<script>
    $(document).ready(function() {
        $('#100').removeClass("active");
        $('#101').removeClass("active");
        $('#102').addClass("active");
        $('#103').removeClass("active");
        $('#104').removeClass("active");
        $('#105').removeClass("active");
        $('#106').removeClass("active");
    });
</script>