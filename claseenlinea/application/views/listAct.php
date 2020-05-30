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
        <h1 class="text-center">Calificar Actividades:</h1>
    </div>
    <div class="container-sm bg-info rounded ">
        <div class="row ">
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

            <div class="form-group col-lg-2 ml-auto">
                <button id="actv" name="actv" class="btn btn-sm btn-success" onclick="lactv();">Buscar actividades</button>
            </div>
        </div>
    </div>
    <br>

    <div class="card bg-light col-lg-8 container border" id="cardFondo"><br>
        <div class="card-header bg-secondary">
            <h2 class="text-center" style="color: white;">Calificaciones</h2>
        </div>

        <form class="form-group bg-light" action="<?php echo base_url(); ?>Calificacion/guadarNota" method="post" name="registro" id="registro">
            <div class="card-body" id="cardbodyfondo">
                <div class="row">
                    <h3 class="text-center container">Actividad a calificar: </h3>


                    <input name="idmateria" id="idmateria" type="text" class="form-control form-control-sm" readonly hidden>
                    <input name="idactividad" id="idactividad" type="text" class="form-control form-control-sm" readonly hidden>
                    <!-- <input name="identificacion" id="identificacion" type="text" class="form-control form-control-sm" value=" echo $identificacion ?>" readonly > -->

                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Actividades: </label>
                        <select name="actividades" id="actividades" class="form-control form-control-sm actividades" onchange="actsel();" required>
                            <option value="">Seleccione una actividad</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-6">
                        <label class="col-form-label">Identificación del Estudiante: </label>
                        <input name="identificacion" id="identificacion" type="text" class="form-control form-control-sm">
                    </div>

                    <div class="ml-auto">
                        <button id="actv" name="actv" class="btn btn-sm btn-success" onclick="getsolucion();">Cargar solución estudiante</button>
                    </div>

                    <div class="form-group col-lg-12">
                        <label for="titulo" class="col-form-label">Título: </label>
                        <input name="titulo" id="titulo" type="text" class="form-control form-control-sm" required readonly>
                    </div>

                    <div class="form-group col-lg-12">
                        <label class="col-form-label">Descripción de actividad(es): </label>
                        <textarea type="text" name="descripcion" id="descripcion" class="form-control form-control-sm" rows="10" required readonly></textarea>
                    </div>

                    <div class="form-group col-lg-12">
                        <label class="col-form-label">Resolución de actividad(es): </label>
                        <textarea type="text" name="resolucion" id="resolucion" class="form-control form-control-sm" rows="20" required readonly></textarea>
                    </div>

                    <div class="form-group col-lg-4">
                        <label class="col-form-label">Nota Estudiante: </label>
                        <input type="number" min="0" max="5" step="0.1" name="nota" id="nota" class="form-control form-control-sm" placeholder="ingrese este formato 5.0" title="solo ingrese valores entre 0 y 5" required>
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
        $('#104').removeClass("active");
        $('#105').removeClass("active");
        $('#106').addClass("active");
        $('#107').removeClass("active");

        var hoy = new Date();
        var año = hoy.getFullYear();
        var semanas = moment(año, "YYYY").isoWeeksInYear();

        for (var i = 0; i < semanas; i++) {
            $(".semanas").append("<option value='" + "Semana " + (i + 1) + "'>" + "Semana " + (i + 1) + "</option>");
        }

    });

    function lactv() {
        var materia = $('#materia').val();
        var grado = $('#grado').val();
        var semana = $('#semana').val();
        var url = $('#url').val();
        var actividades = $("#actividades");

        if (materia != "" || grado != "" || semana != "") {
            console.log(materia, grado, semana);
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: '<?= base_url() ?>ItemController/ajaxRequestPost',
                data: {
                    materia: materia,
                    grado: grado,
                    semana: semana
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $(data).each(function(i, v) { // indice, valor
                        actividades.append('<option value="' + v.idactividad + '" ' + 'desc="' + v.descripcion + '">' + v.titulo + '</option>');
                    })
                },
                error: function() {
                    alert('error');
                }
            });
        } else {
            alert("Se debe seleccionar la MATERIA, el GRADO y la SEMANA para ver la lista de ACTIVIDADES");
        }
        getidmateria();
    };

    function getidmateria() {
        var materia = $('#materia').val();
        var grado = $('#grado').val();

        if (materia != "" || grado != "") {
            console.log(materia, grado);
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: '<?= base_url() ?>ItemController/ajaxReqPostidmat',
                data: {
                    materia: materia,
                    grado: grado
                },
                dataType: 'json',
                success: function(data) {
                    $('#idmateria').val(data);
                    alert("La lista de ACTIVIDADES ha sido CARGADA");
                },
                error: function() {
                    alert('error');
                }
            });
        } else {
            alert("Se debe seleccionar la MATERIA, el GRADO y la SEMANA para ver la lista de ACTIVIDADES");
        }
    };

    function getsolucion() {
        var idmateria = $('#idmateria').val();
        var idactividad = $('#idactividad').val();
        var identificacion = $('#identificacion').val();

        if (idmateria != "" || idactividad != "" || identificacion != "") {
            console.log(materia, grado);
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: '<?= base_url() ?>ItemController/ajaxReqSol',
                data: {
                    idmateria: idmateria,
                    idactividad: idactividad,
                    identificacion: identificacion
                },
                dataType: 'json',
                success: function(data) {
                    $('#resolucion').val(data);
                    alert("La SOLUCIÓN ha sido CARGADA");
                },
                error: function() {
                    alert('error');
                }
            });
        } else {
            alert("Se debe seleccionar la MATERIA, el GRADO, la SEMANA, la ACTIVIDAD e INGRESAR la identificación del ESTUDIANTE para ver LA SOLUCIÓN");
        }
    };


    function actsel() {
        var cod = document.getElementById("actividades").value;
        $('#idactividad').val(cod);

        var combo = document.getElementById("actividades");
        var selected = combo.options[combo.selectedIndex].text;
        $('#titulo').val(selected);

        var descrip = $('option:selected', combo).attr('desc');
        $('#descripcion').val(descrip);
    };
</script>