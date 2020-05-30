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

    <br>
    <div class="col-lg-12">
        <h1 class="text-center">ESTADO DE USUARIOS</h1>

        <div class="table-relative">
            <table class="table table-dark table-striped text-center">
                <thead>
                    <tr>
                        <th>USUARIO</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($LUsuarios); $i++) { ?>
                        <tr>
                            <td><?php echo $LUsuarios[$i]['usuario'] ?></td>
                            <?php if ($LUsuarios[$i]['estado'] === '0') : ?>
                                <td>Inactivo</td>
                            <?php else : ?>
                                <td>Activo</td>
                            <?php endif; ?>
                            <td>
                                <a class="btn btn-primary" href="<?php echo base_url(); ?>Registro/actUsuarios/<?php echo $LUsuarios[$i]['identificacion'] ?>">Editar</a>
                            </td>
                        </tr>
                    <?php  };  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<br>
<br>
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