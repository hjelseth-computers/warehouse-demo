<?php

namespace App\Livewire;

use App\Models\Items;
use Livewire\Component;

class Stand extends Component
{
    public $stand;
    public $items;


    public function mount($stand)
    {

        $this->stand = $stand;
        $this->items = Items::where('stand_id', $stand->id)->get();
    }

    public function render()
    {

        return view('livewire.stand', [
            'stand' => $this->stand,
            'items' => $this->items,

        ]);
    }
}
