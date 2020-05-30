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
        <h1 class="text-center">Actividades:</h1>
    </div>

    <div class="card bg-light col-lg-8 container border" id="cardFondo"><br>
        <div class="card-header bg-secondary">
            <h2 class="text-center" style="color: white;">Creación de actividades</h2>
        </div>

        <form class="form-group bg-light" action="<?php echo base_url(); ?>Actividades/creaActividad" method="post" name="registro" id="registro">

            <div class="card-body" id="cardbodyfondo">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label class="col-form-label">Materia: </label>
                        <select name="materia" id="materia" class="form-control form-control-sm" required>
                            <option value="">Seleccione una materia</option>
                            <?php for ($i = 0; $i < count($Lmateria); $i++) { ?>
                                <option value="<?php echo $Lmateria[$i]['materia'] ?>"><?php echo $Lmateria[$i]['materia'] ?></option>
                            <?php  };  ?>
                        </select>
                    </div>

                    <div class="form-group col-lg-4">
                        <label class="col-form-label">Curso: </label>
                        <select name="grado" id="grado" class="form-control form-control-sm" required>
                            <option value="">Seleccione un curso</option>
                            <?php for ($i = 0; $i < count($Lgrado); $i++) { ?>
                                <option value="<?php echo $Lgrado[$i]['grado'] ?>"><?php echo $Lgrado[$i]['grado'] ?></option>
                            <?php  };  ?>
                        </select>
                    </div>

                    <div class="form-group col-lg-4">
                        <label class="col-form-label">Semana: </label>
                        <select name="semana" id="semana" class="form-control form-control-sm semanas" required>
                            <option value="">Seleccione una semana</option>
                        </select>
                    </div>

                    <h3 class="text-center container">Diligencia la actividad que el estudiante debe realizar: </h3>
                    
                    <div class="form-group col-lg-12">
                        <label for="titulo" class="col-form-label">Título: </label>
                        <input name="titulo" id="titulo" type="text" class="form-control form-control-sm" required>
                    </div>
                    <div class="form-group col-lg-12">
                        <label class="col-form-label">Descripción de actividad(es): </label>
                        <textarea type="text" name="descripcion" id="descripcion" class="form-control form-control-sm"  rows="10" required></textarea>
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
        $('#102').removeClass("active");
        $('#103').removeClass("active");
        $('#104').addClass("active");
        $('#105').removeClass("active");
        $('#106').removeClass("active");
        $('#107').removeClass("active");

        var hoy = new Date();
        var año = hoy.getFullYear();
        var semanas = moment(año, "YYYY").isoWeeksInYear();

        for (var i = 0; i < semanas; i++) {
            $(".semanas").append("<option value='" +"Semana " + (i + 1) + "'>" + "Semana " + (i + 1) + "</option>");
        }

    });
</script>