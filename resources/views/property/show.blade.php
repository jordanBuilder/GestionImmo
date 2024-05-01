@extends('base')

@section('title', $property->title)

@section('content')
<div class="container">

</div>
    <h1>
        {{ $property->title }}
    </h1>
    <h2>
        {{ $property->rooms }}
        Pieces - {{ $property->surface }} m²
    </h2>
    <div class="text-primary fw-bold" style="font-size: 4rem">
        {{ number_format($property->price, thousands_separator: ' ') }}
    </div>
    <hr>
    </hr>
    <div class="mt-4">
        <h4>Interessé par ce bien ? </h4>

        <form action="" method="post" class="vstack gap-3">
            @csrf
            <div class="row">
                @include('shared.input', ['class' => 'col', 'label' => 'Prénom', 'name' => 'firstname'])

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

            @include('shared.input',['class' => 'col','type'=>'textarea','label'=>'Votre message', 'name'=> 'message',
            'value'=>$property->rooms])
    <div>
        <button class="btn btn-primary">
            Nous contacter
        </button>
    </div>
        </form>
    </div>
</div>
@endsection
