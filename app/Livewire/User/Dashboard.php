<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class Dashboard extends Component
{
     public $user;
    public $current_password;
    public $new_password;
    public $new_password_confirmation;
    public $name;
    public $email;
    public $activeTab = 'profile';

    protected $listeners = ['refreshOrders' => '$refresh'];

    public function mount()
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->user->id,
        ]);

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->dispatch('notify', 'Profile updated successfully!');
    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, $this->user->password)) {
                    $fail('The current password is incorrect.');
                }
            }],
            'new_password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $this->user->update([
            'password' => Hash::make($this->new_password),
        ]);

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
        $this->dispatchBrowserEvent('notify', 'Password updated successfully!');
    }

    public function deleteAccount()
    {
        $this->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, $this->user->password)) {
                    $fail('The password is incorrect.');
                }
            }],
        ]);

        Auth::logout();
        $this->user->delete();

        session()->flash('message', 'Your account has been deleted.');
        return redirect('/');
    }

    public function switchTab($tab)
    {
        $this->activeTab = $tab;
    }
    public function render()
    {
        return view('livewire.user.dashboard',[
            // 'orders' => $this->user->orders()->latest()->take(5)->get(),
            // 'cartItems' => Cart::session($this->user->id)->getContent(),
        ]);
    }
}
