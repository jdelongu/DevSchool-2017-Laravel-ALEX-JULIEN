<?php

namespace App\Http\Controllers;


use App\Models\Event;
use Auth;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Event::paginate(3);
        return view('events.index', compact('list'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
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
            'name'=> 'required|min:2',
            'description' => 'required|min:20',
            'date_de_debut' => 'required',
            'date_de_fin' => 'required',
            'lieu'=> 'required|min:1',
            'tarif'=> 'required'
        ],
            [
                'name.required'=> 'Nom de l\'evenement requis',
                'nom.min' => 'Le nom doit faire au moins 2 caractères',
                'description.required'=> 'Contenu requis',
                'description.min' => 'Le contenu doit faire au moins 20 caractères',
                'date_de_debut.required'=> 'Date de début requise',
                'date_de_fin.required'=> 'Date de fin requise',
                'lieu.required'=> 'Lieu requis',
                'lieu.min' => 'Le lieu doit faire au moins 1 caractère reconnu par l\'associations des licornes',
                'tarif.required'=> 'Tarif requis',

            ]);
        $post = new Event;
        $input = $request->input();
        $input['organ_id'] = Auth::user()->id;
        $post->fill($input)->save();
        return redirect()
            ->route('event.index')
            ->with('success', 'L\'article a bien été ajouté.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
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
            ->route('event.show')
            ->with('success', 'L\'article a bien été ajouté.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()
            ->route('event.index')
            ->with('success', 'L\'article a bien été supprimé.');
    }
}
