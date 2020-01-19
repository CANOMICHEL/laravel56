<?php if(Session::has('mensaje')): ?>
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
      &times;
    </button>
    <?php echo e(Session::get('mensaje')); ?>

  </div>
<?php endif; ?>
