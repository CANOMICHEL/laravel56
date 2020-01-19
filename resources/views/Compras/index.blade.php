@extends('base')
@section('content')

  <div class="col-sm-8">
    <h2>
      Lista de compras
      <a href="{{ route('compras.create') }}" class="btn btn-success pull-right">
        <span class="glyphicon glyphicon-plus"></span> Nuevo
      </a>
    </h2>
    @include('partials.info')
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
        @foreach($compras as $compra)
          <tr>
            <td>{{ $compra->idcompra }}</td>
            <td>{{ $compra->razon_social }}</td>
            <td>{{ $compra->estado}}</td>
            <td>{{ $compra->total}}</td>
            <td>
              <a href="{{ route('compras.show', $compra->idcompra ) }}" title="Ver" class="btn btn-link">
                <span class="glyphicon glyphicon-eye-open"></span>
              </a>
            </td>

            <td>
              <form action="{{ route('compras.destroy', $compra->idcompra )}}" method="POST">
                @csrf
                @method('DELETE')
                @if($compra->estado =='REGISTRADO')
                  <button class="btn btn-link" title="Anular">
                    <span class="glyphicon glyphicon-remove"></span>
                  </button>
                @endif

              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="col-sm-4">
    @include('partials.aside')
  </div>
@endsection
