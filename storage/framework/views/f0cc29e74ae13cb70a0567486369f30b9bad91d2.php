<?php $__env->startSection('content'); ?>
  <div class="col-sm-8">
    <a href="<?php echo e(route('books.index')); ?>" class="btn btn-info pull-right">
      <span class="glyphicon glyphicon-share-alt"></span>Volver
    </a>
    <div class="col-sm-19">
      <div class="col-sm-2">
        <img src="/images/<?php echo e($book->imagen); ?>" class="img.thumbnail" title="<?php echo e($book->titulo); ?>">
      </div>
      <div class="col-sm-15">
        <div class="col-sm-8">
          <label class="control-label col-sm-2" for="titulo">Título:</label>
          <label class="col-sm-9"><?php echo e($book->titulo); ?></label>

        </div>
        <div class="col-sm-8">
          <label class="control-label col-sm-2" for="autor">Autor:</label>
          <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($book->author_id==$author->id): ?>
              <label class="col-sm-9"><?php echo e($author->nombres); ?></label>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="col-sm-8">
          <label class="control-label col-sm-2" for="edicion">Edición:</label>
          <label class="col-sm-2"><?php echo e($book->edicion); ?></label>
        </div>
      </div>
    </div>
     <div class="col-sm-8">
       <section class="text-center" >
           <input type="file" id="archivoInput" class="col-md-offset-4 col-md-4" onchange="return validarExt()" />
           <br><br>
           <div id="visorArchivo">
             <!--Aqui se desplegará el fichero-->
           </div>
         </section>

    </div>
  </div>


  <?php $__env->startPush('scripts'); ?>
  <script>
  $(document).ready(function(){
    $("#btn_add").click(function(){
      validarExt();
    });
  });

  function validarExt()
  {
      var archivoInput = document.getElementById('archivoInput');
      var archivoRuta = archivoInput.value;
      var extPermitidas = /(.pdf)$/i;
      if(!extPermitidas.exec(archivoRuta)){
          alert('Asegurese de haber seleccionado un PDF');
          archivoInput.value = '';
          return false;
      }

      else
      {
          //PRevio del PDF
          if (archivoInput.files && archivoInput.files[0])
          {
              var visor = new FileReader();
              visor.onload = function(e)
              {
                  document.getElementById('visorArchivo').innerHTML =
                  '<embed src="'+e.target.result+'" width="800" height="1000" />';
              };
              visor.readAsDataURL(archivoInput.files[0]);
          }
      }
  }
  </script>
  <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>