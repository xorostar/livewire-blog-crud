<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Counter extends Component
{
    public $count;

    public function mount()
    {
        $this->count = Auth::user()->count;
    }

    public function increment()
    {
        $this->count++;
        Auth::user()->update(['count' => $this->count]);
    }

    public function decrement()
    {
        $this->count--;
        Auth::user()->update(['count' => $this->count]);
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
