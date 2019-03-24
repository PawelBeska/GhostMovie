<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','IndexController@index')->name('home.index');

Route::group(['middleware' => ['auth']], function () {
 Route::get('/logout',function(\Illuminate\Http\Request $request){$request->session()->invalidate();return \Illuminate\Support\Facades\Redirect::to(route('home.index'));})->name('home.logout');
 Route::get('/user','UserController@user')->name('home.user');

});

Route::group(['middleware' => ['admin']],function(){
   Route::get('/admin','Admin\IndexController@index')->name('admin.index');
});
Route::group(['middleware' => ['guest']], function () {
    Route::get('/login','Auth\LoginController@login')->name('home.login');
    Route::post('/login','Auth\LoginController@loginAjax')->name('home.login.ajax');
    Route::get('/register','Auth\RegisterController@register')->name('home.register');
    Route::post('/register','Auth\RegisterController@registerAjax')->name('home.register.ajax');
});
Route::get('/movies','MoviesController@movies')->name('home.movies');
Route::get('/movie/{title}/{id}','MovieController@movie')->name('home.movie');

Route::get('/series','SeriesController@series')->name('home.series');
Route::get('/help','IndexController@help')->name('home.help');

Route::post('/ajax/movies','MoviesController@moviesAjax')->name('home.movies.ajax');
Route::post('/ajax/movies/genres','MoviesController@genresAjax')->name('home.movies.genres.ajax');