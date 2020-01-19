@extends('base')
@section('content')
  <div class="col-sm-8">
    <h2>
      Detalles de la compra
    </h2>
    <a href="{{route('compras.index')}}" class="btn btn-info pull-right">
      <span class="glyphicon glyphicon-share-alt"></span>Volver
    </a>
    <div class="col-sm-8">
      @foreach ($proveedores as $prov)
      <label class="col-sm-8">PROVEEDOR: {{$prov->razon_social}}</label>
      @endforeach
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
          @foreach ($detalles as $detalle)
            <tr>
              <td>{{$detalle->idcompra}}</td>
              <td>{{$detalle->idproducto}}</td>
              <td>{{$detalle->nombre}}</td>
              <td>{{$detalle->cantidad}}</td>
              <td>S./ {{$detalle->precio_unitario}}</td>
              <td>S./ {{$detalle->cantidad*$detalle->precio_unitario}}</td>
            </tr>
          @endforeach
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td align="right">
            <strong>Total</strong></td>
          @foreach ($totals as $tt)
           <td>S./ {{$tt->total}}</td>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
@endsection
