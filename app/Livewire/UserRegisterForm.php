<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserRegisterForm extends Component
{
    use WithFileUploads;

    // Public property
    // Pakai anotation
    #[Validate('required|min:3')]
    public $name = '';
    #[Validate('required|email:dns|unique:users')]
    public $email = '';
    #[Validate('required|min:8')]
    public $password = '';

    #[Validate('image|max:5024')] // 5MB Max
    public $avatar;


    public function createUser()
    {
        $this->validate();

        if ($this->avatar) {
            $validated['avatar'] = $this->avatar->store('avatar', 'public'); // Simpan di storage/app/public/avatar
        }

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'avatar' => $validated['avatar']
        ]);

        $this->reset();
        session()->flash('sukses', 'New user has been created');
        $this->dispatch('user-created');
    }

    public function render()
    {
        return view('livewire.user-register-form');
    }
}
