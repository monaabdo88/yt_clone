<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Channel;
use App\Models\Video;

class WelcomeController extends Controller
{
    /**
     * Main Index
     * @return view
     */
    public function index()
    {
        if(Auth::check())
        {
            $channels = Auth::user()->subscribedChannels()->with('videos')->get()->pluck('videos');
        }
        else
        {
            $channels = Channel::latest()->get()->pluck('videos');
        }
        return view('welcome', compact('channels'));
    }
    /**
     * Get All Channels
     * @return array
     */
    public function allChannels()
    {
        $allChannels = Channel::all();
        return view('channels.allChannels',compact('allChannels'));
    }
    /**
     * Get All videos
     * @return array
     */
    public function allVideos()
    {
        $videos = Video::paginate(9);
        return view('videos',compact('videos'));
    }
}
