<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\AdminController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/notes', [NoteController::class, 'displayNotes'])->name('notes.display-note');
Route::get('/notes/create', [NoteController::class, 'addNote'])->name('notes.add');
Route::post('/notes', [NoteController::class, 'storeNote'])->name('notes.store');
//Route::get('/notes/{id}', [NoteController::class, 'show'])->name('notes.detail');
Route::get('/notes/{id}', [NoteController::class, 'show'])->name('notes.detail');


//Route::get('/login', function () {
    // Define your login logic here
//})->name('login');

//Route::get('/user-page', [UserController::class, 'userPage'])->name('user.page');
Route::post('/notes/{id}', [CommentaireController::class, 'store'])->name('notes.commentaires.store');

Route::post('/notes/{id}/rate', 'NoteController@rate')->name('notes.rate');
// Route::get('/user/{id}', 'UserController@show')->name('display-user');
//Route::post('/user/register', [RegisterController::class, 'register'])->name('user.register');
//Route::get('/profile', [UserController::class, 'userPage'])->name('notes.display-user');


// $(document).ready(function() {
        //     $('.user-icon').on('click', function() {
        //         console.log("User icon clicked");
        //         window.location.href = "{{ route('user.page') }}";
        //     });
        // });
//Route::post('/user/update', 'UserController@update')->name('user.update');
//Route::post('/user/register', [RegisterController::class, 'register'])->name('notes.display-user');

    // Route pour traiter le formulaire d'inscription
//Route::post('/register-user', [RegisterController::class, 'register']);    

//Route::get('/register-user', function () {
 //   return view('notes.register-user');
//});


// Route pour afficher le formulaire d'inscription
//Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('notes.register');
//Route::get('/redirect-test', [UserController::class, 'redirectTest']);

// Route pour traiter le formulaire d'inscription
//Route::post('/register', [UserController::class, 'register'])->name('notes.register');
// Afficher le formulaire de login
//Route::get('/login', [LoginController::class, 'showLoginForm'])->name('notes.login');

// Soumettre le formulaire de login
//Route::post('/login', [LoginController::class, 'login']);

// Route pour afficher le profil de l'utilisateur
Route::get('/profile/{id}', [UserController::class, 'displayUser'])->name('notes.display-user');
// Afficher le formulaire de profil de l'utilisateur
Route::get('/profile/{id}/edit', [UserController::class, 'edit'])->name('profile.edit');

// Mettre à jour les informations de profil de l'utilisateur
Route::post('/profile/update', [UserController::class, 'update'])->name('profile.update');

// Supprimer le compte utilisateur
Route::post('/profile/destroy', [UserController::class, 'destroy'])->name('profile.destroy');
// Route pour afficher le formulaire de connexion
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Route pour traiter la connexion
Route::post('/login', [LoginController::class, 'login'])->name('notes.login');

// Route pour la déconnexion
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route protégée qui redirige après la connexion
Route::get('/profile/{id}', [LoginController::class, 'authenticated'])->name('notes.display-user');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('notes.register');
Route::post('/register', [RegisterController::class, 'register']);
Route::middleware('auth')->group(function () {
    Route::get('/profile/{id}', [UserController::class, 'displayUser'])->name('profile');
    Route::get('/profile/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/user/{id}/profile', [UserController::class, 'showUserProfile'])->name('user.profile');
    Route::get('/notes/user/{id}', [NoteController::class, 'displayUserNotes'])->name('notes.userNotes');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/unapproved-users', [AdminController::class, 'showUnapprovedUsers'])->name('admin.unapproved-users');
    Route::post('/admin/approve-user/{id}', [AdminController::class, 'approveUser'])->name('admin.approve-user');
    Route::delete('/admin/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('admin.delete-user');

    Route::get('/admin/unapproved-notes', [AdminController::class, 'showUnapprovedNotes'])->name('admin.unapproved-notes');
    Route::post('/admin/approve-note/{id}', [AdminController::class, 'approveNote'])->name('admin.approve-note');
    Route::delete('/admin/delete-note/{id}', [AdminController::class, 'deleteNote'])->name('admin.delete-note');
});