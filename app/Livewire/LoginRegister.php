<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginRegister extends Component
{
    public $users, $email, $passwordField, $name,$password;
    public $registerForm = false;

    public function render()
    {
        return view('livewire.login-register');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->passwordField = '';
    }


    public function register()
    {
        $this->registerForm = !$this->registerForm;
    }

    public function registerStore(Request $request)
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

       $this->password = Hash::make($this->password); 

       $data= User::create(['name' => $this->name, 
        'email' => $this->email,
        'password' => $this->password,
        'isAdmin'=>false,
        'isPerawat'=>false,
        'isUser'=>true]);

        // dd($data);
        session()->flash('message', 'Registrasi berhasil, masuk ke halaman Login');

        $this->resetInputFields();

    }
}
