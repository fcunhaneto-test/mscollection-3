<?php

use App\Models\Qualifiers\Media;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    $c_media = new Media();
    $media = $c_media->streams();

    return view('auth.login', compact('media'));
})->name('login');

Route::get('/logout', function () {
    $c_media = new Media();
    $media = $c_media->streams();

    return view('auth.logout', compact('media'));
})->name('logout');

Route::get('/', function () {
    $media = new Media();
    $streams = $media->streams();
    return view('titles', compact('streams'));
});

Route::get('/', function () {
    $media = new Media();
    $slug = $media->streams()->first()->slug;

    return redirect('/filmes/' . $slug);
});

Route::get('/filmes/{channel}', 'TitleController@start')->name('movies');
Route::get('/series/{channel}', 'TitleController@start')->name('series');

Route::get('/admin', function () {
    $media = Media::all();
    $slug = $media->first()->slug;

    return redirect('/admin/filmes/' . $slug);
});

Route::get('/admin/filmes/{channel}', 'TitleController@start')->name('admin-movies');
Route::get('/admin/series/{channel}', 'TitleController@start')->name('admin-series');
