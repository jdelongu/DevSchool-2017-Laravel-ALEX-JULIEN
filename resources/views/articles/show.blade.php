@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $post->title }}</div>
                    <div class="panel-body">{{ $post->content }}
                        <br>
                        @if(Auth::check() && (Auth::user()->id==$post->organ_id))
                            <br>
                            <a href="{{ route('article.edit', $post->id) }}" class="btn btn-success">Modifier</a>
                            <br>

                            {!! Form::model(
                            $post,
                            array(
                            'route' => array('article.destroy', $post->id),
                            'method' => 'DELETE'))
                            !!}

                            {!! Form::submit('Supprimer',
                            ['class'=>'btn btn-danger']) !!}

                            {!! Form::close() !!}

                        @endif
                        <br>
                        <a href="{{ route('article.index') }}">Retour aux articles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection