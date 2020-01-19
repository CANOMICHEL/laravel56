@extends('base')
@section('content')
  <div class="col-sm-8">
    <h2>
      {{ $contact->nombre }}
      <a href="{{route('contacts.index')}}" class="btn btn-info pull-right">
        <span class="glyphicon glyphicon-share-alt"></span>Volver
      </a>
    </h2>
    <h3>
      {{ $contact->telefono }}
    </h3>
  </div>
  <div class="col-sm-4">

  </div>
@endsection
