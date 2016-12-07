@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">afficher le formulaire d'édition de l'article</div>
                    <div class="panel-body">

                        {!! Form::model(
                        $event,
                        array(
                        'route' => array('event.update', $event->id),
                        'method' => 'PUT'))
                        !!}

                        {{-- Champs du formulaire --}}
                        {!! Form::label('name', 'Nom') !!}

                        {!! Form::text('name', null,
                        ['class' => 'form-control',
                         'placeholder' => 'Nom']) !!}


                        {!! Form::label('description', 'Description') !!}

                        {!! Form::textarea('description', null,
                        ['class' => 'form-control',
                         'placeholder' => 'Description']) !!}


                        {!! Form::label('date_de_debut', 'Date de début') !!}

                        {!! Form::date('date_de_debut', \Carbon\Carbon::now()) !!}


                        {!! Form::label('date_de_fin', 'Date de fin') !!}

                        {!! Form::date('date_de_fin', \Carbon\Carbon::now()) !!}


                        {!! Form::label('lieu', 'Lieu') !!}

                        {!! Form::text('lieu', null,
                        ['class' => 'form-control',
                         'placeholder' => 'Lieu']) !!}

                        {!! Form::label('tarif', 'Tarif') !!}

                        {!! Form::number('tarif', 'value') !!}


                        {!! Form::submit('Publier',
                        ['class'=>'btn btn-info']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
