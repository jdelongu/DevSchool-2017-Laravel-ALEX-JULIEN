@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Liste des articles</div>
                    <div class="panel-body">
                        <h1>Articles de blog</h1>
                        @foreach($posts as $post)
                            <h2>{{$post->title}}</h2>
                            <p>{{$post->content}}</p>
                            <br>
                            <a href="{{ route('admin.edit', $post->id, 0) }}" class="btn btn-success">Modifier</a>
                            <br>

                            {!! Form::model(
                            $post,
                            array(
                            'route' => array('admin.destroy', $post->id, 0),
                            'method' => 'DELETE'))
                            !!}

                            {!! Form::submit('Supprimer',
                            ['class'=>'btn btn-danger']) !!}

                            {!! Form::close() !!}
                        @endforeach
                        {{$posts->links()}}
                        <h1>Evenements</h1>
                        @foreach($events as $event)
                            <h2>{{ $event->name }}</h2>
                            <p>Description: {{ $event->description }}</p>
                            <h3>Debut : {{ $event->date_de_debut }}</h3>
                            <h3>Fin : {{ $event->date_de_fin }}</h3>
                            <h4>Lieu :{{ $event->lieu }}</h4>
                            <h4>Tarif :{{ $event->tarif }}</h4>
                            <br>
                            <a href="{{ route('admin.edit', $post->id, 1) }}" class="btn btn-success">Modifier</a>
                            <br>

                            {!! Form::model(
                            $post,
                            array(
                            'route' => array('admin.destroy', $post->id, 1),
                            'method' => 'DELETE'))
                            !!}

                            {!! Form::submit('Supprimer',
                            ['class'=>'btn btn-danger']) !!}

                            {!! Form::close() !!}
                        @endforeach

                        {!! $events->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection