@php
    use App\Contact;
    $contacts=Contact::all()
@endphp
<h2 class="col-sm-8">
Lista de contactos
</h2>
  <table class="table table-hover table-striped">
    <thead>
      <tr>
        <th width="20px">ID</th>
        <th>Nombres</th>
        <th>Teléfono</th>
      </tr>
    </thead>
    <tbody>
      @foreach($contacts as $contact)
        <tr>
          <td>{{ $contact->id }}</td>
          <td>{{ $contact->nombre }}</td>
          <td>{{ $contact->telefono}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
