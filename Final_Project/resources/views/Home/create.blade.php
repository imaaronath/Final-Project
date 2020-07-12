@extends('layouts.welcome4')
@section('content')
<div class="container">

  <a href="/home" class="create2" style="color:white;">
    <div class="create">
      <p class="hindex navbar-brand">&nbsp;&nbsp;Kembali</p>
    </div>
  </a>

  <br>

  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Buat Pertanyaan Baru</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="/store">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="judul">Judul</label>
          <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Pertanyaan" required>
        </div>
        <div class="form-group">
          <label for="isi">Pertanyaan</label>
          <textarea class="form-control" id="isi" name="isi" placeholder="Isi Pertanyaan di Sini"></textarea>
        </div>
        <div class="form-group">
          <label for="tag">Tag</label>
          <input type="text" class="form-control" id="tag" name="tag" placeholder="Gunakan titik koma (;) untuk memisahkan tag. Cth: laravel;belajar;php" required>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>

<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script>
  tinymce.init({
    selector: '#isi',
    width: 900,
    height: 300
  });
</script>
@endsection


