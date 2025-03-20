@extends('../../../layouts.app')

@section('content')


<div class="bg-white p-6 rounded-lg shadow-md">
    <h1>tes</h1>
    <div class="items-center justify-center">
        <video id="preview" class="h-1/2 w-1/2"></video>

        <form action="{{ route('catatan.scan') }}" method="POST" id="form">
            <input type="hidden" name="id_catatan" id="id_catatan">
        </form>
    </div>    
</div>
@endsection


@section('scripts')
<script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        console.log(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });

      scanner.addListener('scan', function (content) {
          document.getElementById('id_catatan').value = c;
          document.getElementById('form').submit();
      })

</script>

@if(session('success'))
    <script>
        Swal.fire({
            title: "Berhasil!",
            text: "{{ session('success') }}",
            icon: "success",
            timer: 500, // Auto close dalam 3 detik
            showConfirmButton: false
        });
    </script>
@endif

@endsection