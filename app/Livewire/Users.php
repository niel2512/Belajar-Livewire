<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Users extends Component
{
    // Public property
    // Pakai anotation
    #[Validate('required|min:3')]
    public $name = '';
    #[Validate('required|email:dns|unique:users')]
    public $email = '';
    #[Validate('required|min:8')]
    public $password = '';

    public function createUser()
    {

        // $validated = $this->validate([
        //     'name' => 'required|min:3',
        //     'email' => 'required|email:dns|unique:users', //dns agar membaca .com .org dll, unique agar email harus beda
        //     'password' => 'required|min:8'
        // ]);

        // dd('button click');

        // User::create([
        //     'name' => $validated['name'],
        //     'email' => $validated['email'],
        //     'password' => Hash::make($validated['password']),
        // ]);

        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $this->reset();
        session()->flash('sukses', 'New user has been created');
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
