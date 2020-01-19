@extends('base')
@section('content')

  <div class="col-sm-8">
    <h2>
      Lista de libros
      <a href="{{ route('books.create') }}" class="btn btn-success pull-right">
        <span class="glyphicon glyphicon-plus"></span> Nuevo
      </a>
    </h2>
    @include('partials.info')
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
        @foreach($books as $book)
          <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->titulo }}</td>
            <td>{{ $book->edicion}}</td>
            <td>{{ $book->tipo}}</td>
            @if($book->disponible == 1)
              <td class="text-center">{{ "si"}}</td>
            @endif
            @if($book->disponible == 0)
              <td class="text-center">{{ "no"}}</td>
            @endif
            <td>{{ $book->ejemplares}}</td>
            @foreach($authors as $author)
              @if($book->author_id==$author->id)
                <td>{{ $author->nombres }}</td>
              @endif
            @endforeach
            <td>
              <a href="{{ route('books.show', $book->id ) }}" title="Ver" class="btn btn-link">
                <span class="glyphicon glyphicon-eye-open"></span>
              </a>
            </td>
            <td>
              <a href="{{ route('books.edit', $book->id ) }}" title="Editar" class="btn btn-link">
                <span class="glyphicon glyphicon-edit"></span>
              </a>
            </td>
            <td>
              <form action="{{ route('books.destroy', $book->id )}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-link" title="Eliminar">
                  <span class="glyphicon glyphicon-remove"></span>
                </button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {!! $books->render() !!}
  </div>

  <div class="col-sm-4">
    @include('partials.aside')
  </div>
@endsection
