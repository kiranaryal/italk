
<?php
use App\User;


Auth::routes();




Route::get('/chat','MessagesController@index');


Route::post('follow/{user}','FollowsController@store');
Route::get('/{user}','PostsController@index');
Route::get('/','HomeController@welcome');

Route::post('/p','PostsController@store');
Route::get('/p/create','PostsController@create');
Route::get('/p/{post}','PostsController@show')->name('posts.show');;



Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::patch('/search','SearchController@search');
Route::get('/delete/{id}','PostsController@destroy');


Route::post('/c', 'CommentsController@store');
Route::post('/m', 'MessagesController@store');
Route::get('/message/{user}','MessagesController@show');



Route::get('/like/{post}','LikesController@store');
Route::get('/dislike/{post}','LikesController@destroy');

?>