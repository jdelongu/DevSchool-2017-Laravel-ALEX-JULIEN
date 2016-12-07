@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $event->name }}</div>

                    <div class="panel-body">
                        {{ $event->content }}

                        <br>

                        <h2>{{ $event->name }}</h2>
                        <p>Description: {{ $event->description }}</p>
                        <h3>Debut : {{ $event->date_de_debut }}</h3>
                        <h3>Fin : {{ $event->date_de_fin }}</h3>
                        <h4>Lieu :{{ $event->lieu }}</h4>
                        <h4>Tarif :{{ $event->tarif }}</h4>

                        @if(Auth::check() && (Auth::user()->id==$event->organ_id))
                            <br>
                            <a href="{{ route('event.edit', $event->id) }}" class="btn btn-success">Modifier</a>

                            {!! Form::model($event, [
                            'route' => ['event.destroy', $event->id],
                            'method' => 'DELETE'
                            ]) !!}

                            {!! Form::submit('Supprimer', ['class' => 'btn btn-danger']) !!}

                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection