<?php

namespace App\Http\Livewire\Video;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Video;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Channel;
class AllVideos extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    protected $paginationTheme = 'bootstrap';
    public $channel;
    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }
    public function render()
    {
        return view('livewire.video.Allvideos')
            ->with('videos',$this->channel->videos()->paginate(2))
            ->extends('layouts.app');;
    }
    //delete the video function
    public function delete(Video $video)
    {
        //check permission to delete video
        $this->authorize('delete', $video);
        //delete the video folder
        $deleteVideo = Storage::disk('videos')->deleteDirectory($video->uid);
        if($deleteVideo)
        {
            $video->delete();
        }
        //return back()->route('videos.all');
    }
}
