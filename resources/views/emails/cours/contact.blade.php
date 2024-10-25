<x-mail::message>
# Nouvelle demande de contact

Une nouvelle demande de contact a été fait pour le bien <a href="{{ route('cour.show', ['slug' => $cour->getSlug(), 'cour' => $cour]) }}">{{ $cour->title }}</a>

- Prénom : {{ $data['firstname'] }}
- nom : {{ $data['lastname'] }}
- Téléphone : {{ $data['phone'] }}
- Email : {{ $data['email'] }}

**Message :**<br/>
{{ $data['message'] }}


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
