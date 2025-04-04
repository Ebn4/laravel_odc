<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Resources\ArticleResource;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return new JsonResource(Article::paginate(15));
        // return response()->json(Article::all());
        // return ArticleResource::collection(Article::all());
        return  ArticleResource::collection(Article::paginate(15));
        // // return response()->json($articles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'photo' =>'required|string',
            'auteur' => 'required|string',
            'content' => 'required|string'

        ]);

        $article = Article::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'photo' =>$request->photo,
            'auteur' => $request->auteur,
            'content' => $request->content,
        ]);

        return "Article a été créé";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::find($id);
        if(!$article){
            return "Article non trouvé";
        }

        return new ArticleResource($article);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
