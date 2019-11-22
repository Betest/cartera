
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
        <form method="post" action="<?php echo base_url() ?>index.php/recarga/nueva">
            <legend style="text-align: center;"> 
                <h1>Recargar</h1>
                <div class="form-group" style="width:40%;margin-left:30%;">
                <label for="codcliente"></label>
                <input class="form-control" name="codcliente" required type="text" id="codcliente" placeholder="Identificacion">
                </div>
                <div class="form-group" style="width:40%;margin-left:30%;">
                <label for="fecha"></label>
                <input required id="fecha" name="fecha" type="date" class="form-control" placeholder="fecha">
                </div>
                
                <div class="form-group" style="width:40%;margin-left:30%;">
                <label for="hora"></label>
                <input required id="hora" name="hora" type="datetime" class="form-control" placeholder="Hora">
                </div>                               

                <div class="form-group" style="width:40%;margin-left:30%;">
                <label for="valor"></label>
                <input class="form-control" name="valor" required type="number" id="valor" placeholder="Valor">
                </div>   
                         
                <div class="row " style="width:40%;margin-left:30%;">
                    <td><input class="btn btn-info" type="submit" value="Recargar"></td>
                    <td><a class="btn btn-success" href="<?php echo base_url() . "index.php/recarga/" ?>">Recargas</a></td>
                    <td><a class="btn btn-primary" href="<?php echo base_url() . "index.php/pago/pago" ?>">Pagar Facturas</a></td>
                    <td><a class="btn btn-success" href="<?php echo base_url() . "index.php/pago/" ?>">Facturas</a></td>

                </div>


        </form>
    </div>
</body>