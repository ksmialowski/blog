<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function edit(User $user)
    {
        $user = Auth::user();

        return view('user.index', compact('user'));
    }

    public function update(User $user)
    {
        request()->validate([
            'avatar' => 'image|required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $this->deleteImage($user->avatar);
        $user->avatar = request()->file('avatar')->store('avatars');
        $user->update();

        return back()->with('success','Avatar dodany pomyślnie');
    }

    public function deleteImage($image)
    {
        if (Storage::exists($image)) {
            Storage::delete($image);
        }
    }
}
