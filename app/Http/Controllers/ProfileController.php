<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function profile_image(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();

        if ($user->image?->path && Storage::disk('public')->exists($user->image->path)) {
            Storage::disk('public')->delete($user->image->path);
        }

        $path = $request->file('image')->store('profile-images', 'public');

        $user->image()->updateOrCreate(
            ['imageable_id' => $user->id, 'imageable_type' => User::class],
            ['path' => $path]
        );

        flash()->success(__('Photo updated successfully'));

        return redirect()->route('admin.profile.edit');
    }

    public function remove_image()
    {
        $user = auth()->user();

        if ($user->image) {
            if (Storage::disk('public')->exists($user->image->path)) {
                Storage::disk('public')->delete($user->image->path);
            }
            $user->image()->delete();
        }

        flash()->success(__('Photo removed successfully'));

        return redirect()->route('admin.profile.edit');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $user->name = json_encode([
            'en' => $request->name_en,
            'ar' => $request->name_ar,
        ]);

        $user->email = $request->email;

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        flash()->success(__('Profile updated successfully'));
        return Redirect::route('admin.profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
