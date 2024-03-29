@extends('template')

@section('homes')

<div class="col py-3"> 
<div class="card">
    <h5 class="card-header">Featured</h5>
    <br>
    <div class="card-body">
               <div class="row"> 
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <img src="{{ asset('images/'.$post->Foto) }}" height="315px" width="315px" alt="...">
                </div>
                <form class="mb-3 col">
                  <div class="form-group">
                    <label for="NIS">NIS</label>
                    <input type="number" class="form-control" value="{{$post->NIS}}" id="NIS" aria-describedby="emailHelp" placeholder="NIS">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama</label>
                    <input type="text" class="form-control" value="{{$post->Nama}}" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="Alamat">Alamat</label>
                    <input type="text" class="form-control" value="{{$post->Alamat}}" id="Alamat" placeholder="Alamat">
                  </div>
                  <div class="form-group">
                    <label for="Email">Email</label>
                    <input type="email"  class="form-control arrow-togglable" name="Email"  value="{{$post->Email}}" id="Email" placeholder="Email">
                  </div>
                  <div class="Jurusan">
                    <label for="Email">Email</label>
                    <input type="email"  class="form-control arrow-togglable" name="Kelas_id"  value=" {{$post->kelas->Nama}}" id="Email" placeholder="Email">
                  </div>
                  <br>
                
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  
                </form>
              
                 
            
                  </div>
    </div>
  </div>
@endsection
<script>
      var elements = document.getElementsByClassName("arrow-togglable");
    var currentIndex = 0;

    document.onkeydown = function(e) {
      switch (e.keyCode) {  
        case 38:
          currentIndex = (currentIndex == 0) ? elements.length - 1 : --currentIndex;
          elements[currentIndex].focus();
          break;
        case 40:
          currentIndex = ((currentIndex + 1) == elements.length) ? 0 : ++currentIndex;
          elements[currentIndex].focus();
          break;
      }
    };
</script>