<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use LivewireUI\Modal\ModalComponent;
use Yoeunes\Toastr\Facades\Toastr;

class Login extends ModalComponent
{

    public $email;
    public $password;

    public function login(){
        $validate = Validator::make([
            'email' => $this->email,
            'password' => $this->password
        ],[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if($validate->fails()){
            toastr()->error($validate->errors()->first(), '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 2000,]);
            return;
        }
        $isLogin = Auth::attempt(['email' => $this->email, 'password' => $this->password]);
        if(!$isLogin){
            toastr()->error('Invalid Credential', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 2000,]);
            return;
        }
        else{
            toastr()->success('Login Success', '', ['positionClass' => 'toast-bottom-right', 'timeOut' => 2000,]);
        }
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.login');
    }
    public static function modalMaxWidth(): string
    {
        return 'md';
    }
}
