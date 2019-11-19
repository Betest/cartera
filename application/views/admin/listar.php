<div class="container pt-4">
        <img src="<?php echo base_url(); ?>img/banner.jpg" alt="">

    </div>
<div class=" container col-xs-12">
    <h1>Usuarios</h1>
    <?php if (!empty($this->session->flashdata())) : ?>
        <div class="alert alert-<?php echo $this->session->flashdata('clase') ?>">
            <?php echo $this->session->flashdata('mensaje') ?>
        </div>
    <?php endif; ?>
    <div>
        <a class="btn btn-success" href="<?php echo base_url() ?>index.php/admin/agregar">Nuevo cliente <i class="fa fa-plus"></i></a>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Identificacion</th>
                <th>Apellidos</th>
                <th>Nombres</th>
                <th>Usuario</th>
                <th>Saldo</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($clientes)) { ?>
            <?php foreach ($clientes as $cliente) { ?>
                <tr>
                    <td><?php echo $cliente->id ?></td>
                    <td><?php echo $cliente->codcliente ?></td>
                    <td><?php echo $cliente->apellidos ?></td>
                    <td><?php echo $cliente->nombres ?></td>
                    <td><?php echo $cliente->usuario ?></td>
                    <td><?php echo $cliente->saldo ?></td>
                    <td><a class="btn btn-warning" href="<?php echo base_url() . "index.php/admin/editar/" . $cliente->id ?>"><i class="fa fa-edit"></i></a></td>
                    <td><a class="btn btn-danger" href="<?php echo base_url() . "index.php/admin/eliminar/" . $cliente->id ?>"><i class="fa fa-trash"></i></a></td>
                </tr>
            <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="container">
    <div class=" container col-xs-12">
        <h1>Administradores</h1>
        <?php if (!empty($this->session->flashdata())) : ?>
            <div class="alert alert-<?php echo $this->session->flashdata('clase2') ?>">
                <?php echo $this->session->flashdata('mensaje2') ?>
            </div>
        <?php endif; ?>
        <div>
            <a class="btn btn-success" href="<?php echo base_url() ?>index.php/admin/agregar">Nuevo admin <i class="fa fa-plus"></i></a>
        </div>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Identificacion</th>
                    <th>Nombres</th>
                    <th>Usuario</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($admins)) { ?>
                    <?php foreach ($admins as $admin) { ?>
                        <tr>
                            <td><?php echo $admin->id ?></td>
                            <td><?php echo $admin->identif ?></td>
                            <td><?php echo $admin->nombres ?></td>
                            <td><?php echo $admin->usuario ?></td>
                            <td><a class="btn btn-warning" href="<?php echo base_url() . "index.php/admin/editar/" . $admin->id ?>"><i class="fa fa-edit"></i></a></td>
                            <td><a class="btn btn-danger" href="<?php echo base_url() . "index.php/admin/eliminar/" . $admin->id ?>"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php } ?>

                <?php } ?>

            </tbody>
        </table>
    </div>

</div>