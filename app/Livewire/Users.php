<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Users extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';

    public function createUser()
    {
        // dd('button click');
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->reset();
    }
    // public $title = 'Users Page';
    public function render()
    {
        return view('livewire.users', [
            'title' => 'Users Page',
            'users' => User::all(),
        ]);
    }
}
