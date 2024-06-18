<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Notes</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <header id="header">
        <div class="icons">
            <div class="user-icon"><i class="fas fa-user"></i></div>
            <div class="notification-icon"><i class="fas fa-bell"></i></div>
        </div>
    </header>
    <div class="search-container">
        <input type="text" id="search-input" placeholder="Search notes...">
        <i class="fas fa-search"></i>
    </div>
    <div class="container">
        <div class="content">
            <div id="notes-container">
                @foreach($notes as $note)
                    @if ($note->is_approved)
                        <a href="{{ route('notes.detail', ['id' => $note->id]) }}" class="note-link">
                            <div class="note" data-topic="{{ $note->topic->name }}">
                                <div class="note-container">
                                    <div class="user-info">
                                        @if ($note->user)
                                            <a href="{{ route('user.profile', ['id' => $note->user->id]) }}">
                                                {{ $note->user->first_name }} {{ $note->user->family_name }}
                                            </a>
                                            @if ($note->user->photo_de_profil)
                                                <img src="{{ asset('storage/' . $note->user->photo_de_profil) }}" alt="Photo de profil de {{ $note->user->first_name }}">
                                            @endif
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
                                </div>
                                <div class="image-container">
                                    <img src="{{ asset('' . $note->photo) }}" alt="Photo de la note">
                                </div>
                                <div class="more-details">
                                    <i class="fa-regular fa-comment-dots" data-target="comment-section-{{ $note->id }}" id="comment-icon-{{ $note->id }}"></i>
                                    <button class="see-more-button">
                                        See More<i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                                <div class="comment-section" id="comment-section-{{ $note->id }}" style="display: none;">
                                    <textarea placeholder="Add a comment"></textarea>
                                    <button>Submit</button>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <a href="{{ route('notes.add') }}" id="add-note-btn" class="add-note-btn">+</a>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.querySelectorAll('.note-rating i').forEach(star => {
            star.addEventListener('click', () => {
                const rating = parseInt(star.getAttribute('data-rating'));
                document.querySelectorAll('.note-rating i').forEach(star => {
                    star.classList.remove('star-filled');
                });
                for (let i = rating; i > 0; i--) {
                    document.querySelector(`.note-rating i[data-rating="${i}"]`).classList.add('star-filled');
                }
                if (rating === 1) {
                    star.classList.toggle('star-filled');
                }
            });
        });

        document.querySelectorAll('.note-rating i, .note-actions i, .user-info i, .user-info .user-name').forEach(element => {
            element.addEventListener('click', (event) => {
                event.preventDefault();
            });
        });

        document.querySelectorAll('.fa-regular.fa-comment-dots').forEach(commentIcon => {
            commentIcon.addEventListener('click', (event) => {
                event.preventDefault();
                const commentSectionId = event.target.getAttribute('data-target');
                const commentSection = document.getElementById(commentSectionId);
                commentSection.style.display = (commentSection.style.display === 'none') ? 'block' : 'none';
            });
        });

        const searchInput = document.getElementById('search-input');
        const notesContainer = document.getElementById('notes-container');
        searchInput.addEventListener('input', () => {
            const searchQuery = searchInput.value.toLowerCase();
            const noteElements = notesContainer.getElementsByClassName('note');
            for (let i = 0; i < noteElements.length; i++) {
                const noteElement = noteElements[i];
                const titleElement = noteElement.querySelector('.note-title');
                const title = titleElement.textContent.toLowerCase();
                if (title.includes(searchQuery)) {
                    noteElement.style.display = '';
                } else {
                    noteElement.style.display = 'none';
                }
            }
        });
    </script>
</body>
</html>
