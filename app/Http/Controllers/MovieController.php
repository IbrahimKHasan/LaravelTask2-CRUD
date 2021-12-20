<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index',compact('movies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'movie_name'=>'required',
            'movie_description'=>'required',
            'movie_gener'=>'required',
            'movie_img'=>'required'
        ]);
        $image = 'IMG'.'-'.time().'.'.$request->movie_img->extension();
        $request->movie_img->move(public_path('img'),$image);
        Movie::create([
        'movie_name'=>$request->movie_name,
        'movie_description'=>$request->movie_description,
        'movie_gener'=>$request->movie_gener,
        'movie_img'=>$image
        ]);
        return redirect('movies');
        // Movie::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie=Movie::find($id);
        return view('movies.show',compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie=Movie::find($id);
        return view('movies.update',compact('movie'));
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
        $request->validate([
            'movie_name'=>'required',
            'movie_description'=>'required',
            'movie_gener'=>'required',
            'movie_img'=>'required'
        ]);
        $image = 'IMG'.'-'.time().'.'.$request->movie_img->extension();
        $request->movie_img->move(public_path('img'),$image);
        Movie::where('id',$id)->update([
        'movie_name'=>$request->movie_name,
        'movie_description'=>$request->movie_description,
        'movie_gener'=>$request->movie_gener,
        'movie_img'=>$image
        ]);
        return redirect('movies');
        // $movie = Movie::find($id);
        // $movie->update($request->all());
        // return redirect('movies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Movie::destroy($id);
        return redirect('movies');
    }
}
