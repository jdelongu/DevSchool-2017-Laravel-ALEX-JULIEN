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
        $events = Event::paginate(5);
        $posts = Article::paginate(5);
        return view('admins.index', compact('events','posts'));
    }




}
