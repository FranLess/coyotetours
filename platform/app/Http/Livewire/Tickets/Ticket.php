<?php

namespace App\Http\Livewire\Tickets;

use Livewire\Component;

class Ticket extends Component
{
    public $venta;

    public function mount($venta)
    {
        $this->venta = $venta;
    }
    public function render()
    {
        return view('livewire.tickets.ticket');
    }
}
