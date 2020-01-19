<?php $__env->startSection('content'); ?>
  <div class="col-sm-8">
    <h2>
      Editar un contacto
      <a href="<?php echo e(route('contacts.index')); ?>" class="btn btn-info pull-right">
        <span class="glyphicon glyphicon-share-alt"></span>Volver
      </a>
    </h2>
    <?php echo $__env->make('partials.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <form class="form-horizontal" action="<?php echo e(route('contacts.update', $contact->id)); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      <div class="form-group">
        <label class="control-label col-sm-2" for="nombre">Nombre:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  name="nombre" style="text-transform:uppercase;"
              onkeyup="javascript:this.value=this.value.toUpperCase();"
              value="<?php echo e($contact->nombre); ?>">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="telefono">Teléfono:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="telefono" value="<?php echo e($contact->telefono); ?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success">
            <span class="glyphicon glyphicon-floppy-saved"></span> Guardar
          </button>
        </div>
      </div>
    </form>
  </div>
  <div class="col-sm-4">

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>