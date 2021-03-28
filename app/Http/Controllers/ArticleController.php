<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        return Article::orderBy('id', 'desc')->get();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        if (request()->file) {
            $file = $request->file('file');
            $file_name = Storage::disk('s3')->put('/', $file, 'public');
            Article::create([
                "title" => request("title"),
                "content" => request("content"),
                "file_name" => $file_name
            ]);
        } else {
            Article::create([
                "title" => request("title"),
                "content" => request("content"),
            ]);
        };

        $article = Article::get();

        return $article;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        // $fetch_type = $request->input('type');
        // $ref_id     = $request->input('ref_id');
        // $posts = new Post;
        // return $posts->fetchPosts($fetch_type, $ref_id);
        // $comments = $post->comments()->orderBy('created_at', 'desc')->get();
        // return [
        //     'post'     => $post,
        //     'comments' => $comments,
        // ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
