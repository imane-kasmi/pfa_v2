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
        {{-- <div class="logo-container"><img class="logo"src="{{ asset('images/notes/Design sans titre (56).png') }}"></div> --}}
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
            <a href="{{ route('notes.detail', ['id' => $note->id]) }}" class="note-link">
                <div class="note" data-topic="{{ $note->topic->name }}">
                    <div class="note-container">
                        
                         <div class="user-info">
                         @if ($note->user)
    <p>Nom de l'utilisateur : {{ $note->user->first_name }} {{ $note->user->family_name }}</p>
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
                        {{-- <p class="note-description">{{ $note->description }}</p> --}}
                        {{-- <p class="note-keywords">Keywords: {{ $note->keywords }}</p> --}}
                        
                       
                    </div>
                    <div class="image-container">
                       <img src="{{ asset('' . $note->photo) }}" alt="Photo de la note">
                    </div>
                    
                    <div class="more-details">
                        <i class="fa-regular fa-comment-dots " data-target="comment-section-{{ $note->id }}" id="comment-icon-{{ $note->id }}"></i>
                        <button class="see-more-button">
                            See More<i class="fas fa-arrow-right"></i>
                        </button> 
                    </div>
                    <div class="comment-section" id="comment-section-{{ $note->id }}" style="display: none;">
                        <!-- Comment section content goes here -->
                        <textarea placeholder="Add a comment"></textarea>
                        <button>Submit</button>
                    </div>
                    
                </div>
            </a>
            @endforeach
        </div>
    </div>
    </div>
    <a href="{{ route('notes.add') }}" id="add-note-btn" class="add-note-btn">+</a>
    
    <script src="{{ asset('js/app.js') }}"></script>
    
    
    <script>
        

       // JavaScript for rating functionality
       document.querySelectorAll('.note-rating i').forEach(star => {
       star.addEventListener('click', () => {
       const rating = parseInt(star.getAttribute('data-rating'));

       // Remove the 'star-filled' class from all stars
       document.querySelectorAll('.note-rating i').forEach(star => {
       star.classList.remove('star-filled');
       });

       // Add the 'star-filled' class for the clicked star and its following siblings
       for (let i = rating; i > 0; i--) {
       document.querySelector(`.note-rating i[data-rating="${i}"]`).classList.add('star-filled');
       }

       // If the clicked star is the first star, remove the 'star-filled' class if it has one
       if (rating === 1) {
       star.classList.toggle('star-filled');
       }
       });
       });

        // Prevent redirection when clicking on icons, rating, or user elements
       document.querySelectorAll('.note-rating i, .note-actions i, .user-info i, .user-info .user-name').forEach(element => {
       element.addEventListener('click', (event) => {
       event.preventDefault(); // Prevent the default behavior
       });
       });

        
        // JavaScript for toggling the comment section
        document.querySelectorAll('.fa-regular.fa-comment-dots').forEach(commentIcon => {
        commentIcon.addEventListener('click', (event) => {
            event.preventDefault(); // Prevent the default behavior of the click event
            const commentSectionId = event.target.getAttribute('data-target');
            const commentSection = document.getElementById(commentSectionId);
            commentSection.style.display = (commentSection.style.display === 'none') ? 'block' : 'none';
        });
        });
         // JavaScript for toggling the submit button
        const textarea = document.querySelector('.comment-textarea');
        const submitButton = document.querySelector('.comment-submit-button');
        textarea.addEventListener('input', () => {
        if (textarea.value.length > 0) {
            submitButton.style.display = 'block';
        } else {
            submitButton.style.display = 'none';
        }
        });
        // // JavaScript for search functionality
        // const searchInput = document.getElementById('search-input');
        // const notesContainer = document.getElementById('notes-container');

        // searchInput.addEventListener('input', () => {
        // const searchQuery = searchInput.value.toLowerCase();
        // const noteElements = notesContainer.getElementsByClassName('note');

        // for (let i = 0; i < noteElements.length; i++) {
        //     const noteElement = noteElements[i];
        //     const userNameElement = noteElement.querySelector('.user-name');
        //     const userName = userNameElement.textContent.toLowerCase();

        // if (userName.includes(searchQuery)) {
        // noteElement.style.display = '';
        // } else {
        // noteElement.style.display = 'none';
        // }
        // }
        // });

       
       
     
    // JavaScript for search functionality
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
                noteElement.style.display = ''; // Show the note if the title matches the search query
            } else {
                noteElement.style.display = 'none'; // Hide the note if the title does not match the search query
            }
        }
    });
    // $(document).ready(function() {
    //     $('.user-icon').on('click', function() {
    
    //     });
    // });
  


    


    </script>
</body>
</html>
