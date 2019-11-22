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
        <form method="post" action="<?php echo base_url() ?>index.php/pago/nueva">
            <legend style="text-align: center;"> 
                <h1>Pagar facturas</h1>
                <div class="form-group" style="width:40%;margin-left:30%;">
                
                <label for="codcliente"></label>
                <input class="form-control" name="codcliente" required type="text" id="codcliente" placeholder="Identificacion">
                </div>
                
                <div class="form-group" style="width:40%;margin-left:30%;">
                <label for="nrofactura" ></label>
                <input class="form-control" name="nrofactura" required type="text" id="nrofactura" value=" <?= (isset($facturas[0])) ? $facturas[0]->nrofactura : ""; ?>">
                </div>
                <div class="form-group" style="width:40%;margin-left:30%;">
                <label for="fecha"></label>
                <input required id="fecha" name="fecha" type="date" class="form-control" placeholder="fecha">
                </div>
                
                <div class="form-group" style="width:40%;margin-left:30%;">
                <label for="valor"></label>
                <input required id="valor" name="valor" type="number" class="form-control" placeholder="Valor Pago">
                </div>                  
                         
                <div class="row " style="width:40%;margin-left:30%;">
                    <td><input class="btn btn-info" type="submit" value="Pagar"></td>
                    <td><a class="btn btn-success" href="<?php echo base_url() . "index.php/pago/" ?>">Facturas</a></td>
                    <td><a class="btn btn-primary" href="<?php echo base_url() . "index.php/recarga/recarga" ?>">Recargar</a></td>
                    <td><a class="btn btn-success" href="<?php echo base_url() . "index.php/recarga/" ?>">Recargas</a></td>
                    
                    

                </div>


        </form>
    </div>
</body>


