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
  @foreach($data as $a)
    <div class="card-body">
      <div class="form-group">
        <p>
          {!! $a->jawaban !!}
        </p>
        <p class="text-right">Created at: <b>{{$a->created_at}}</b>
          <> Last Update: <b>{{$a->updated_at}}</b>
        </p>
      </div>
    </div>
      @endforeach
    <!-- /.card-body -->

  <form action="{{route('jawaban.store')}}" method="POST">
    @csrf
    <div class="card-footer">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Jawaban</h3>
          <textarea class="form-control" name="jawaban" placeholder="Isi Jawabanmu"></textarea>
        </div>
      </div>
      <div class="card-body">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>
  @endforeach
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