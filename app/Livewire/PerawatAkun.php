<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class PerawatAkun extends Component
{
    public $formCreate = false;
    public $formEdit = false;
    public $name;
    public $password;
    public $email;
    public $userId;
    use WithPagination;

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->passwordField = '';
    }

    public function registerStore()
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
        'isPerawat'=>true,
        'isUser'=>false]);

        session()->flash('message', 'Registrasi akun perawat berhasil');

        $this->resetInputFields();
        $this->create();

    }

    public function create(){
        $this->resetInputFields();
        $this->formCreate = !$this->formCreate;
    }

    public function delete($id){
    User::where('id',$id)->delete();  
    session()->flash('messageDelete', 'Akun perawat berhasil dihapus');    
    }

    public function render()
    {
        return view('livewire.perawat-akun',[
            'perawat' => User::where('isPerawat', true)->paginate(5),
        ]);
    }

    public function edit($id){
        $this->formEdit = !$this->formEdit;
        $user = User::find($id);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->userId = $user->id;
        $this->password = $user->password;
    }

    public function backEdit(){
        $this->formEdit = !$this->formEdit;
    }

    public function editStore(){
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $this->password = Hash::make($this->password); 
        User::where('id', $this->userId)
        ->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);
        session()->flash('messageEdit', 'Akun perawat berhasil diedit');
        $this->backEdit();
    }
}
