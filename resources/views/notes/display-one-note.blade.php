{{-- <!DOCTYPE html>
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
                        <i class="fa-solid fa-user"></i>
                        <p class="user-name">user name</p>  
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
                    <h3 class="note-title">NOTE 1{{ $note->title }}</h3>

                    <div class="note-details-1">
                        <p class="note-topic-id">Topic: </p>
                        <p class="note-discipline">Discipline:</p>
                    </div>

                </div>

                <div class="image-container">
                    <img src="{{ asset('images/notes/1712283000.jpg') }}"/>
                    {{-- <img src="{{ asset('C:\public\storage\notes' . $note->photo) }}" alt="Image de la note:" class="img-fluid"> --}}   
                {{-- </div>

                <div class="another-details">

                    <p class="note-description">Description:{{ $note->description }}</p>
                    <p class="note-keywords">Keywords: {{ $note->keywords }}</p>

                </div>
                
                <div class="comment-section" id="comment-section-{{ $note->id }}">
                    <!-- Comment section content goes here -->
                    <div class="comment">
                        <div class="comment-user">
                            <i class="fa-solid fa-user"></i>
                            <input type="text" id="comment-input" placeholder="Write a comment...">
                        </div>
                        <button class="comment-submit" id="submitButton">Submit</button>
                    </div>
                </div>
                 

            </div>
            <script>
                // Get the input element
                const input = document.getElementById('comment-input');

                // Get the submit button element
                const submitButton = document.getElementById('submitButton');

                // Add event listener to input for input event
                input.addEventListener('input', () => {
                // If input value is not empty, show the submit button
                if (input.value.trim() !== '') {
                submitButton.style.display = 'block';
                } else {
                submitButton.style.display = 'none';
                }
                });

                // Add event listener to submit button
        document.getElementById('submitButton').addEventListener('click', () => {
            const commentContent = input.value.trim();
            if (commentContent !== '') {
                // Create a new comment element
                const commentElement = document.createElement('div');
                commentElement.classList.add('comment');

                // Create a user icon element
                const userIcon = document.createElement('i');
                userIcon.classList.add('fa-solid', 'fa-user');
                
                // Create a paragraph element for the comment content
                const commentText = document.createElement('p');
                commentText.textContent = commentContent;

                // Append user icon and comment content to the comment element
                commentElement.appendChild(userIcon);
                commentElement.appendChild(commentText);

                // Append the comment element to the comment section
                commentSection.appendChild(commentElement);

                // Clear the input field
                input.value = '';

                // Hide the submit button
                document.getElementById('submitButton').style.display = 'none';
            }
        });

            </script>
        </body>
    </html> --}} 
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
                <i class="fa-solid fa-user"></i>
                <p class="user-name">user name</p>  
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
            <h3 class="note-title">NOTE 1 {{ $note->title }}</h3>

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
{{ $note->id}}



    <p>Aucun commentaire pour le moment.</p>

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
    <small>{{ $commentaire->created_at }}</small>
    <p>{{ $commentaire->Contenu }}</p>

</div>
@endforeach


    <!-- Inclure jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
</body>
