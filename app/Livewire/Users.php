<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Users extends Component
{
    public function createUser()
    {
        // dd('button click');
        User::create([
            'name' => 'Nathaniel Yusuf Langelo',
            'email' => 'niel@gmail.com',
            'password' => Hash::make('password'),
        ]);
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
