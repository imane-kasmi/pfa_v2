<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app1.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Profil de {{ $user->first_name }} {{ $user->family_name }}</title>
</head>
<body>
    <div class="user-info-container">
        <div class="background-image">
            <img src="{{ asset('images/notes/photodecouverture.jpg') }}" alt="Profile Image">
            <div class="profile-image-container">
                @if ($user->photo_de_profil)
                    <img src="{{ asset('storage/' . $user->photo_de_profil) }}" alt="Photo de profil de {{ $user->first_name }}">
                @endif
            </div>
        </div>
        <div class="pencil-icon" onclick="toggleEditForm()">
            <img src="{{ asset('images/notes/icone_modification_profile.png') }}" alt="Edit Icon">
            @if (Auth::check())
                <a href="{{ route('notes.display-note') }}">Voir les notes</a>
            @endif
        </div>
        <div class="profile-infos">
            <div class="profile-name">
                <h1>{{ $user->first_name }} {{ $user->family_name }}</h1>
            </div>  
            <div class="infos"> 
                <div class="profile-university">
                    <p class="title-infos">University</p>
                    <p class="user-infos">{{ $user->university }}</p>
                </div>
                <div class="profile-filiére">
                    <p class="title-infos">Study Field</p>
                    <p class="user-infos">{{ $user->study_field }}</p>
                </div>  
                <div class="profile-niveau-d'étude">
                    <p class="title-infos">Study Level</p>
                    <p class="user-infos">{{ $user->study_level }}</p>
                </div>
                <div class="profile-email">  
                    <p class="title-infos">Email</p>
                    <p class="user-infos">{{ $user->email }}</p>
                </div>
            </div>
        </div>
    </div>

    <div id="edit-form" class="edit-form" style="display: none;">
        <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <label>Nom:</label>
            <input type="text" name="first_name" value="{{ $user->first_name }}" required><br>
            <label>Prénom:</label>
            <input type="text" name="family_name" value="{{ $user->family_name }}" required><br>
            <label for="email">Email:</label><br>
            <input type="email" name="email" value="{{ $user->email }}" required><br>
            <label>Numéro de téléphone:</label><br>
            <input type="text" name="phone" value="{{ $user->phone }}"><br>
            <label>Université:</label><br>
            <input type="text" name="university" value="{{ $user->university }}"><br>
            <label>Filière:</label><br>
            <input type="text" name="study_field" value="{{ $user->study_field }}"><br>
            <input type="file" name="profile_image" accept="image/*">
            <button type="submit">Enregistrer les modifications</button>
        </form>
    </div>    

    <div class="search-container">
        <input type="text" id="search-input" placeholder="Search..." oninput="searchNotes()">
        <button onclick="searchNotes()"><i class="fas fa-search"></i></button>
    </div>

    
    <div class="user-saved-notes">
        <h3>Notes enregistrées par {{ $user->first_name }} {{ $user->family_name }}</h3>
        <div class="container">
            <div class="content">
                @foreach($savedNotes as $savedNote)
                    <a href="{{ route('notes.detail', ['id' => $savedNote->note->id]) }}" class="note-link">
                        <div class="note">
                            <div class="note-container">
                                <div class="content-image">
                                    <img src="{{ asset('' . $savedNote->note->photo) }}" alt="Note Image">
                                </div>
                                <div class="content-details">
                                    <h3>{{ $savedNote->note->title }}</h3>
                                    <p>{{ $savedNote->note->description }}</p>
                                    <p>Module: {{ $savedNote->note->topic->name }}</p>
                                    <p>Date: {{ $savedNote->note->created_at->format('d-m-Y') }}</p>
                                </div>
                                <form action="{{ route('saved-notes.destroy', ['id' => $savedNote->note->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="user-notes">
        <h3>Notes partagées par {{ $user->first_name }} {{ $user->family_name }}</h3>
        <div class="container">
            <div class="content">
                <div id="notes-container">
                    @foreach($notes as $note)
                        <a href="{{ route('notes.detail', ['id' => $note->id]) }}" class="note-link">
                            <div class="note" data-topic="{{ $note->topic->name }}">
                                <div class="note-container">
                                    <div class="user-info">
                                        @if ($note->user)
                                            <p class="user-name">{{ $note->user->first_name }} {{ $note->user->family_name }}</p>
                                        @endif
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
                                    <h3 class="note-title">{{ $note->title }}</h3>
                                    <p class="note-topic-id">Topic: {{ $note->topic->name }}</p>
                                    <div class="image-container">
                                        @if ($note->photo)
                                            <img src="{{ asset($note->photo) }}" alt="Photo de la note">
                                        @endif
                                    </div>
                                    <div class="more-details">
                                        <button class="see-more-button">
                                            See More<i class="fas fa-arrow-right"></i>
                                        </button> 
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        function searchNotes() {
            const searchTerm = document.getElementById('search-input').value.toLowerCase();
            const notes = document.querySelectorAll('.note');

            notes.forEach(note => {
                const title = note.querySelector('.note-title').textContent.toLowerCase();
                const topic = note.querySelector('.note-topic-id').textContent.toLowerCase();
                const name = note.querySelector('.user-name').textContent.toLowerCase();

                if (title.includes(searchTerm) || topic.includes(searchTerm) || name.includes(searchTerm)) {
                    note.style.display = 'block';
                } else {
                    note.style.display = 'none';
                }
            });
        }

        document.getElementById('search-input').addEventListener('input', searchNotes);

        function toggleEditForm() {
            const editForm = document.getElementById('edit-form');
            editForm.style.display = editForm.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>
</html>
