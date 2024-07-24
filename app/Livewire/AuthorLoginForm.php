<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthorLoginForm extends Component
{
    public $email,$password;

    public function LoginHandler(){
        $this->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required'
        ],[
            'email.required'=>'Enter Your email id',
            'email.email'=>'invailed email id',
            'email.exists'=>'user not registered',
            'password.required'=>'Enter Your password']);

        $creds = array('email' =>$this->email ,'password'=>$this->password );

        if(Auth::guard('web')->attempt($creds)){
            $checkUser=User::where('email',$this->email)->first();
            return redirect()->route('author.home');

        }else{
            session()->flash('fail','Incorrect email or password');
        }
    }



    public function render()
    {
        return view('livewire.author-login-form');
    }
}
