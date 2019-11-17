<body>
	<div class="container pt-4">
		<img src="<?php echo base_url(); ?>img/banner.jpg" alt="">

	</div>

	<div class=" container">

		<form method="post" action="<?php echo base_url() ?>index.php/admin/guardarCambios">
			<input name="id" type="hidden" value="<?php echo $cliente->id ?>">
			<div class="form-group" style="width:40%;margin-left:30%;">
				<h1>Editar cliente</h1>
				<label for="codcliente"></label>
				<input value="<?php echo $cliente->codcliente ?>" class="form-control" name="codcliente" required type="text" id="codcliente" placeholder="Identificacion">

			</div>
			<div class="form-group" style="width:40%;margin-left:30%;">
				<label for="apellidos"></label>
				<input value="<?php echo $cliente->apellidos ?>" required id="apellidos" name="apellidos" class="form-control" placeholder="Apellidos">
			</div>
			<div class="form-group" style="width:40%;margin-left:30%;">
				<label for="nombres"></label>
				<input value="<?php echo $cliente->nombres ?>" class="form-control" name="nombres" required type="text" id="nombres" placeholder="Nombres">

			</div>
			<div class="form-group" style="width:40%;margin-left:30%;">
				<label for="usuario"></label>
				<input value="<?php echo $cliente->usuario ?>" class="form-control" name="usuario" required type="text" id="usuario" placeholder="Usuario">

			</div>
			<div class="form-group" style="width:40%;margin-left:30%;">
				<label for="saldo"></label>
				<input value="<?php echo $cliente->saldo ?>" class="form-control" name="saldo" required type="text" id="saldo" placeholder="Saldo">

			</div>
			<div class="form-group" style="width:40%;margin-left:30%;">
				<label for="clave"></label>
				<input value="<?php echo $this->encrypt->decode($cliente->clave) ?>" class="form-control" name="clave" required type="text" id="clave" placeholder="Clave">
				<br><br><input class="btn btn-info" type="submit" value="Guardar">
				<td><a class="btn btn-primary" href="<?php echo base_url() . "index.php/admin/" ?>">Regresar</a></td>

			</div>
		</form>
	</div>
</body>