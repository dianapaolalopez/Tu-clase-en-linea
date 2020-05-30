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
    <div class="card bg-light col-lg-8 container border" id="cardFondo"><br>
        <div class="card-header bg-secondary">
            <h2 class="text-center" style="color: white;">Formulario para materias y grados</h2>
        </div>
        <form class="form-group bg-light" action="<?php echo base_url(); ?>Materias/creaMateria" method="post" name="registroM" id="registroM">

            <div class="card-body" id="cardbodyfondo">
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="materia" class="col-form-label">Materia: </label>
                        <input type="text" name="materia" id="materia" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="grado" class="col-form-label">Grado:</label>
                        <input name="grado" id="grado" type="number" min="1" max="11" class="form-control form-control-sm" required>
                    </div>
                    
                </div>
            </div>

            <div class="card-footer bg-secondary float-right">
                <button class="btn btn-primary btn-sm pull-right" type="submit">Guardar</button>
            </div>

        </form>
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
        $('#106').addClass("active");
    });
</script>