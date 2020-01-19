<!DOCTYPE html>
<html>
  <head>
    <title>App | Contacts</title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/bootstrap.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('fonts/glyphicons-halflings-regular.woff2')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/sticky-footer-navbar.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/bootstrap-select.min.css')); ?>">
  <body>
  </head>
    <div class="container">
      <?php echo $__env->make('navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
      <div class="row">
        <div class="col-xs-12">
          <h1 class="page-header text-center">Framework Laravel 5.6</h1>
        </div>

        <?php echo $__env->yieldContent('content'); ?>

      </div>
    </div>
    <?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/jquery.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/bootstrap.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(URL::asset('js/bootstrap-select.min.js')); ?>"></script>
  </body>
</html>
