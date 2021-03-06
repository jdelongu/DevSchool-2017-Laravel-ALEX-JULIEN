@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Publier un Évènement</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'event.store', 'method' => 'POST']) !!}

                        {!! Form::label('name', 'Nom') !!}
                        {!! Form::text('name', null,
                        ['class' => 'form-control', 'placeholder' => 'Nom']) !!}

                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', null,
                        ['class' => 'form-control', 'placeholder' => 'Description']) !!}

                        {!! Form::label('date_de_debut', 'Date de début') !!}
                        {!! Form::date('date_de_debut', \Carbon\Carbon::now()) !!}

                        {!! Form::label('date_de_fin', 'Date de fin') !!}
                        {!! Form::date('date_de_fin', \Carbon\Carbon::now()) !!}

                        {!! Form::label('lieu', 'Lieu') !!}
                        {!! Form::text('lieu', null,
                        ['class' => 'form-control', 'placeholder' => 'Lieu']) !!}

                        {!! Form::label('tarif', 'Tarif') !!}
                        {!! Form::text('tarif', null,
                        ['class' => 'form-control', 'placeholder' => 'Tarif']) !!}


                        <br>
                        {!! Form::submit('Publier', ['class' => 'btn btn-info']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection