<?php

namespace App\Http\Livewire\Video;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Channel;
use App\Models\Video;
use App\Jobs\CreateThumbnailFromvideo;
use App\Jobs\ConvertVideoForStreaming;
class CreateVideo extends Component
{
    use WithFileUploads;
    public Channel $channel;
    public Video $video;
    public $videoFile;
    protected $rules = [
        'videoFile' => 'required|mimes:mp4|max:12288000'
    ];
    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }
    public function render()
    {
        return view('livewire.video.create-video')->extends('layouts.app');
    }
    public function fileCompleted()
    {
        //validate the data
        $this->validate();
        //save the video in folder
        $path = $this->videoFile->store('videos-temp');
        //create new record in database
        $this->video = $this->channel->videos()->create([
            'title'         => " ",
            'description'   => " ",
            'uid'           => uniqid(true),
            'visibility'    => 'private',
            'path'          => explode('/',$path)[1]
        ]);
        //dstbatch jobs
        CreateThumbnailFromVideo::dispatch($this->video);
        ConvertVideoForStreaming::dispatch($this->video);
        //redirect to edit route
        return redirect()->route('video.edit', [
            'channel' => $this->channel,
            'video' => $this->video,
        ]);
    }
}
