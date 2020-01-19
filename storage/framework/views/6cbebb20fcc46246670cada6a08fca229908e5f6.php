<?php $__env->startSection('content'); ?>
  <div class="col-sm-8">
    <h2>
      <?php echo e($contact->nombre); ?>

      <a href="<?php echo e(route('contacts.index')); ?>" class="btn btn-info pull-right">
        <span class="glyphicon glyphicon-share-alt"></span>Volver
      </a>
    </h2>
    <h3>
      <?php echo e($contact->telefono); ?>

    </h3>
  </div>
  <div class="col-sm-4">

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>