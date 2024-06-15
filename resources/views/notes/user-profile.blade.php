<!-- resources/views/notes/user-profile.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil de {{ $user->first_name }} {{ $user->family_name }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="profile-header">
            <h1>Profil de {{ $user->first_name }} {{ $user->family_name }}</h1>
            @if ($user->photo_de_profil)
                <img src="{{ asset('storage/' . $user->photo_de_profil) }}" alt="Photo de profil de {{ $user->first_name }}">
            @endif
            <p>{{ $user->email }}</p>
            <p>{{ $user->university }}</p>
            <p>{{ $user->study_field }}</p>
            <p>{{ $user->study_level }}</p>
        </div>
        <div class="user-notes">
            <h2>Notes partagées par {{ $user->first_name }} {{ $user->family_name }}</h2>
            @foreach($notes as $note)
                <div class="note">
                    <h3>{{ $note->title }}</h3>
                    <p>{{ $note->description }}</p>
                    @if ($note->photo)
                      <img src="{{ asset('' . $note->photo) }}" alt="Photo de la note">
                    @endif
                    <p>Publié le : {{ $note->published_at }}</p>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
