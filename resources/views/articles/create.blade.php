@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Créer un article</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'article.store', 'method' => 'POST']) !!}

                        {!! Form::label('title', 'Titre de l\'article') !!}
                        {!! Form::text('title', null,
                        ['class' => 'form-control', 'placeholder' => 'Titre']) !!}

                        {!! Form::label('content', 'Contenu') !!}
                        {!! Form::textarea('content', null,
                        ['class' => 'form-control', 'placeholder' => 'Contenu']) !!}

                        <br>
                        {!! Form::submit('Publier', ['class' => 'btn btn-info']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection