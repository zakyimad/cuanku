<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\View\View;

class AccountSettingsAccount extends Controller
{
    public function index()
    {
        return view('content.pages.pages-account-settings-account');
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        // dd($request);
        // $request->user()->fill($request->validated());
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|max:255|email|unique:users',
            'work' => 'max:255',
            'address' => 'max:255',
            'phone' => 'max:255|numeric',
            'photos' => 'image|file|max:5120'
        ]);

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        $validatedData['user_id'] = auth()->user()->id;

        if($request->file('photos')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['photos'] = $request->file('photos')->store('profile-photos');
        }

        $validatedData->user()->save();

        return Redirect::route('content.pages.pages-account-settings-account')->with('success', 'Profil berhasil diperbaharui');
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
