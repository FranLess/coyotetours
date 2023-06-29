<?php

namespace App\Http\Livewire\Admin;

use App\Models\YoutubeVideo;
use Livewire\Component;

class VideosYoutube extends Component
{
    
    protected $listeners = [
        'borrarVideo' => 'borrar',
    ];
    
    public function render()
    {
        $videos = YoutubeVideo::all();
        return view('livewire.admin.videos-youtube' , compact('videos'));
    }

    public function borrarAsk($video)
    {
        $this->emit('borrarAsk', ['video' => $video]);
    }
    
    public function borrar($video)
    {
        YoutubeVideo::destroy($video);
    }
}
