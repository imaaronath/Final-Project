<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use App\Models\Jawaban;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class PertanyaanController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    public function index()
    {
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
                "upvoted_by" => "-"
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
        $pertanyaan = Pertanyaan::where("id", $id)->get();
        $data = Jawaban::where("id", $id)->get();
        return view("home.detail")->with([
            "pertanyaan" => $pertanyaan,
            "data" => $data
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
}
