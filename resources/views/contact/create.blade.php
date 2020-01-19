@extends('base')
@section('content')
  <div class="col-sm-8">
    <h2>
      Ingresar nuevo contacto
      <a href="{{ route('contacts.index')}}" class="btn btn-info pull-right">
        <span class="glyphicon glyphicon-share-alt"></span>Volver
      </a>
    </h2>
    @include('partials.error')
    <form class="form-horizontal" action="{{ route('contacts.store')}}" method="POST">
      @csrf
      <div class="form-group">
        <label class="control-label col-sm-2" for="nombre">Nombre:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  name="nombre" style="text-transform:uppercase;"
              onkeyup="javascript:this.value=this.value.toUpperCase();">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="telefono">Telefono:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="telefono">
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
@endsection
