@extends('base')
@section('content')
  <div class="col-sm-8">
    <h2>
        Lista de Contactos
        <a href="{{ route('contacts.create') }}" class="btn btn-primary pull-right">
          <span class="glyphicon glyphicon-plus"></span>Nuevo
        </a>

        <a href="{{ route('contacts.pdf') }}" class="btn btn-primary pull-right">
          <span class="glyphicon glyphicon-print"></span>Imprimir
        </a>

    </h2>
    @include('partials.info')
    <table class="table table-hover table striped">
      <thead>
        <tr>
          <th width="20px">ID</th>
          <th>Nombre</th>
          <th>Teléfono</th>
          <th colspan="3">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        @foreach($contacts as $contact)
          <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->nombre }}</td>
            <td>{{ $contact->telefono}}</td>
            <td>
              <a href="{{ route('contacts.show', $contact->id ) }}" title="Ver" class="btn btn-link">
                <span class="glyphicon glyphicon-eye-open"></span>
              </a>
            </td>
            <td>
              <a href="{{ route('contacts.edit', $contact->id ) }}" title="Editar" class="btn btn-link">
                <span class="glyphicon glyphicon-edit"></span>
              </a>
            </td>
            <td>
              <form action="{{ route('contacts.destroy', $contact->id )}}" method="post">
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
    {!! $contacts->render() !!}
  </div>

  <div class="col-sm-4">
    @include('partials.aside')
  </div>
@endsection
