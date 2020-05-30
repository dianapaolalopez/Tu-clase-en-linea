<?php $this->load->view('includes/header'); ?>
<?php $usuario = $this->session->userdata('usuario'); ?>
<?php $nombre = $this->session->userdata('nombres'); ?>
<?php $identificacion = $this->session->userdata('identificacion'); ?>
<?php $tipo = $this->session->userdata('tipo'); ?>
<div id="container">
	<br><br><br><br>

	<div class="row justify-content-end">
		<div class="card text-center " style="width: 100px; background-color: #f0f8ffab; height: 80px;">
			<div class="card-body">
				<h6 class="card-title">Visitas:</h6>
				<label> <?php echo $res->visitas; ?></label>
			</div>
		</div>
	</div>

	<br>

	<div>
		<section id="clase">
			<h1 class="text-center ">Tu Clase en linea</h1>
			<div class="container col-lg-4 col-md-6 col-sm-12 col-xs-12">
				<img src="Images/imagenprincipal.jpg" class="img-fluid" alt="" id="cimg1">

			</div>
			<br>


			<div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 text-center container">

				<p id="pPrincipal">Tu clase en linea esta diseñada para facilitar el aprendizaje de los<br>
					estudiantes haciendo uso de las herramientas tecnologicas. Tambien <br>
					esta diseñada con el fin de integrar todos los procesos escolares <br>
					como la gestion de actividades, notas, y todo el proceso academico.<br>
					Teniendo siempre el acompañamiento de los profesores o tutores para<br>
					poder tener un proceso oportuno en el desarrollo de los estudiantes.
				</p>
			</div>
		</section>
		<br>
		<section id="beneficios">
			<h1 class="text-center">Beneficios</h1>
			<div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 container" id="pPrincipal">
				<div class="col-lg-12 col-md-8 col-sm-12 col-xs-12  container">
					<p>Entre los beneficios mas significativos que se encuentran tanto para los<br>
						estudiantes como para las instituciones son los siguientes:</p>
				</div>
				<div class="container">
					<ul>
						<li>Accesibilidad las 24 horas.</li>
						<li>Atencion personalizada.</li>
						<li>Privacidad de la informacion.</li>
						<li>Control de las actividades.</li>
						<li>Informacion detallada de la institucion y profesorado.</li>
						<li>Actualizacion constante de actividades y calificaciones.</li>

					</ul>
				</div>
			</div>
		</section>
		<br>
		<section id="soporte">
			<h1 class="text-center">Soporte y Mantenimiento</h1>
			<div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 text-center container" id="pPrincipal">
				<p>Para obtener ayuda oportuna si presentas alguna falla durante<br />
					las sesiones, o actualizaciones que realices en la plataforma<br />
					escribenos a: <strong>soporte@tuclaseenlinea.com.co</strong></p>
				<p>Tambien puedes comunicarte a la linea de atencion <strong>+570000000</strong></p>
			</div>
		</section>
		<br />
		<br />
		<div class="container">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="text-center">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7953.306531342195!2d-74.06220416815006!3d4.655774043343057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9a43462512a1%3A0xd324b33f50c43aa8!2sUniversidad%20Ean%20Sede%20Calle%2071!5e0!3m2!1ses-419!2sco!4v1590436136340!5m2!1ses-419!2sco"
						style="border:0;width:100%;height:450px" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
		</div>
		<span class="ir-arriba">/\</span>
	</div>

</div>
<?php $this->load->view('includes/footer'); ?>

<script>
	$(document).ready(function() {


		function setCookie(cname, cvalue, exdays) {
			var d = new Date();
			d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
			var expires = "expires=" + d.toUTCString();
			document.cookie = cname + "=" + cvalue + "; " + expires;
		}
		setCookie("TuClaseEnLinea", "CLASE", 1);


		function getCookie(cname) {
			var name = cname + "=";
			var ca = document.cookie.split(';');
			for (var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.chartAt(0) == ' ') c = c.substring(1);
				if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
			}
			return "";
		}

		function eliminarCookie(cname) {
			return document.cookie = cname + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
		}

	});
</script>