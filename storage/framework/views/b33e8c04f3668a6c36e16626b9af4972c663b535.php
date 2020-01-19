<?php $__env->startSection('content'); ?>

  <div class="col-sm-8">
    <h2>
      Lista de compras
      <a href="<?php echo e(route('compras.create')); ?>" class="btn btn-success pull-right">
        <span class="glyphicon glyphicon-plus"></span> Nuevo
      </a>
    </h2>
    <?php echo $__env->make('partials.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <table class="table table-hover table striped">
      <thead>
        <tr>
          <th width="20px">ID</th>
          <th>Razon social</th>
          <th>Estado</th>
          <th>Total</th>
          <th colspan="2">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($compra->idcompra); ?></td>
            <td><?php echo e($compra->razon_social); ?></td>
            <td><?php echo e($compra->estado); ?></td>
            <td><?php echo e($compra->total); ?></td>
            <td>
              <a href="<?php echo e(route('compras.show', $compra->idcompra )); ?>" title="Ver" class="btn btn-link">
                <span class="glyphicon glyphicon-eye-open"></span>
              </a>
            </td>

            <td>
              <form action="<?php echo e(route('compras.destroy', $compra->idcompra )); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <?php if($compra->estado =='REGISTRADO'): ?>
                  <button class="btn btn-link" title="Anular">
                    <span class="glyphicon glyphicon-remove"></span>
                  </button>
                <?php endif; ?>

              </form>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>

  <div class="col-sm-4">
    <?php echo $__env->make('partials.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>