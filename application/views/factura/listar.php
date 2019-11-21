



<div class="container pt-4">
        <img src="<?php echo base_url(); ?>img/banner.jpg" alt="">

    </div>
<div class=" container col-xs-12">
    <h1>Facturas</h1>
    <?php if (!empty($this->session->flashdata())) : ?>
        <div class="alert alert-<?php echo $this->session->flashdata('clase') ?>">
            <?php echo $this->session->flashdata('mensaje') ?>
        </div>
    <?php endif; ?>
    <div>
        <a class="btn btn-success" href="<?php echo base_url() ?>index.php/factura/agregar">Nueva factura <i class="fa fa-plus"></i></a>
    </div>
    <br>
    <table class="table table-bordered">
        <thead>
        <tr>
                <th>Nro Factura</th>
                <th>Identificiacion Cliente</th>
                <th>Fecha</th>
                <th>Valor Factura</th>
                <th>Saldo Factura</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($facturas)) { ?>
            <?php foreach($facturas as $factura){ ?>
            <tr>
                <td><?php echo $factura->nrofactura ?></td>
                <td><?php echo $factura->codcliente ?></td>
                <td><?php echo $factura->fecha ?></td>
                <td><?php echo $factura->vlrfactura ?></td>
                <td><?php echo $factura->saldo ?></td>
                <td><a class="btn btn-warning" href="<?php echo base_url() ."index.php/factura/editar/" . $factura->nrofactura ?>"><i class="fa fa-edit"></i></a></td>
                <td><a class="btn btn-danger" href="<?php echo base_url() ."index.php/factura/eliminar/" . $factura->nrofactura ?>"><i class="fa fa-trash"></i></a></td>
            </tr>
            <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>