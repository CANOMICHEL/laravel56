@extends('base')
@section('content')
  <div class="col-sm-8">
    <h2>
      Editar libro
      <a href="{{ route('books.index')}}" class="btn btn-info pull-right">
        <span class="glyphicon glyphicon-share-alt"></span>Volver
      </a>
    </h2>
    @include('partials.error')
    <form class="form-horizontal" action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label class="control-label col-sm-2" for="titulo">Titulo:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  name="titulo" style="text-transform:uppercase;"
                 onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$book->titulo }}">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="edicion">Edicion:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="edicion" value="{{$book->edicion }}">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="tipo">Tipo:</label>
        <div class="col-sm-10">
          <label class="radio-inline">
            <input type="radio" name="tipo" value="DIGITAL" @if($book->tipo == "DIGITAL") checked @endif >Digital
          </label>
          <label class="radio-inline">
            <input type="radio" name="tipo" value="IMPRESO" @if($book->tipo == "IMPRESO") checked @endif >Impreso
          </label>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="disponible">Disponible:</label>
        <div class="col-sm-10">
          <div class="checkbox">
            <label><input type="checkbox" name="disponible" {{ $book->disponible ? 'checked': ''}}>Disponible</label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="ejemplares">Ejemplares:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="ejemplares" value="{{$book->ejemplares}}">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="imagen">Imagen:</label>
        <div class="col-sm-10">
          <input type="file" name="imagen">
          <input type="text" name="imagen_bd" value="{{$book->imagen}}" hidden="">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="publicacion">Publicacion:</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" name="publicacion" value="{{$book->publicacion}}">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="autor">Autor:</label>
        <div class="col-sm-10">
          <select class="form-control" id="autor" name="autor">
            @foreach($authors as $author)
              <option value="{{ $author->id }}" {{$author->id == $book->author_id ? 'selected' : ''}}>
                {{ $author->nombres }}
              </option>
            @endforeach
          </select>
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
    @include('partials.aside')
    <img src="/images/{{$book->imagen}}" class="img.thumbnail" title="{{$book->titulo}}">
    <div class="alert alert-success">
      <strong>{{$book->titulo}}</strong>
    </div>
  </div>
@endsection
