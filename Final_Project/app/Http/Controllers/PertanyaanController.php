<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;

use App\User;

use App\Models\Jawaban;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class PertanyaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index()
    {

        $id = Auth::id();

        if ($id == "") {
            $pertanyaan = Pertanyaan::all();
            return view('home.index', ["pertanyaan" => $pertanyaan]);
        } else {
            $user = Auth::user();
            $pertanyaan = Pertanyaan::all();
            return view('home.index', ["pertanyaan" => $pertanyaan, "user_id" => $id, "reputation" => $user["reputation"]]);
        }
        $pertanyaan = Pertanyaan::all();
        return view('home.index')->with(["pertanyaan" => $pertanyaan]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Pertanyaan::all();
        return view('home.create')->with([
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();
        Pertanyaan::create(
            [
                "judul" => strtoupper($request->judul),
                "isi" => $request->isi,
                "tag" => $request->tag,
                "vote" => 0,
                "upvoted_by" => ""
            ]
        );

        return redirect("/home");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nama = Auth::user();
        $pertanyaan = Pertanyaan::where("id", $id)->get();
        $data = Jawaban::where("question_id", $id)->get();
        return view("home.detail")->with([
            "pertanyaan" => $pertanyaan,
            "data" => $data,
            "nama" => $nama
            ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaan = Pertanyaan::where("id", $id)->get();
        return view("home.edit", ["pertanyaan" => $pertanyaan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->judul = strtoupper($request->judul);
        $pertanyaan->isi = $request->isi;
        $pertanyaan->tag = $request->tag;
        $pertanyaan->save();
        return redirect("/home");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->delete();
        return redirect("/home");
    }

    public function upvote($id)
    {
        $id_user = Auth::id();
        $pertanyaan = Pertanyaan::find($id);
        if ($pertanyaan->upvoted_by == "") {
            $pertanyaan->upvoted_by = $id_user . ',';
        } else {
            $pertanyaan->upvoted_by = $pertanyaan->upvoted_by . $id_user . ',';
        }
        $pertanyaan->vote = $pertanyaan->vote + 1;
        $pertanyaan->save();

        $user = User::find($pertanyaan->user_id);
        $user->reputation = $user->reputation + 10;
        $user->save();

        return redirect("/home");
    }

    public function downvote($id)
    {
        $id_user = Auth::id();
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->vote = $pertanyaan->vote - 1;
        $pertanyaan->save();

        $user = User::find($pertanyaan->user_id);
        $user->reputation = $user->reputation - 1;
        $user->save();

        return redirect("/home");
    }
}
