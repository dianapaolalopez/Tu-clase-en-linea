<?php $this->load->view('includes/header'); ?>
<?php $usuario = $this->session->userdata('usuario'); ?>
<?php $nombre = $this->session->userdata('nombres'); ?>
<?php $identificacion = $this->session->userdata('identificacion'); ?>
<?php $tipo = $this->session->userdata('tipo'); ?>
<br>
<br>
<br>
<br>
<br>
<div class="container-xl">
    <div>
        <a class="btn btn-success btn-sm" href="<?php echo base_url(); ?>Materias/nuevaMateria">crear nuevo</a>
    </div>
    <br>
    <div class="col-lg-12">
        <h1 class="text-center">Materias y Grado </h1>

        <div class="table-relative">
            <table class="table table-dark table-striped text-center">
                <thead>
                    <tr>
                        <th>MATERIA</th>
                        <th>GRADO</th>
                        <th hidden>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($LMaterias); $i++) { ?>
                        <tr>
                            <td><?php echo $LMaterias[$i]['materia'] ?></td>
                            <td><?php echo $LMaterias[$i]['grado'] ?></td>
                            <td hidden>
                                <a class="btn btn-primary" href="<?php echo base_url(); ?>Configuraciones/actUsuarios">Editar</a>
                            </td>
                        </tr>
                    <?php  };  ?>
                </tbody>
            </table>
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