<?php

namespace App\Http\Livewire;

use App\Models\Room;
use Livewire\Component;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RoomController;
 


class RoomMaintain extends Component
{
    public $roommaintain;
    public $maintain;

    protected $listeners = ['refreshComponent' => '$refresh'];


    public function mount()
    {
        $this->roommaintain = Room::select('id','room_no','is_maintenence')->get();
    }


    public function maintain($roomId)
    {
        $room = Room::findOrFail($roomId); // Find the room by ID
        
        $room->is_maintenence = !$room->is_maintenence; // Toggle the status of the room
        
        $room->save(); // Save the updated room to the database

        $this->emit('refreshComponent');


    }






    public function render()
    {
        return view('livewire.room-maintain');
    }
}