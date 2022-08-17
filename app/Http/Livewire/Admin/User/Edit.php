<?php

namespace App\Http\Livewire\Admin\User;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Edit extends Component
{
    public $user;
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
            'email' => 'email:rfc,dns|required',
        ]);
    }

    public function updatedContact()
    {
        $this->validate([
            'contact' => 'required|numeric|digits:11',
        ]);
    }

    protected $rules = [
        'name' => ['required', 'string', 'max:100'],
        'email' => 'email:rfc,dns|required',
        'contact' => 'required|numeric|digits:11',
        'user_type' => 'required|numeric',
    ];

    public function updateUser()
    {
        $data = $this->validate();

        $this->user->name = $data['name'];
        $this->user->email = $data['email'];
        $this->user->contact = $data['contact'];
        $this->user->user_type = $data['user_type'];

        if ($this->user_type != 1) {
            $this->user->is_admin = 0;
        } else {
            $this->user->is_admin = 1;
        }

        $this->user->password = Hash::make('123456');
        $save = $this->user->save();

        if ($save) {
            return redirect()->route('admin.user.index')->with(['message' => 'User successfully added!', 'alert-type' => 'success']);
        } else {
            session()->flash('failed', 'User added failed!');
            return redirect()->route('user.create');
        }
    }

    public function mount()
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->contact = $this->user->contact;
        $this->is_admin = $this->user->is_admin;
        $this->user_type = $this->user->user_type;
    }

    public function render()
    {
        return view('livewire.admin.user.edit');
    }
}
