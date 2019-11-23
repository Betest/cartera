<body>

    <div class="container pt-4">
        <img src="<?php echo base_url(); ?>img/banner.jpg" alt="">

    </div>
    <div class="container">
        <?php if (!empty($this->session->flashdata())) : ?>
            <div class="alert alert-<?php echo $this->session->flashdata('clase') ?>" style="width:40%;margin-left:30%;">
                <?php echo $this->session->flashdata('mensaje') ?>
            </div>
        <?php endif; ?>
        <form method="post" action="<?php echo base_url() ?>index.php/login/iniciar">
            <legend style="text-align: center;">
                <h1>Iniciar Sesion</h1>


                <div class="form-group" style="width:40%;margin-left:30%;">
                    <label for="usuario"></label>
                    <input class="form-control" name="usuario" required type="text" id="usuario" placeholder="Usuario">
                </div>


                <div class="form-group" style="width:40%;margin-left:30%;">
                    <label for="contraseña"></label>
                    <input class="form-control" name="clave" required type="text" id="clave" placeholder="Contraseña">
                </div>


                <br><br>
                <div class="row " style="width:40%;margin-left:30%;">
                    <td><input class="btn btn-info" type="submit" value="Ingresar"></td>
                                        
                    <td><a class="btn btn-success" href="<?php echo base_url(). "index.php/register/register" ?>" >Registrarse</a></td>
                    <br>
                    <td><a class="btn btn-primary" href="<?php echo base_url() . "index.php/inicio/" ?>">Regresar</a></td>
                    
                    

                </div>
                
                


        </form>
    </div>
</body>