<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Article::paginate(5);

        // lister les articles
        return view('articles.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=> 'required|min:6',
            'content' => 'required|min:20'
        ],
            [
                'title.required'=> 'Titre requis',
                'title.min' => 'Le titre doit faire au moins 6 caractères',
                'content.required'=> 'Contenu requis',
                'content.min' => 'Le contenu doit faire au moins 20 caractères'

            ]);

        $post = new Article;
        $input = $request->input();
        $input['organ_id']=Auth::user()->id;

        $post->fill($input)->save();

        return redirect()
            ->route('article.index')
            ->with('success', 'L\'article a bien été ajouté');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Article::findOrFail($id);
        // Afficher un article

        return view('articles.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Article::findOrFail($id);
        // Affiche le formulaire d'édition d'article

        return view('articles.edit', compact('post'));
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
        $post = Article::findOrFail($id);
        $input = $request->input();
        $post->fill($input)->save();

        return redirect()
            ->route('article.show', $id)
            ->with('success', 'L\'article a bien été mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Article::findOrFail($id);
        $post->delete();

        return redirect()
            ->route('article.index')
            ->with('success', 'L\'article a bien été supprimé');
    }
}
