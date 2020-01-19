<?php $__env->startSection('content'); ?>
  <div class="col-sm-8">
    <h2>
        Lista de Contactos
        <a href="<?php echo e(route('contacts.create')); ?>" class="btn btn-primary pull-right">
          <span class="glyphicon glyphicon-plus"></span>Nuevo
        </a>

        <a href="<?php echo e(route('contacts.pdf')); ?>" class="btn btn-primary pull-right">
          <span class="glyphicon glyphicon-print"></span>Imprimir
        </a>

    </h2>
    <?php echo $__env->make('partials.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <table class="table table-hover table striped">
      <thead>
        <tr>
          <th width="20px">ID</th>
          <th>Nombre</th>
          <th>Teléfono</th>
          <th colspan="3">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($contact->id); ?></td>
            <td><?php echo e($contact->nombre); ?></td>
            <td><?php echo e($contact->telefono); ?></td>
            <td>
              <a href="<?php echo e(route('contacts.show', $contact->id )); ?>" title="Ver" class="btn btn-link">
                <span class="glyphicon glyphicon-eye-open"></span>
              </a>
            </td>
            <td>
              <a href="<?php echo e(route('contacts.edit', $contact->id )); ?>" title="Editar" class="btn btn-link">
                <span class="glyphicon glyphicon-edit"></span>
              </a>
            </td>
            <td>
              <form action="<?php echo e(route('contacts.destroy', $contact->id )); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="btn btn-link" title="Eliminar">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </form>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    <?php echo $contacts->render(); ?>

  </div>

  <div class="col-sm-4">
    <?php echo $__env->make('partials.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>