@extends('home')
@section('homes')

<div class="card">
    <h5 class="card-header">Tambah Data</h5>
    <div class="card-body">
          <form form action="{{url('simpan-data-siswa')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group" style="width: 50%;">
              <label for="NIS">NIS</label>
              <input type="number" class="form-control" maxlength="10" id="NIS" name="NIS" aria-describedby="NIS" placeholder="Masukan NIS" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==4) return false;">
            </div>
          <br>
        <div class="form-group" style="width: 50%;">
            <label for="Nama">Nama</label>
            <input type="text" class="form-control" id="Nama" name="Nama" aria-describedby="Nama" placeholder="Masukan Nama">
            @error('Nama')
            <div class="text-danger alert-danger">{{ $message }}</div>
        @enderror
          </div>
          <br>
          <div class="form-group" style="width: 50%;">
            <label for="Alamat">Alamat</label>
            <input type="text" class="form-control" id="Alamat" name="Alamat" aria-describedby="Alamat" placeholder="Masukan Alamat">
            @error('Alamat')
            <div class="text-danger alert-danger">{{ $message }}</div>
        @enderror
          </div>
          <br>
          <div class="form-group mb-3">
            <select  id="country-dropdown" class="form-control">
                <option value="">-- Pilih Jurusan --</option>
                @foreach ($jurusan as $data)
                <option value="{{$data->id}}">
                    {{$data->Nama_Jurusan}}
                </option>
                @endforeach
            </select>
        </div>
          <br>
          <div class="form-group" style="width: 50%;">
            <label for="Email">Email</label>
            <input type="text" class="form-control" id="Email" name="Email" aria-describedby="Email" placeholder="Masukan Email">
            @error('Nama')
            <div class="text-danger alert-danger">{{ $message }}</div>
        @enderror
          </div>
          <br>
          <div class="form-group" style="width: 50%;">
            <label for="NoHP">NoHP</label>
            <input type="text" class="form-control" id="NoHP" aria-describedby="NoHP" name="NoHP" placeholder="Masukan NoHP">
            @error('Nama')
            <div class="text-danger alert-danger">{{ $message }}</div>
        @enderror
          </div>
          <br>
            <div class="form-group" style="width: 50%;">
              <label for="NoHP">password</label>
          <input type="password" class="form-control" id="password" placeholder="password" name="password" aria-describedby="password">
    </div>
    <br>
      <div class="form-group" style="width: 50%;">
        <label for="NoHP">Upload foto</label>
      <input type="file" class="form-control" id="customFile">
      <label class="custom-file-label" for="customFile"></label>
    </div>
          <br>
          <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
          
        </form>
       
    </div>
  </div>
  <script>
    
    function visibility3() {
var x = document.getElementById('password');
if (x.type === 'password') {
  x.type = "text";
  $('#eyeShow').show();
  $('#eyeSlash').hide();
}else {
  x.type = "password";
  $('#eyeShow').hide();
  $('#eyeSlash').show();
}

}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        $(document).ready(function () {
            $('#country-dropdown').on('change', function () {
                var idJurusan = this.value;
                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{url('kelas')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dropdown').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                    }
                });
            });
  
            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#state-dropdown').on('change', function () {
                var idState = this.value;
                $("#city-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
  
        });
</script>
@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">