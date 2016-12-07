@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Liste des articles</div>

                    <div class="panel-body">
                        @foreach($list as $post)
                            <h2>
                                <a href="{{ route('event.show', $post->id) }}">{{ $post->name }}</a>
                            </h2>
                            <p>Description: {{ $post->description }}</p>
                            <h3>Debut : {{ $post->date_de_debut }}</h3>
                            <h3>Fin : {{ $post->date_de_fin }}</h3>
                            <h4>Lieu :{{ $post->lieu }}</h4>
                            <h4>Tarif :{{ $post->tarif }}</h4>
                        @endforeach

                        {!! $list->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection