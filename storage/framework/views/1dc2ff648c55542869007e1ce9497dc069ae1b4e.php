<?php $__env->startSection('content'); ?>
  <div class="col-sm-8">
    <h2>
      Ingresar nueva compra
      <a href="<?php echo e(route('compras.index')); ?>" class="btn btn-info pull-right">
        <span class="glyphicon glyphicon-share-alt"></span>Volver
      </a>
    </h2>
    <?php echo $__env->make('partials.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <form class="form-horizontal" action="<?php echo e(route('compras.store')); ?>" method="POST">
      <?php echo csrf_field(); ?>

      <div class="form-group">
        <label class="control-label col-sm-2" for="proveedor">Proveedor:</label>
        <div class="col-sm-10">
          <select class="form-control" id="proveedor" name="proveedor">
            <?php $__currentLoopData = $proveedores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proveedor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($proveedor->idproveedor); ?>"><?php echo e($proveedor->razon_social); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
      </div>

      <div class="panel panel-primary">
        <div class="panel-body">
          <div class="form-group">
            <label class="control-label col-sm-2" for="producto">Producto:</label>
            <div class="col-sm-10">
              <select class="form-control selectpicker" id="producto" name="producto" data-live-search="true">
                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($producto->idproducto); ?>"><?php echo e($producto->nombre); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="cantidad">Cantidad:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="cantidad" name="cantidad">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="precio">Precio:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="precio" name="precio">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <button type="button" id="btn_add" class="btn btn-primary pull-right">Agregar</button>
        </div>
      </div>

        <table id="detalles" class="table table-hover table-striped table-condensed table-bordered">
          <thead style="background-color: #A9D0F5">
            <th>Operaciones</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
            <th>sub Total</th>
          </thead>
          <tfoot>
            <th></th>
            <th></th>
            <th></th>
            <th>TOTAL</th>
            <th><h4 id="total">S/. 0.00</h4></th>
          </tfoot>
          <tbody>
            <tr></tr>
          </tbody>
        </table>
      </div>
    </div>

      <div class="form-group" id="guardar">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success">
            <span class="glyphicon glyphicon-floppy-saved"></span> Guardar
          </button>
        </div>
      </div>
    </form>
  </div>
  <div class="col-sm-4">
    <?php echo $__env->make('partials.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>

<?php $__env->startPush('scripts'); ?>
<script>
  $(document).ready(function(){
    $("#btn_add").click(function(){
      agregar();
    });
  });

  function agregar(){
    idproducto =$("#producto").val();
    producto=$("#producto option:selected").text();
    cant =$("#cantidad").val();
    precio_unitario=$("#precio").val();

    if (idproducto != "" && cant != "" && cant>0 && precio_unitario!= "") {
      subtotal[cont]=cant*precio_unitario;
      total=total+subtotal[cont];

      var fila='<tr class="selected" id="fila'+cont+'"><td><button type"button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idproducto[]" value="'+idproducto+'">'+producto+'</td><td><input type="number" name="cant[]" value="'+cant+'"></td><td><input type="number" name="precio_unitario[]"value="'+precio_unitario+'"></td><td>'+(subtotal[cont]).toFixed(2)+'</td></tr>';
      cont++;
      limpiar();
      $("#total").html("S/. "+(total).toFixed(2));
      validar();
      $("#detalles").append(fila);


    }
    else{
      alert("error al ingesar la compra, revise los datos del producto.");
    }

  }
  var cont=0;
  total=0;
  subtotal=[];

  function limpiar(){
    $("#cantidad").val("");
    $("#precio").val("");
  }

  function validar(){
    if(total>0){
      $("#guardar").show();
    }else
    {
      $("#guardar").hide();
    }
  }

  function eliminar(i){
    total=total-subtotal[i];
    $("#total").html("S/. "+(total).toFixed(2));
    $("#fila"+i).remove();
    validar();
  }
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>