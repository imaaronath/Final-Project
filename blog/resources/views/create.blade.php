@extends('master.welcome4')
@section('content')
<div class="container">
  <form style="margin-top:150px" action="/index">
  <div class="form-group">
    <label for="exampleFormControlInput1">Judul</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Pertanyaan</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="">
    <button type="submit" class="btn btn-primary">Buat Pertanyaan</button>
  </div>
</form>
</div>
@endsection
