<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Details</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="note-detailed">

        <div class="note-container">
            
             <div class="user-info">
                
                @if ($note->user)
    <p>Nom de l'utilisateur : {{ $note->user->first_name }} {{ $note->user->family_name }}</p>
    @if ($note->user->photo_de_profil)
        <img src="{{ asset('storage/' . $note->user->photo_de_profil) }}" alt="Photo de profil de {{ $note->user->first_name }}">
    @endif
@endif
                <div>
                    <p class="note-published-at">Published at: {{ $note->created_at }}</p>
                </div>
             </div>
             
             <div class="note-rating">
                <i class="fa-regular fa-star" data-rating="1"></i>
                <i class="fa-regular fa-star" data-rating="2"></i>
                <i class="fa-regular fa-star" data-rating="3"></i>
                <i class="fa-regular fa-star" data-rating="4"></i>
                <i class="fa-regular fa-star" data-rating="5"></i>
            </div>

            <div class="note-actions">
                <i class="fa-regular fa-floppy-disk"></i>
                <i class="fa-solid fa-share"></i>
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>

        </div>

        <hr/>

        <div class="note-details">
            

            <div class="note-details-1">
                <p class="note-topic-name">Topic:{{ $note->topic->name }} </p>
                @if($note->topic)
    @if($note->topic->discipline->discipline)
        <p class="note-discipline">Discipline: {{ $note->topic->discipline->discipline }}</p>
    @endif
@endif

            </div>

        </div>

        <div class="image-container">
         <img src="{{ asset('' . $note->photo) }}" alt="Photo de la note">

        </div>

        <div class="another-details">

            <p class="note-description">Description:{{ $note->description }}</p>
            <p class="note-keywords">Keywords: {{ $note->keywords }}</p>

        </div>



    

<!-- Formulaire pour ajouter un commentaire -->
<!-- Formulaire pour ajouter un commentaire -->

<form id="comment-form" action="{{ route('notes.commentaires.store', ['id' => $note->id]) }}" method="POST">
    @csrf
    <input type="hidden" name="ID_note" value="{{ $note->id }}">
    <textarea name="Contenu" placeholder="Votre commentaire" rows="1"></textarea>
    <input type="number" name="rating" placeholder="Votre note (facultatif)">
    <button type="submit">Ajouter un commentaire</button>
</form>
@foreach ($note->commentaires as $commentaire) 
<div class ="comments">
<div class="comment-header">
            @if ($commentaire->utilisateur->photo_de_profil)
                <img src="{{ asset('storage/' . $commentaire->utilisateur->photo_de_profil) }}" alt="Photo de profil de {{ $commentaire->utilisateur->name }}" class="profile-picture">
            @else
                <img src="{{ asset('storage/default-profile-picture.png') }}" alt="Photo de profil par défaut" class="profile-picture">
            @endif
            <span>{{ $commentaire->utilisateur->first_name }} {{ $commentaire->utilisateur->family_name }}</span>
        </div>
    <small>{{ $commentaire->created_at }}</small>
    <p>{{ $commentaire->Contenu }}</p>

</div>
@endforeach


    <!-- Inclure jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
</body>
