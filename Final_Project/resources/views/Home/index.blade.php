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

            @if($user_id==$p->user_id)
            <a role="button" href="/edit/{{$p->id}}" class="btn btn-success" title="Edit Pertanyaan"><span class="fa fa-edit"></span></a>
            <a role="button" href="#" class="btn btn-danger" title="Delete Pertanyaan" onclick="return confirmFunction('{{$p->id}}','{{$p->judul}}')"><span class="fa fa-trash"></span></a>

            @else

            @if(in_array($user_id, explode(",",$p->upvoted_by)))

            @if($reputation > 14)
            <a role="button" href="#" class="btn btn-warning" title="Downvote Pertanyaan" onclick="return confirmVote('{{$p->id}}','{{$p->judul}}','downvote')"><span class="fa fa-arrow-down"></span></a>
            @endif

            @else
            <a role="button" href="#" class="btn btn-warning" title="Upvote Pertanyaan" onclick="return confirmVote('{{$p->id}}','{{$p->judul}}','upvote')"><span class="fa fa-arrow-up"></span></a>

            @if($reputation > 14)
            <a role="button" href="#" class="btn btn-warning" title="Downvote Pertanyaan" onclick="return confirmVote('{{$p->id}}','{{$p->judul}}','downvote')"><span class="fa fa-arrow-down"></span></a>
            @endif

            @endif

            @endif
            <form id="submitVote" method="post" style="display: none;">
              @method('PUT')
              @csrf()
              <input type="text" id="vote" name="vote" readonly>
            </form>

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
    if (confirm("Delete data " + judul + "?")) {}
  }

  function confirmVote(id, judul, vote) {
    const upperVote = vote[0].toUpperCase() + vote.slice(1)
    if (confirm(upperVote + " pertanyaan " + judul + "?")) {
      $("#vote").val(id);
      $("#submitVote").attr("action", "/pertanyaan/" + vote + "/" + id);
      $("#submitVote").submit();
    }
  }
</script>
@endsection