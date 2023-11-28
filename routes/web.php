<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChannelController;
use App\Http\Livewire\Video\AllVideos;
use App\Http\Livewire\Video\CreateVideo;
use App\Http\Livewire\Video\EditVideo;
use App\Http\Livewire\Video\WatchVideo;
use Illuminate\Support\Facades\Auth;
use App\Models\Channel;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    // if logged in -- channels that I subscribed to
    if (Auth::check()) {
        $channels = Auth::user()->subscribedChannels()->with('videos')->get()->pluck('videos');
    } else {
        //else all vidoes
        $channels = Channel::get()->pluck('videos');
    }

    return view('welcome', compact('channels'));
});*/
Route::get('/',[WelcomeController::class,'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/channel/{channel}/edit', [ChannelController::class, 'edit'])->name('channel.edit');
    Route::get('/videos/{channel}/create', CreateVideo::class)->name('video.create');
    Route::get('/videos/{channel}/{video}/edit', EditVideo::class)->name('video.edit');
    Route::get('/AllVideos/{channel}', AllVideos::class)->name('videos.all');
});
Route::get('/watch/{video}', WatchVideo::class)->name('video.watch');
Route::get('/channel/{channel}', [ChannelController::class, 'index'])->name('channel.index');
Route::get('/search/', [SearchController::class, 'search'])->name('search');
Route::get('/allChannels',[WelcomeController::class,'allChannels'])->name('AllChannels');
Route::get('/allVideos',[WelcomeController::class,'allVideos']);
