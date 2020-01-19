<?php $__env->startSection('content'); ?>

  <div class="col-sm-8">
    <h2>
      Lista de libros
      <a href="<?php echo e(route('books.create')); ?>" class="btn btn-success pull-right">
        <span class="glyphicon glyphicon-plus"></span> Nuevo
      </a>
    </h2>
    <?php echo $__env->make('partials.info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <table class="table table-hover table striped">
      <thead>
        <tr>
          <th width="20px">ID</th>
          <th>Título</th>
          <th>Edición</th>
          <th>Tipo</th>
          <th>Disponible</th>
          <th>Stock</th>
          <th>Autor</th>
          <th colspan="3">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($book->id); ?></td>
            <td><?php echo e($book->titulo); ?></td>
            <td><?php echo e($book->edicion); ?></td>
            <td><?php echo e($book->tipo); ?></td>
            <?php if($book->disponible == 1): ?>
              <td class="text-center"><?php echo e("si"); ?></td>
            <?php endif; ?>
            <?php if($book->disponible == 0): ?>
              <td class="text-center"><?php echo e("no"); ?></td>
            <?php endif; ?>
            <td><?php echo e($book->ejemplares); ?></td>
            <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($book->author_id==$author->id): ?>
                <td><?php echo e($author->nombres); ?></td>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <td>
              <a href="<?php echo e(route('books.show', $book->id )); ?>" title="Ver" class="btn btn-link">
                <span class="glyphicon glyphicon-eye-open"></span>
              </a>
            </td>
            <td>
              <a href="<?php echo e(route('books.edit', $book->id )); ?>" title="Editar" class="btn btn-link">
                <span class="glyphicon glyphicon-edit"></span>
              </a>
            </td>
            <td>
              <form action="<?php echo e(route('books.destroy', $book->id )); ?>" method="POST">
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
    <?php echo $books->render(); ?>

  </div>

  <div class="col-sm-4">
    <?php echo $__env->make('partials.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>