@extends('base')
@section('content')
  <div class="col-sm-8">
    <a href="{{route('books.index')}}" class="btn btn-info pull-right">
      <span class="glyphicon glyphicon-share-alt"></span>Volver
    </a>
    <div class="col-sm-19">
      <div class="col-sm-2">
        <img src="/images/{{$book->imagen}}" class="img.thumbnail" title="{{$book->titulo}}">
      </div>
      <div class="col-sm-15">
        <div class="col-sm-8">
          <label class="control-label col-sm-2" for="titulo">Título:</label>
          <label class="col-sm-9">{{$book->titulo}}</label>

        </div>
        <div class="col-sm-8">
          <label class="control-label col-sm-2" for="autor">Autor:</label>
          @foreach($authors as $author)
            @if($book->author_id==$author->id)
              <label class="col-sm-9">{{ $author->nombres }}</label>
            @endif
          @endforeach
        </div>
        <div class="col-sm-8">
          <label class="control-label col-sm-2" for="edicion">Edición:</label>
          <label class="col-sm-2">{{$book->edicion }}</label>
        </div>
      </div>
    </div>
     <div class="col-sm-8">
       <section class="text-center" >
           <input type="file" id="archivoInput" class="col-md-offset-4 col-md-4" onchange="return validarExt()" />
           <br><br>
           <div id="visorArchivo">
             <!--Aqui se desplegará el fichero-->
           </div>
         </section>

    </div>
  </div>


  @push('scripts')
  <script>
  $(document).ready(function(){
    $("#btn_add").click(function(){
      validarExt();
    });
  });

  function validarExt()
  {
      var archivoInput = document.getElementById('archivoInput');
      var archivoRuta = archivoInput.value;
      var extPermitidas = /(.pdf)$/i;
      if(!extPermitidas.exec(archivoRuta)){
          alert('Asegurese de haber seleccionado un PDF');
          archivoInput.value = '';
          return false;
      }

      else
      {
          //PRevio del PDF
          if (archivoInput.files && archivoInput.files[0])
          {
              var visor = new FileReader();
              visor.onload = function(e)
              {
                  document.getElementById('visorArchivo').innerHTML =
                  '<embed src="'+e.target.result+'" width="800" height="1000" />';
              };
              visor.readAsDataURL(archivoInput.files[0]);
          }
      }
  }
  </script>
  @endpush
@endsection
