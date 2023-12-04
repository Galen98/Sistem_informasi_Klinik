<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class FormProfil extends Component
{
    public $editProfil = false;
    public $user;
    public $name;
    public $email;
    public $alamat;
    public $no_wa;
    public $umur;

    public function back()
    {
        return redirect(request()->header('Referer'));
    }

    public function render()
    {
        return view('livewire.form-profil');
    }

    public function edit(){
        $userId =  auth()->user()->id;   
        $this->user = User::find($userId);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->umur = $this->user->umur;
        $this->alamat = $this->user->alamat;
        $this->no_wa = $this->user->no_wa;
        $this->editProfil = !$this->editProfil;
    }

    public function updateProfile(){
        $data = User::where('id', auth()->user()->id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'alamat' => $this->alamat,
            'no_wa' => $this->no_wa,
            'umur' => $this->umur
        ]);
        session()->flash('message', 'Update Profil Berhasil');
        $this->edit();
        $this->back();
    }
    
}
