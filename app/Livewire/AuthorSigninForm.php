<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthorSigninForm extends Component
{
    public $email, $password, $name, $phone;

    public function SigninHandler()
    {
        $this->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'name' => 'required',
            'phone' => 'required|max:10'
        ], [
            'email.required' => 'Enter Your email id',
            'email.email' => 'Invalid email id',
            'email.unique' => 'User already registered',
            'password.required' => 'Enter Your password',
            'name.required' => 'Enter Your name',
            'phone.required' => 'Enter Your phone',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Account created successfully!');
        return redirect()->route('author.login');
    }

    public function render()
    {
        return view('livewire.author-signin-form');
    }
}
