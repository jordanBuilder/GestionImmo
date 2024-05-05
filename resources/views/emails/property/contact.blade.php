<x-mail::message>
# Nouvelle demande de contact

Une nouvelle demande de contact a été fait pour le bien <a href="{{ route('property.show',['slug' =>$property->getSlug(),'property'=>$property])}}">{{ $property->title }}</a>

<ul>
    <li>
        Prénom : {{ $data['firstname'] }}
    </li>
    <li>
        Nom : {{ $data['lastname'] }}
    </li>
    <li>
        Téléphone : {{ $data['phone'] }}
    </li>
    <li>
        Email : {{ $data['email'] }}
    </li>
</ul>





**Message :** <br/>
{{ $data['message'] }}

</x-mail::message>
