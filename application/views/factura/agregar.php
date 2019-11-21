<body>
    <div class="container pt-4">
        <img src="<?php echo base_url(); ?>img/banner.jpg" alt="">

    </div>   

    <div class="container">
        <?php if (!empty($this->session->flashdata())) : ?>
            <div class="alert alert-<?php echo $this->session->flashdata('clase') ?>">
                <?php echo $this->session->flashdata('mensaje') ?>
            </div>
        <?php endif; ?>
        <form method="post" action="<?php echo base_url() ?>index.php/factura/guardar">
            <legend style="text-align: center;"> 
                <h1>Nueva Factura</h1>
                <div class="form-group" style="width:40%;margin-left:30%;">
                <label for="codcliente"></label>
                <input class="form-control" name="codcliente" required type="text" id="codcliente" placeholder="Identificacion">
                </div>
                <div class="form-group" style="width:40%;margin-left:30%;">
                <label for="fecha"></label>
                <input required id="apellidos" name="fecha" type="date" class="form-control" placeholder="Fecha">
                </div>
                
                <div class="form-group" style="width:40%;margin-left:30%;">
                <label for="vlrfactura"></label>
                <input required id="vlrfactura" name="vlrfactura" type="number" class="form-control" placeholder="Valor Factura">
                </div>                               

                <div class="form-group" style="width:40%;margin-left:30%;">
                <label for="saldo"></label>
                <input class="form-control" name="saldo" required type="number" id="saldo" placeholder="Saldo Factura">
                </div>         
                                
                
                <br><br>
                <div class="row " style="width:40%;margin-left:30%;">
                    <td><input class="btn btn-info" type="submit" value="Guardar"></td>
                    <td><a class="btn btn-primary" href="<?php echo base_url() . "index.php/factura/" ?>">Regresar</a></td>

                </div>


        </form>
    </div>
</body>