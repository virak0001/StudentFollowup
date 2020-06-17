<?php

use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@index')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function (){

    Route::resource('tutor','TutorController');

    Route::resource('student','StudentController');

    Route::get('edit\{id}','StudentController@edit')->name('edit');
    
    Route::PUT('statusAchive/{id}','StudentController@updateStatusAchive')->name('statusAchive');

    Route::PUT('statusFollowUp/{id}','StudentController@statusFollowUp')->name('statusFollowUp');

    Route::get('showPageAddTutor\{id}', 'TutorController@showPageAddTutor')->name('showPageAddTutor');

    Route::PUT('addTutorToStudent\{tutorId}\{studentId}','StudentController@addTutorToStudent')->name('addTutorToStudent');

    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('showAddStudent','StudentController@showAddStudent')->name('showAddStudent');

    Route::PUT('storeCommment/{id_student}/{tutor_id}','CommentController@storeCommment')->name('storeCommment');

    Route::get('showComment\{id}','CommentController@showComment')->name('showComment');

    Route::PUT('editComment/{id_comment}','CommentController@editComment')->name('editComment');

    Route::delete('deleteComment\{id_comment}','CommentController@deleteComment')->name('deleteComment');

    Route::PUT('changePictureStudent\{id}','StudentController@changePictureStudent')->name('changePictureStudent');

    Route::get('unserMentor','StudentController@unserMentor')->name('unserMentor');

    Route::get('profile','TutorController@profile')->name('profile');

    Route::PUT('changeImageTutor','TutorController@changeImageTutor')->name('changeImageTutor');

    Route::PUT('changeTutorName','TutorController@changeTutorName')->name('changeTutorName');

    Route::PUT('updatePosition','TutorController@updatePosition')->name('updatePosition');

    Route::PUT('updateAddress','TutorController@updateAddress')->name('updateAddress');

});
Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']], function (){

    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('tutor','TutorController@index')->name('tutor');

    Route::get('unserMentor','StudentController@unserMentor')->name('unserMentor');

    Route::PUT('changeProfilePicture','TutorController@changeProfilePicture')->name('changeProfilePicture');

    Route::get('showComment\{id}','CommentController@showComment')->name('showComment');

    Route::PUT('storeCommment/{id_student}/{tutor_id}','CommentController@storeCommment')->name('storeCommment');

    Route::PUT('editComment/{id_comment}','CommentController@editComment')->name('editComment');

    Route::get('deleteComment\{id_comment}','CommentController@deleteComment')->name('deleteComment');

    Route::get('profile','TutorController@profile')->name('profile');

    Route::PUT('changeImageTutor','TutorController@changeImageTutor')->name('changeImageTutor');

    Route::PUT('changeTutorName','TutorController@changeTutorName')->name('changeTutorName');

    Route::PUT('updatePosition','TutorController@updatePosition')->name('updatePosition');

    Route::PUT('updateAddress','TutorController@updateAddress')->name('updateAddress');

});


