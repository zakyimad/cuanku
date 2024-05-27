<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('content.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd($request);

        $id = $request->route('id');

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users'.$id.',id',
            'email' => 'required|max:255|email|unique:users'.$id.',id',
            'work' => 'nullable|max:255',
            'address' => 'nullable|max:255',
            'phone' => 'nullable|numeric',
            'photos' => 'image|file|max:5120'
        ]);

        if($request->file('photos')) {
            $file = $request->file('photos');
            $filename = $filename = \Carbon\Carbon::now()->format('Y-m-d H-i').'_'. Auth::user()->id .''. Auth::user()->name . '.' . $file->getClientOriginalExtension();
            // $filename = \Carbon\Carbon::now()->format('Y-m-d H-i').''.$file->getClientOriginalName();

            if($request->oldImage){
                // Storage::delete($request->oldImage);
                $filePath = 'profile-photos/' . $filename; // Replace $fileName with the actual file name
                Storage::delete($filePath);
            }
            $file->move('profile-photos', $filename);
            $validatedData['photos'] = $filename;
        }


        User::where('id', auth()->user()->id)->update($validatedData);

        return Redirect::route('profile.edit')->with('success', 'Profil berhasil diperbaharui');
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
