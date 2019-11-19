     <header>
         <nav id="navp" class="navbar navbar-expand-lg navbar-light bg-light">
             <a class="navbar-brand" href="http://localhost/cartera/index.php/"><img src="<?php echo base_url(); ?>img/logo2.jpg" title="Banco Multinivel" style="width:40px;" alt=""></a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarNav">
                 <ul class="navbar-nav">
                     <li class="nav-item active" id="lionea">
                         <a class="nav-link" href="<?php echo base_url(); ?>index.php/inicio">Inicio</a>
                     </li>

                     <li class="nav-item">
                         <a class="nav-link" href="#">Servicios</a>
                     </li>

                     <?php if ($this->session->userdata('usuario')) : ?>
                         <li class="nav-item">
                             <a class="nav-link" href="<?php echo base_url(); ?>index.php/recarga/recarga">Recarga</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="<?php echo base_url(); ?>index.php/recarga/pago">Pagos</a>
                         </li>
                     <?php endif ?>
                     <?php if ($this->session->userdata('identif')) : ?>
                         <li class="nav-item">
                             <a class="nav-link" href="<?php echo base_url(); ?>index.php/admin/">Usuarios</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="<?php echo base_url(); ?>index.php/recarga/factura">Facturas</a>
                         </li>
                     <?php endif ?>
                     <li class="nav-item">
                         <a class="nav-link" href="#">Contacto</a>
                     </li>

                 </ul>
                 <ul class="navbar-nav ml-auto">
                     <?php if (!$this->session->userdata('usuario') && !$this->session->userdata('identif')) : ?>
                         <li class="nav-item">
                             <a class="nav-link" href="<?= site_url('login/login') ?>">Conectarse</a>
                         </li>

                         <li class="nav-item">
                             <a class="nav-link" href="<?= site_url("register/register") ?>">Registrarse</a>
                         </li>
                     <?php endif ?>
                     
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             Menu
                         </a>
                         <?php if (!$this->session->userdata('usuario') && !$this->session->userdata('identif')) : ?>
                             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                 <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/admin/">Ingresar</a>

                             </div>
                         <?php endif ?>                         
                         
                         <div class="dropdown-menu">
                         <?php if ($this->session->userdata('usuario')) : ?>
                                 <a class="dropdown-item">Usuario</a>
                             <?php endif ?>
                             <?php if ($this->session->userdata('identif')) : ?>
                                 <a class="dropdown-item">Admin</a>
                             <?php endif ?>
                             <!-- si hay sesion muestra salir, si no hay muestra conectar -->
                             <?php if ($this->session->userdata('usuario') || $this->session->userdata('identif')) : ?>
                                 <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/login/logout ">Salir</a>
                             <?php endif ?>
                     </li>

                     </li>

                 </ul>
             </div>
         </nav>
     </header>