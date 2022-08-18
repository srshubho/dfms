<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class Create extends Component
{
    public $name, $email, $contact, $is_admin, $user_type;

    public function updatedName()
    {
        $this->validate([
            'name' => 'string|required|max:50',
        ]);
    }

    public function updatedEmail()
    {
        $this->validate([
            'email' => 'email:rfc,dns|unique:users|required',
        ]);
    }

    public function updatedContact()
    {
        $this->validate([
            'contact' => 'required|unique:users|numeric|digits:11',
        ]);
    }

    protected $rules = [
        'name' => ['required', 'string', 'max:100'],
        'email' => 'email:rfc,dns|unique:users|required',
        'contact' => 'required|numeric|digits:11|unique:users',
        'user_type' => 'required|numeric',
    ];

    public function saveUser()
    {
        $data = $this->validate();
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->contact = $data['contact'];
        $user->user_type = $data['user_type'];

        if ($this->user_type != 1) {
            $user->is_admin = 0;
        } else {
            $user->is_admin = 1;
        }

        $user->password = Hash::make('123456');
        $save = $user->save(); // save user

        // send mail to added user
        // $userMail = User::where('email', $data['email'])->first();
        // if ($data['userType'] == 1) {
        //     $userType = 'Admin';
        // } else if ($data['userType'] == 2) {
        //     $userType = 'Teacher';
        // }

        // Mail::to($userMail)->send(new UserAddMail(
        //     auth()->user()->name,
        //     auth()->user()->email,
        //     $data['email'],
        //     $userType
        // ));

        if ($save) {
            return redirect()->route('user.index')->with(['message' => 'User successfully added!', 'alert-type' => 'success']);
        } else {
            session()->flash('failed', 'User added failed!');
            return redirect()->route('user.create');
        }
    }

    public function render()
    {
        return view('livewire.admin.user.create');
    }
}
