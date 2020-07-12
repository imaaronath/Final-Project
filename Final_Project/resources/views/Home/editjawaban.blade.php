@extends('layouts.welcome')
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
      <h3 class="card-title">Edit Jawaban</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    @foreach ($jawaban as $j)
    <form method="POST" action="/update/{{$j->id}}">
      @method('PUT')
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="jawaban">Jawaban</label>
          <textarea class="form-control" id="jawaban" name="jawaban" placeholder="Isi Pertanyaan di Sini">{{$j->jawaban}}</textarea>
        </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
    @endforeach
  </div>
</div>

<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script>
  tinymce.init({
    selector: '#jawaban',
    width: 900,
    height: 300
  });
</script>
@endsection