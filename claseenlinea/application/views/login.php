<?php $this->load->view('includes/header'); ?>


<div class="row" id="login_form">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<br><br>
		<br>
		<br>
		<br>
		<br>
		<div class="row justify-content-center">
			<form action="<?php echo base_url(); ?>Login/verifica" method="post" name="form" id="form">
				<div class="card" id="login">

					<div class="card-header">
						Ingreso
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="usuario">Usuario</label>
							<input type="text" id="usuario" name="usuario"  class="form-control" placeholder="Usuario">
						</div>
						<div class="form-group">
							<label for="clave">Clave</label>
							<input type="password" id="clave" name="clave" class="form-control" placeholder="clave">
						</div>
						<a class="float-right" id="regiter" href="<?php echo base_url(); ?>Registro">Registrate Aqui</a>
					</div>
					<div class="card-footer text-muted">
						<input type="submit" name="ingresar" id="ingresar" value="ingresar">
					</div>
				</div>
			</form>
		</div>
		<br>
	
	</div>
</div>
<?php $this->load->view('includes/footer'); ?>
<script>
 $(document).ready(function () {
       $('#100').removeClass("active");
	   $('#101').addClass("active");
	   $('#102').removeClass("active");
   });
 </script>