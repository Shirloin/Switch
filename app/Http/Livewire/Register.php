<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use LivewireUI\Modal\ModalComponent;

class Register extends ModalComponent
{

    public $username;
    public $email;
    public $password;
    public $phone;

    public function register(){
        $validate = Validator::make([
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
            'phone' => $this->phone
        ],[
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'phone' => 'required'
        ]);
        if($validate->fails()){
            toastr()->error($validate->errors()->first(), '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 2000,]);
            return;
        }
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = bcrypt($this->password);
        $user->phone = $this->phone;
        $user->save();
        toastr()->success('Register Success', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 2000,]);
        return redirect('/');
    }
    public function render()
    {
        return view('livewire.register');
    }
    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}
