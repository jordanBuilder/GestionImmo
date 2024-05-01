@extends('base')

@section('title', 'Tous nos  biens')

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="GET" class="container d-flex gap-2">
            @csrf
            <input type="number" name="surface" id="" placeholder="surface minimum" class="form-control" value="{{$input['surface'] ?? ''}}">

            <input type="number" name="rooms" id="" placeholder="nombre de pieces minimum" class="form-control" value="{{$input['rooms'] ?? ''}}">

            <input type="number" name="price" id="" placeholder="Budget max" class="form-control" value="{{$input['price'] ?? ''}}">

            <input name="title" id="" placeholder="Mot clé" class="form-control" value="{{$input['title'] ?? ''}}">

            <button class="btn btn-primary btn-sm flex-grow-0">
                Rechercher
            </button>
        </form>
    </div>

    <div class="container">
        <div class="row">
                @forelse($properties as $property)
                <div class="col-3 mb-4">
                    @include('property.card')
                </div>
                @empty
                <div class="col-3 mb-4 text-center container d-flex justify-content-center align-items-center">
                    Oups 😟 Aucun bien ne correspond à votre recherche
                </div>

                @endforelse
        </div>

        <div class="container my-4">
            {{$properties->links()}}
        </div>
    </div>


@endsection
