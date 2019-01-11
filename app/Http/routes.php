<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//Authentification
//Route::group(['']);
Route::resource('notification','NotificationController');
Route::get("notification_a/{id}","NotificationController@activation")->name("notification_activation")->middleware("auth");

Route::get('apropos', 'HomeController@apropos')->name('apropos');

//Route::resource('user', 'UserController');
Route::get('user', 'UserController@index')->name('user.index');
Route::get('reset_pass', 'UserController@viewResetPassword')->name('user.view_reset_pass')->middleware('guest_user');
Route::post('reset_pass', 'UserController@resetPassword')->name('user.reset_pass')->middleware('guest_user');
Route::post('user', 'UserController@store')->name('user.store')->middleware('guest_user');
Route::get('registration', 'UserController@create')->name('user.create')->middleware('guest_user');
Route::get('user/password', 'UserController@editPassword')->name('user.password')->middleware('auth');
Route::post('user/password', 'UserController@updatePassword')->name('user.updatePassword')->middleware('auth');
Route::get('user/{id}', 'UserController@show')->name('user.show');
Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit')->middleware('own');
Route::put('user/{id}', 'UserController@update')->name('user.update')->middleware('own');
Route::delete('user/{id}', 'UserController@destroy')->name('user.destroy')->middleware('admin');
Route::put('user/{id}/edit_photo', 'UserController@updatePhotoUser')->name('user.updatePhoto')->middleware('own');
Route::put('user/{id}/edit_role', 'UserController@updateRole')->name('user.updateRole')->middleware('admin');

//Route::resource('badget','BadgetController');
Route::get('badget', 'BadgetController@index')->name('badget.index')->middleware('admin');
Route::post('badget', 'BadgetController@store')->name('badget.store')->middleware('admin');
Route::get('badget/create', 'BadgetController@create')->name('badget.create')->middleware('admin');
Route::get('badget/{id}', 'BadgetController@show')->name('badget.show')->middleware('admin');
Route::get('badget/{id}/edit', 'BadgetController@edit')->name('badget.edit')->middleware('admin');
Route::put('badget/{id}', 'BadgetController@update')->name('badget.update')->middleware('admin');
Route::delete('badget/{id}', 'BadgetController@destroy')->name('badget.destroy')->middleware('admin');

//Route::resource('universite','UniversiteController');
//Route::resource('terme','TermeController');
//Route::resource('type','TypeController');
// Route::resource('type_d_exercices','Type_d_exerciceController');

//Route::resource('annonce','AnnonceController');
Route::get('annonce', 'AnnonceController@index')->name('annonce.index');
Route::post('annonce', 'AnnonceController@store')->name('annonce.store')->middleware('auth');
Route::get('annonce/create', 'AnnonceController@create')->name('annonce.create')->middleware('auth');
Route::get('annonce/{id}/edit', 'AnnonceController@edit')->name('annonce.edit')->middleware('auth');
Route::put('annonce/{id}', 'AnnonceController@update')->name('annonce.update')->middleware('auth');
Route::delete('annonce/{id}', 'AnnonceController@destroy')->name('annonce.destroy')->middleware('auth');

//Route::resource('forum','ForumController');
Route::get('discussion', 'ForumController@index')->name('forum.index');
Route::post('discussion', 'ForumController@store')->name('forum.store')->middleware('auth');
Route::get('discussion/create', 'ForumController@create')->name('forum.create')->middleware('auth');
Route::get('discussion/{id}', 'ForumController@show')->name('forum.show');
Route::get('discussion/{id}/edit', 'ForumController@edit')->name('forum.edit')->middleware('owner_discussion');
Route::put('discussion/{id}', 'ForumController@update')->name('forum.update')->middleware('owner_discussion');
Route::delete('discussion/{id}', 'ForumController@destroy')->name('forum.destroy')->middleware('owner_discussion');

//Route::resource('commentaire','CommentaireController');
Route::post('commentaire', 'CommentaireController@store')->name('commentaire.store')->middleware('auth');
Route::delete('commentaire/{id}', 'CommentaireController@destroy')->name('commentaire.destroy')->middleware('auth');

//Route::resource('tutoriel','TutorielController');
Route::get('tutoriel', 'TutorielController@index')->name('tutoriel.index');
Route::post('tutoriel', 'TutorielController@store')->name('tutoriel.store')->middleware('auth');
Route::get('tutoriel/create', 'TutorielController@create')->name('tutoriel.create')->middleware('auth');
Route::get('tutoriel/{id}', 'TutorielController@show')->name('tutoriel.show');
Route::get('tutoriel/{id}/edit', 'TutorielController@edit')->name('tutoriel.edit')->middleware('owner_tuto');
Route::put('tutoriel/{id}', 'TutorielController@update')->name('tutoriel.update')->middleware('owner_tuto');
Route::delete('tutoriel/{id}', 'TutorielController@destroy')->name('tutoriel.destroy')->middleware('owner_tuto');

Route::get('validation','TutorielController@validation')->name('tutoriel.list_validation')->middleware('validator');
Route::post('validation/{id}/valider', 'TutorielController@valider')->name('tutoriel.validation')->middleware('validator');
Route::post('validation/{id}/annuler', 'TutorielController@annulerValidation')->name('tutoriel.annulerValidation');
//Route::resource('niveau','NiveauController');

//Route::resource('chapitre','ChapitreController');
Route::get('tutoriel/{tuto_id}/chapitre/create', 'ChapitreController@create')->name('chapitre.create')->middleware('owner_tuto');
Route::get('chapitre/{chapitre}/edit', 'ChapitreController@edit')->name('chapitre.edit')->middleware('owner_tuto');
Route::post('chapitre', 'ChapitreController@store')->name('chapitre.store')->middleware('owner_tuto');
Route::put('chapitre/{chapitre}', 'ChapitreController@update')->name('chapitre.update')->middleware('owner_tuto');
Route::delete('chapitre/{chapitre}', 'ChapitreController@destroy')->name('chapitre.destroy')->middleware('owner_tuto');

//Route::resource('section','SectionController');
Route::get('chapitre/{chap_id}/section/create', 'SectionController@create')->name('section.create')->middleware('owner_tuto');
Route::get('section/{section}/edit', 'SectionController@edit')->name('section.edit')->middleware('owner_tuto');
Route::post('section', 'SectionController@store')->name('section.store')->middleware('owner_tuto');
Route::put('section/{section}', 'SectionController@update')->name('section.update')->middleware('owner_tuto');
Route::delete('section/{section}', 'SectionController@destroy')->name('section.destroy')->middleware('owner_tuto');

//Route::resource('exercice','ExerciceController');
//Route::resource('question','QuestionController');
//Route::resource('corrige','CorrigeController');
//Route::resource('exercice','ExerciceController');
//Route::resource('question','QuestionController');
//Route::resource('corrige','CorrigeController');
//Route::resource('projet','ProjetController');
//Route::resource('type_utilisateur','Type_utilisateurController');
//Route::resource('domain','DomainController');
Route::auth();

Route::get('email', function (){
    $data = [
        'title' => 'Test',
        'content' => 'Ceci est un test'
    ];
    Mail::send('email.welcome', $data, function ($message){
        $message->to('greed7x2@gmail.com', 'Tamby')->subject('Test d\'envoi');
    });
});

Route::get('search', 'HomeController@search')->name('home.search');
Route::get('/', 'HomeController@index')->name('home');
