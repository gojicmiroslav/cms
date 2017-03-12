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
use App\User;
use App\Post;
use App\Phone;
use App\Role;
use App\Country;
use Carbon\Carbon;

Route::get('/', function () {
     return view('welcome');
});

//route parameters
Route::get('/post/{id}/{name}', function($id, $name){
	return "<h3>This is post $id and name is $name</h3>";
});

//named route
Route::get('admin/posts', array('as' => 'admin.home', function(){
	$url = route('admin.home');
	return "The URL is: $url";
}));

Route::get('user/posts', function(){
	$url = route('user.home');
	return "The URL is: $url";
})->name('user.home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('user/profile', function () {
        // Uses Auth Middleware
    });
});

//Route::get('/post', 'PostsController@index');
//Route::get('/post/{id}', 'PostsController@show');

Route::resource('posts', 'PostsController');
Route::get('/contact', 'PostsController@contact');

Route::get('/show/{id}/{title}', 'PostsController@show_post');

/*
Database Raw SQL Queries
*/
Route::get('/delete', function(){
	DB::delete('delete from posts');
});

Route::get('/insert', function(){
	DB::insert('insert into posts(title, content) values(?,?)', ['PHP with Laravel', 'PHP Laravel is the one of te best PHP frameworks']);

	DB::insert('insert into posts(title, content) values(?,?)', ['RoR', 'Ruby On Rails is even better then Laravel']);
});

Route::get('/read', function(){
	$posts = DB::select('select * from posts');
	return view('posts', compact('posts'));
});

Route::get('/update', function(){
	$updated = DB::update('update posts set title = ? where id = ?', ["Updated title", 4]);
	$posts = DB::select('select * from posts');
	return view('posts', compact('posts'));
});

/*
	Eloquent
*/

Route::get('eloquent/posts/all', function(){
	$posts = Post::all();
	return view('posts', compact('posts'));
});

Route::get('eloquent/posts/find', function(){
	$post = Post::find(5);
	return view('post', compact('post'));
});

Route::get('eloquent/posts/find/where', function(){
	$posts = Post::where('id', 4)->get();
	return view('posts', compact('posts'));
});

Route::get('eloquent/posts/find/where/single', function(){
	$posts = Post::where('id', 4)->take(1)->get();
	return view('posts', compact('posts'));
});

Route::get('eloquent/posts/find/{id}', function($id){
	$post = Post::findOrFail($id);
	return view('post', compact('post'));
});

Route::get('eloquent/posts/first/{id}', function($id){
	$post = Post::where('id', '>', $id)->firstOrFail(['title']);
	return $post;
});

Route::get('eloquent/posts/where/test/{id}', function($id){
	$post = Post::where('id', '>', $id)->get();
	return $post;
});

Route::get('eloquent/save', function(){
	$post = new Post();
	$post->title = "New inserted title";
	$post->content = "Content";
	return strval($post->save());
});

Route::get('eloquent/update/{id}', function($id){
	$post = Post::find($id);
	$post->title = "New updated title";
	return strval($post->save());
});

Route::get('/create', function(){
	Post::create(['title' => 'The Posts create method', 'content' => 'I am learning Laravel']);
});

Route::get('/update', function(){
	Post::where('id', 1)->update(['title' => 'Most New Updated Title']);
});

Route::get('/eloquent/posts/delete/{id}', function($id){
	$post = Post::find($id);
	$post->delete();
});

Route::get('/eloquent/posts/destroy/9', function(){
	Post::destroy(9);
});

Route::get('/user/phone', function(){
	$phone = User::find(1)->phone;
	return $phone;
});

Route::get('/phone/user', function(){
	$user = Phone::find(1)->user;
	return $user;
});

Route::get('relations/user/{id}/posts', function($id){
	$posts = User::find($id)->posts;
	return view('posts', compact('posts'));
});

Route::get('relations/post/{id}/user', function($id){
	$user = Post::find($id)->user;
	echo $user;
});

Route::get('user/{id}/roles', function($id){
	$user = User::find($id);
	$roles= $user->roles;
	return $roles;
});

Route::get('role/{id}/users', function($id){
	$role = Role::find($id);
	$users = $role->users;
	return $users;
});

// Accessing the intermediate table / pivot
Route::get('/user/{id}/pivot', function($id){
	$user = User::find($id);

	$roles = [];
	foreach($user->roles as $role)
	{
		array_push($roles, $role->pivot);
	}

	return $roles;
});

// Has Many Through relation
Route::get('/user/country/{country_id}', function($country_id){
	$country = Country::find($country_id);

	$posts = [];
	foreach($country->posts as $post){
		array_push($posts, $post);
	}

	return $posts;
});

Route::get('/dates', function(){
	$date = new DateTime('+1 week');

	echo $date->format('d-m-Y');

	echo "<br>";
	echo Carbon::now();

	echo "<br>";
	echo Carbon::now()->diffForHumans();

	echo "<br>";
	echo Carbon::now()->addDays(10)->diffForHumans();

	echo "<br>";
	echo Carbon::now()->subMonth(3)->diffForHumans();
});



