@extends('base')

@section('title', 'Tous nos  biens')

@section('content')

    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="GET" class="container d-flex gap-2">
            @csrf
            <input type="number" name="price" id="" placeholder="Budget max" class="form-control" value="">
        </form>
    </div>

    <div class="container">
        <div class="row">
                @foreach($properties as $property)
                <div class="col-3 mb-4">
                @include('property.card')
                </div>
                @endforeach 
        </div>
        
        <div class="container my-4">
            {{$properties->links()}}
        </div>
    </div>

   
@endsection