@extends('layouts.welcome')
@section('content')
<div class="container">

  @guest
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <a role="button" href="/login" class="btn btn-primary">Sign In</a> or
  <a role="button" href="/register" class="btn btn-primary">Register</a> to Ask the Question
  <br>
  @else
  <a href="/create" class="create2" style="color:white;">
    <div class="create">
      <p class="hindex navbar-brand">&nbsp;&nbsp;Tulis Pertanyaanmu</p>
    </div>
  </a>
  @endguest

  <br>

  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">List Pertanyaan</h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
      <table class="table table-striped table-hover">
        <tr>
          <th>Judul</th>
          <th>Aksi</th>
        </tr>

        @foreach ($pertanyaan as $p)
        <tr>
          <th>{{$p->judul}}</th>
          <th>
            <a role="button" href="/show/{{$p->id}}" class="btn btn-primary" title="Detail Pertanyaan"><span class="fa fa-eye"></span></a>
            @guest
            <a role="button" href="/login" class="btn btn-primary">Sign In</a> or
            <a role="button" href="/register" class="btn btn-primary">Register</a> to Access This Feature
            @else
            <a role="button" href="#" class="btn btn-info" title="Jawab Pertanyaan"><span class="fa fa-plus"></span></a>
            <a role="button" href="/edit/{{$p->id}}" class="btn btn-success" title="Edit Pertanyaan"><span class="fa fa-edit"></span></a>
            <a role="button" href="#" class="btn btn-danger" title="Delete Pertanyaan" onclick="return confirmFunction('{{$p->id}}','{{$p->judul}}')"><span class="fa fa-trash"></span></a>
            @endguest
          </th>
        </tr>
        @endforeach
      </table>

    </div>
    <!-- /.card-body -->

    <div class="card-footer">

    </div>

  </div>
</div>

<script>
  function confirmFunction(id, judul) {
    if (confirm("Delete data " + judul + "?")) {
      window.location.href = '/delete/' + id;
    }
  }
</script>
@endsection