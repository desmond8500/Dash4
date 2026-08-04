<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    #[Validate('required', message: 'Le prénom est requis')]
    public string $firstname;
    #[Validate('required', message: 'Le nom est requis')]
    public string $lastname;
    #[Validate('required|email|unique:App\Models\User,email')]
    public string $email;
    #[Validate('required')]
    public string $password;
    #[Validate('required|same:password')]
    public string $password_confirmation;
    public string $function;
    public string $avatar;
    public string $job_title;

    public User $user;

    function store()
    {
        $this->validate();
        $this->firstname = ucfirst($this->firstname);
        $this->lastname = ucfirst($this->lastname);
        User::create($this->all());
    }

    function set()
    {
        $this->user = User::find(auth()->user()->id);

        $this->firstname = auth()->user()->firstname;
        $this->lastname = auth()->user()->lastname;
        $this->function = auth()->user()->function;
        $this->avatar = auth()->user()->avatar;
        $this->job_title = auth()->user()->job_title;
    }

    function login(string $email, string $password)
    {
        $credentials = array(
            'email' => $email,
            'password' => $password,
        );

        if (Auth::attempt($credentials)) {
            return true;
        } else {
            return false;
        }
    }

    function storeAvatar($user, $avatar, $delete = false)
    {
        if (!is_string($this->avatar)) {
            $dir = "users/$user->id/avatar";
            if ($delete) {
                Storage::disk('public')->deleteDirectory($dir);
            }
            $name = $avatar->getClientOriginalName();
            $avatar->storeAs("public/$dir", $name);

            $user->avatar = "storage/$dir/$name";
            $user->save();
        }
    }

    function update()
    {
        $this->user->update($this->only('firstname', 'lastname', 'function', 'job_title'));
    }

    function logout()
    {
        Auth::logout();
        return redirect()->intended('/');
    }

    function updateAvatar($avatar)
    {
        $user = auth()->user();

        $dir = "user/$user->id/avatar";
        Storage::disk('public')->deleteDirectory($dir);
        $name = $avatar->getClientOriginalName();
        $avatar->storeAs("public/$dir", $name);

        $user->avatar = "storage/$dir/$name";
        $user->save();
    }

    function update_password()
    {
        $this->validate();
        $this->user->password = Hash::make($this->password);
        $this->user->update($this->all());
    }

}
