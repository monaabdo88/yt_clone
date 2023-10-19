<?php

namespace App\Http\Livewire\Video;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Channel;
use App\Models\Video;
class CreateVideo extends Component
{
    use WithFileUploads;
    public Channel $channel;
    public Video $video;
    public $videoFile;
    protected $rules = [
        'videoFile' => 'required|mimes:mp4|max:1228800'
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
        $path = $this->videoFile->store('video-temp');
        //create new record in database
        $this->video = $this->channel->videos()->create([
            'title'         => " ",
            'description'   => " ",
            'uid'           => uniqid(true),
            'visibility'    => 'private',
            'path'          => explode('/',$path)[1]
        ]);
        //redirect to edit route
        return redirect()->route('video.edit', [
            'channel' => $this->channel,
            'video' => $this->video,
        ]);
    }
}
