<?php $__env->startSection('content'); ?>
  <div class="col-sm-8">
    <h2>
      Detalles de la compra
    </h2>
    <a href="<?php echo e(route('compras.index')); ?>" class="btn btn-info pull-right">
      <span class="glyphicon glyphicon-share-alt"></span>Volver
    </a>
    <div class="col-sm-8">
      <?php $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <label class="col-sm-8">PROVEEDOR: <?php echo e($prov->razon_social); ?></label>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <label class="col-sm-8"></label>
    </div>
    <div class="col-sm-16">
      <table class="table table-hover table-striped table-condensed table-bordered">
        <thead>
          <tr>
            <th width="40px">IDcompra</th>
            <th width="40px">IDproducto</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $detalles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($detalle->idcompra); ?></td>
              <td><?php echo e($detalle->idproducto); ?></td>
              <td><?php echo e($detalle->nombre); ?></td>
              <td><?php echo e($detalle->cantidad); ?></td>
              <td>S./ <?php echo e($detalle->precio_unitario); ?></td>
              <td>S./ <?php echo e($detalle->cantidad*$detalle->precio_unitario); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td align="right">
            <strong>Total</strong></td>
          <?php $__currentLoopData = $totals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <td>S./ <?php echo e($tt->total); ?></td>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>