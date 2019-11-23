<div class="container pt-4">
        <img src="<?php echo base_url(); ?>img/banner.jpg" alt="">

    </div>
<div class=" container col-xs-12">
    <h1>Recargas</h1>
    <?php if (!empty($this->session->flashdata())) : ?>
            <div class="alert alert-<?php echo $this->session->flashdata('clase') ?>" style="width:40%;margin-left:30%;">
                <?php echo $this->session->flashdata('mensaje') ?>
            </div>
        <?php endif; ?>
    <div>
        <a class="btn btn-success" href="<?php echo base_url() ?>index.php/recarga/recarga">Nuevo recarga <i class="fa fa-plus"></i></a>
        <td><a class="btn btn-primary" href="<?php echo base_url() . "index.php/pago/pago" ?>">Pagar Facturas</a></td>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>                
                <th>Nro Recarga</th>
                <th>Identificacion</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Valor Recarga</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($recargas)) { ?>
            <?php foreach ($recargas as $recarga) { ?>
                <tr>
                    <td><?php echo $recarga->nrorecarga ?></td>
                    <td><?php echo $recarga->codcliente ?></td>
                    <td><?php echo $recarga->fecha ?></td>
                    <td><?php echo $recarga->hora ?></td>
                    <td><?php echo $recarga->valor ?></td>
                    <td><a class="btn btn-danger" href="<?php echo base_url() . "index.php/admin/eliminar/" . $recarga->nrorecarga ?>"><i class="fa fa-trash"></i></a></td>
                </tr>
            <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>