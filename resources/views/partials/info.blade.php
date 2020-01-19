@if(Session::has('mensaje'))
  <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
      &times;
    </button>
    {{ Session::get('mensaje') }}
  </div>
@endif
