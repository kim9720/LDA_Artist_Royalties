<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\AudioFile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    public function returnDashboart()
    {
        $userAudioCount = AudioFile::where('user_id', Auth::id())->count();
        $totalAudioCount = AudioFile::count();

        // Prevent division by zero
        $percentage = $totalAudioCount > 0 ? ($userAudioCount / $totalAudioCount) * 100 : 0;


        return view('dashboard', compact('userAudioCount', 'percentage'));
    }


    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function editBasicuserInfo(Request $request)
    {
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'mname' => 'nullable|string|max:255',
            'lname' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'currency' => 'nullable|string|max:255',
            'communication' => 'nullable|array',
            'profile_picture' => 'nullable|image|mimes:png,jpg,jpeg|max:20048', // 2MB max
        ]);


        try {
            $user = Auth::user();

            if ($request->hasFile('profile_picture')) {
                if ($user->profile_picture) {
                    Storage::delete('public/profile_pictures/' . $user->profile_picture);
                }
                $path = $request->file('profile_picture')->store('profile_pictures', 'public');
                $user->profile_picture = basename($path);
            }
            elseif ($request->has('avatar_remove') && $request->input('avatar_remove') == '1') {
                if ($user->profile_picture) {
                    Storage::delete('public/profile_pictures/' . $user->profile_picture);
                    $user->profile_picture = null;
                }
            }

            $user->update([
                'name' => $validatedData['fname'],
                'mname' => $validatedData['mname'],
                'lname' => $validatedData['lname'],
                'phone' => $validatedData['phone'],
                'country' => $validatedData['country'],
                'currency' => $validatedData['currency'] ?? null,
                'artist_name' => $validatedData['artist'],
                'communication_method' => json_encode($validatedData['communication'] ?? []),
            ]);

            return redirect()->back()->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Error updating profile: ' . $e->getMessage())
                ->withInput();
        }
    }


    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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

    public function profileShow()
    {
        $profile = Auth::user();
        // dd(   $profile );
        return view('profile.show_profile', compact('profile'));
    }
    public function profileSettings()
    {
        $profile = Auth::user();
        return view('profile.profile_settings', compact('profile'));
    }
    public function profileBill()
    {
        return view('profile.profile_bill');
    }
}
