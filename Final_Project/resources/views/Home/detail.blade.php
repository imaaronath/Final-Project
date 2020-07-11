@extends('layouts.welcome')
@section('content')
<div class="container">

  <a href="/home" class="create2" style="color:white;">
    <div class="create">
      <p class="hindex navbar-brand">&nbsp;&nbsp;Kembali</p>
    </div>
  </a>

  <br>

  @foreach ($pertanyaan as $p)
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">{{$p->judul}}</h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
      <div class="form-group">
        <p>
          {!! $p->isi !!}
        </p>
        <p>
          @foreach(explode(";",$p->tag) as $tag)
          <button class="btn btn-primary btn-sm">{{$tag}}</button>
          @endforeach
        </p>
        <p class="text-right">Created at: <b>{{$p->created_at}}</b>
          <> Last Update: <b>{{$p->updated_at}}</b>
        </p>
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Jawaban</h3>
        </div>

        <div class="card-body">
          
        </div>

      </div>

    </div>

  </div>
</div>
@endforeach

@endsection