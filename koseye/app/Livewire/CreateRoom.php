<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;

class CreateRoom extends Component
{
    public $name;
    public $status;

    public function render()
    {
        return view('livewire.room.create-room');
    }

    public function store()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
        ]);

        Room::create([
            'name' => $this->name,
            'status' => $this->status,
        ]);

        session()->flash('success', 'Room created');
    }
}
