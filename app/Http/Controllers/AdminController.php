<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(3);
        $posts = Article::paginate(5);
        return view('admins.index', compact('events','posts'));
    }

    public function edit1($id)
    {
        $post = Article::findOrFail($id);
        // Affiche le formulaire d'édition d'article

        return view('admins.editevent', compact('post'));
    }

    public function edit2($id)
    {
        $post = Article::findOrFail($id);
        // Affiche le formulaire d'édition d'article

        return view('admins.editarticle', compact('post'));
    }

    public function update1(Request $request, $id)
    {
        $this->validate($request, [
            'name'=> 'required|min:2',
            'description' => 'required|min:20',
            'datededebut' => 'required',
            'datedefin' => 'required',
            'lieu'=> 'required|min:1',
            'tarif'=> 'required'
        ],
            [
                'name.required'=> 'Nom de l\'evenement requis',
                'nom.min' => 'Le nom doit faire au moins 2 caractères',
                'description.required'=> 'Contenu requis',
                'description.min' => 'Le contenu doit faire au moins 20 caractères',
                'datededebut.required'=> 'Date de début requise',
                'datedefin.required'=> 'Date de fin requise',
                'lieu.required'=> 'Lieu requis',
                'lieu.min' => 'Le lieu doit faire au moins 1 caractère reconnu par l\'associations des licornes',
                'tarif.required'=> 'Tarif requis',

            ]);
        $post = new Event;
        $input = $request->input();
        $input['user_id'] = Auth::user()->id;
        $post->fill($input)->save();
        return redirect()
            ->route('admin.index')
            ->with('success', 'L\'article a bien été ajouté.');
    }

    public function update2(Request $request, $id)
    {
        $post = Article::findOrFail($id);
        $input = $request->input();
        $post->fill($input)->save();

        return redirect()
            ->route('admin.index')
            ->with('success', 'L\'article a bien été mis à jour');
    }
}
