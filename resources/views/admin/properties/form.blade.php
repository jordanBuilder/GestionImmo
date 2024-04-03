@extends('admin.layout')

@section('title',$property->exists ? "Editer un bien" : "Créer un bien")

@section('content')

    <h1>@yield('title')</h1>
    <form class = "vstack gap-2" action="{{route($property->exists ? 'admin.property.update': 'admin.property.store',['property'=>$property])}}" method="POST">
        @csrf
        @method($property->exists ? 'put' : 'post')
        <div class="row">
            @include('shared.input',['class' => 'col','label'=>'Titre', 'name'=> 'title','value'=>$property->title])
            <div class="col row">
                @include('shared.input',['class' => 'col','label'=>'Surface', 'name'=> 'surface','value'=>$property->surface])
    
                @include('shared.input',['class' => 'col','label'=>'Prix', 'name'=> 'price','value'=>$property->price])
            </div>
        </div>

        @include('shared.input',['label'=>'description', 'name'=> 'description',
        'type' =>'textarea',
        'value'=>$property->description])   
    
        <div class="row">
            @include('shared.input',['class' => 'col','label'=>'Pieces', 'name'=> 'rooms',
            'value'=>$property->rooms]) 

            @include('shared.input',['class' => 'col','label'=>'chambres', 'name'=> 'bedRooms',
            'value'=>$property->bedRooms])

            @include('shared.input',['class' => 'col','label'=>'Etages', 'name'=> 'floor',
            'value'=>$property->floor]) 
        </div>

        <div class="row">
            @include('shared.input',['class' => 'col','label'=>'Adresse', 'name'=> 'address',
            'value'=>$property->address]) 

            @include('shared.input',['class' => 'col','label'=>'Ville', 'name'=> 'city',
            'value'=>$property->city])

            @include('shared.input',['class' => 'col','label'=>'Code postal', 'name'=> 'codePostal',
            'value'=>$property->codePostal]) 
        </div>
        @include('shared.checkbox',['label'=>'Vendu', 'name'=> 'sold',
            'value'=>$property->sold])
        <div>
            <button class="btn btn-primary">
                @if($property->exists)
                    Modifier
                @else
                    Créer
                @endif
            </button>
        </div>

    </form>
@endsection