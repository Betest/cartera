<body>
	<div class="container pt-4">
		<img src="<?php echo base_url(); ?>img/banner.jpg" alt="">

	</div>

	<div class=" container">

		<form method="post" action="<?php echo base_url() ?>index.php/factura/guardarCambios">
			<input name="nrofactura" type="hidden" value="<?php echo $factura->nrofactura ?>">
			<div class="form-group" style="width:40%;margin-left:30%;">
				<h1>Editar factura</h1>
				<label for="codcliente"></label>
				<input value="<?php echo $factura->codcliente ?>" class="form-control" name="codcliente" required type="text" id="codcliente" placeholder="Identificacion">

			</div>
			<div class="form-group" style="width:40%;margin-left:30%;">
				<label for="fecha"></label>
				<input value="<?php echo $factura->fecha ?>" required id="fecha" name="fecha" class="form-control" placeholder="Fecha">
			</div>
			<div class="form-group" style="width:40%;margin-left:30%;">
				<label for="vlrfactura"></label>
				<input value="<?php echo $factura->vlrfactura ?>" class="form-control" name="vlrfactura" required type="text" id="vlrfactura" placeholder="Valor Factura">

			</div>
			<div class="form-group" style="width:40%;margin-left:30%;">
				<label for="saldo"></label>
				<input value="<?php echo $factura->saldo ?>" class="form-control" name="saldo" required type="text" id="saldo" placeholder="Saldo Factura">

				<br><br><input class="btn btn-info" type="submit" value="Guardar">
				<td><a class="btn btn-primary" href="<?php echo base_url() . "index.php/factura/" ?>">Regresar</a></td>

			</div>
		</form>
	</div>
</body>