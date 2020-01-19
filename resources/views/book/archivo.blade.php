@section('content')
  <input type="file" id="archivoInput" class="col-md-offset-4 col-md-4" onchange="return validarExt()" />
  <br><br>
  <div id="visorArchivo">
    <!--Aqui se desplegará el fichero-->
  </div>
@push('scripts')
<script>

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
                '<embed src="'+e.target.result+'" width="500" height="375" />';
            };
            visor.readAsDataURL(archivoInput.files[0]);
        }
    }
}
</script>
@endpush
@endsection
