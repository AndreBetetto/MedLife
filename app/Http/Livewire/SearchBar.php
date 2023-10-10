<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchBar extends Component
{
    public $search = '';

    public function render()
    {
        sleep(1);

        return view('livewire.search-bar', [
            'users' => search('title', $this->search)
        ]);
    }
}
