@extends('base')

@section('title', $property->title)

@section('content')
    <div class="container mt-4">
        <h1>
            {{ $property->title }}
        </h1>
        <h2>
            {{ $property->rooms }}
            Pieces - {{ $property->surface }} m²
        </h2>
        <div class="text-primary fw-bold" style="font-size: 4rem">
            {{ number_format($property->price, thousands_separator: ' ') }} FCFA
        </div>
        <hr>
        </hr>
        <div class="mt-4">
            <h4>Interessé par ce bien ? </h4>

            <form action="" method="post" class="vstack gap-3">
                @csrf
                <div class="row">
                    @include('shared.input', [
                        'class' => 'col',
                        'label' => 'Prénom',
                        'name' => 'firstname',
                    ])

                    @include('shared.input', ['class' => 'col', 'label' => 'Nom', 'name' => 'lastname'])
                </div>
                <div class="row">
                    @include('shared.input', ['class' => 'col', 'label' => 'Telephone', 'name' => 'phone'])

                    @include('shared.input', [
                        'class' => 'col',
                        'type' => 'email',
                        'label' => 'Email',
                        'name' => 'email',
                    ])
                </div>

                @include('shared.input', [
                    'class' => 'col',
                    'type' => 'textarea',
                    'label' => 'Votre message',
                    'name' => 'message',
                ])
                <div>
                    <button class="btn btn-primary">
                        Nous contacter
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-4">
            <p>
                <!--
                        Syntaxe !! pour dire de ne pas echapper ce que va taper l'utilisateur donc ça veut dire qu'on a confiance en lui-->
                {!! nl2br($property->description) !!}
            </p>
            <div class="row">
                <div class="col-8">
                    <h2>
                        Caractéristiques
                    </h2>
                    <table class="table table-stripped">
                        <tr>
                            <td>
                                Surface habitable
                            </td>
                            <td>
                                {{ $property->surface }}m²
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Pieces
                            </td>
                            <td>
                                {{ $property->rooms }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Chambres
                            </td>
                            <td>
                                {{ $property->bedRooms }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Etages
                            </td>
                            <td>
                                {{ $property->floor ?: 'Rez de chaussées' }}
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Localisation
                            </td>
                            <td>
                                {{$property->address
                                }}
                                
                                {{ $property->city }} - {{ $property->codePostal }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <h2>
                        Spécifités
                    </h2>
                    <ul class="list-group">
                        @foreach ($property->options as $option)
                            <li class="list-group-item m-2">
                                {{ $option->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            </p>
        </div>
    </div>
@endsection
