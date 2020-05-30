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
        <h1 class="text-center">Notas:</h1>
    </div>
    <br>
    <div class="card bg-light col-lg-8 container border" id="cardFondo"><br>
        <div class="card-header bg-secondary">

            <div class="row justify-content-end">
                <div class="form-inline">
                    <label class="mr-sm-2">Identificación: </label>
                    <input name="identificacion" id="identificacion" type="text" class="form-control form-control-sm mr-sm-2">
                    <button id="actv" name="actv" class="btn btn-sm btn-success " onclick="getnotas();">Notas estudiante</button>
                </div>
            </div>

        </div>

        <div class="card-body" id="cardbodyfondo">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Identificación</th>
                            <th>Materia</th>
                            <th>Titulo</th>
                            <th>Semana</th>
                            <th>Nota</th>
                        </tr>
                    </thead>
                    <tbody id="actividades">

                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-secondary float-right">

        </div><br>
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
        $('#105').addClass("active");
        $('#106').removeClass("active");
        $('#107').removeClass("active");
    });

    function getnotas() {
        var identificacion = $('#identificacion').val();
        var actividades = $("#actividades");

        if (identificacion != "") {
            console.log(identificacion);
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: '<?= base_url() ?>ItemController/ajaxReqNotas',
                data: {
                    identificacion: identificacion
                },
                success: function(data) {
                    var myJsonString = JSON.parse(data);
                    console.log(myJsonString);
                    $(myJsonString).each(function(i, v) { // indice, valor
                        // for (var i = 0; i < 9; i++) {
                        //     actividades.append('<td>' + identificacion[i] + '</td>' +
                        //         '<td>' + materia[i] + '</td>' +
                        //         '<td>' + titulo[i] + '</td>' +
                        //         '<td>' + semana[i] + '</td>' +
                        //         '<td>' + nota[i] + '</td>'
                        //     );
                        // }
                        actividades.append('<tr><td>' + v.identificacion + '</td>' +
                            '<td>' + v.materia + '</td>' +
                            '<td>' + v.titulo + '</td>' +
                            '<td>' + v.semana + '</td>' +
                            '<td>' + v.nota + '</td></tr>'
                        );
                    })
                },
                error: function() {
                    alert('error');
                }
            });
        } else {
            alert("Se debe seleccionar la MATERIA, el GRADO y la SEMANA para ver la lista de ACTIVIDADES");
        }
    };
</script>