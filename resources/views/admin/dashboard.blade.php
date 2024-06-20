<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit">Se déconnecter</button>
        </form>

        <h2>Unapproved Users</h2>
        <ul>
            @foreach($unapprovedUsers as $user)
                <li>
                {{ $user->first_name }} {{ $user->family_name }} - {{ $user->email }}
                    <form action="{{ route('admin.approve-user', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit">Approuver</button>
                    </form>
                    <form action="{{ route('admin.delete-user', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <h2>Unapproved Notes</h2>
        <ul>
            @foreach($unapprovedNotes as $note)
                <li>
                    <h3>{{ $note->titre }}</h3>
                    <p>{{ $note->description }}</p>
                    @if ($note->photo)
                        <img src="{{ asset('' . $note->photo) }}" alt="Photo de la note">
                    @endif
                    <p class="note-description">Description: {{ $note->description }}</p>
                    <p class="note-keywords">Keywords: {{ $note->keywords }}</p>

                    <form action="{{ route('admin.approve-note', $note->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit">Approuver</button>
                    </form>
                    <form action="{{ route('admin.delete-note', $note->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
