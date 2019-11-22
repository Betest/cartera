<div class="container pt-4">
        <img src="<?php echo base_url(); ?>img/banner.jpg" alt="">

    </div>
<div class=" container col-xs-12">
    <h1>Pagos</h1>
    <?php if (!empty($this->session->flashdata())) : ?>
        <div class="alert alert-<?php echo $this->session->flashdata('clase') ?>">
            <?php echo $this->session->flashdata('mensaje') ?>
        </div>
    <?php endif; ?>
    <div>
        <a class="btn btn-success" href="<?php echo base_url() ?>index.php/pago/pago">Nuevo pago <i class="fa fa-plus"></i></a>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nro factura</th>
                <th>Fecha</th>
                <th>Valor Pagado</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($pagos)) { ?>
            <?php foreach ($pagos as $pago) { ?>
                <tr>
                    <td><?php echo $pago->nropago ?></td>
                    <td><?php echo $pago->nrofactura ?></td>
                    <td><?php echo $pago->fecha ?></td>
                    <td><?php echo $pago->valor ?></td>
                    <td><a class="btn btn-danger" href="<?php echo base_url() . "index.php/admin/eliminar/" . $pago->nropago ?>"><i class="fa fa-trash"></i></a></td>
                </tr>
            <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>