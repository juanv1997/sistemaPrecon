<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MessageBanners extends Component
{
    public $addedBanner = false;
    public $destroyedBanner = false;
    public $editedBanner = false;
    protected $listeners = ['itemAdded','itemDestroyed','itemEdited'];

    public function itemAdded(){

        $this->addedBanner = true;
    }

    public function itemDestroyed(){

        $this->destroyedBanner = true;
    }

    public function itemEdited(){

        $this->editedBanner = true;
    }

    public function render()
    {
        return view('livewire.message-banners');
    }
}
