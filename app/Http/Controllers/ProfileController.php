<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\AudioFile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    public function returnDashboart()
    {
        $userAudioCount = AudioFile::where('user_id', Auth::id())->count();
        $totalAudioCount = AudioFile::count();
        $notAprovedSong = AudioFile::where('approve_status', 0)->count();
        $total_artist = User::where('role_id', 2)->count();

        // Prevent division by zero
        $percentage = $totalAudioCount > 0 ? ($userAudioCount / $totalAudioCount) * 100 : 0;

        $percentage_not_approved_song = $totalAudioCount > 0 ? ($notAprovedSong / $totalAudioCount) * 100 : 0;


        return view('dashboard', compact(
            'userAudioCount',
            'percentage',
            'totalAudioCount',
            'total_artist',
            'notAprovedSong',
            'percentage_not_approved_song'
        ));
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
            } elseif ($request->has('avatar_remove') && $request->input('avatar_remove') == '1') {
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


    public function updateEmail(Request $request)
    {
        // Manual validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'confirmemailpassword' => 'required|string'
        ]);

        if ($validator->fails()) {
            Log::info("imeingia humu 1");
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        if (!Hash::check($request->confirmemailpassword, auth()->user()->password)) {

            return response()->json([
                'success' => false,
                'message' => 'The provided password is incorrect.'
            ], 401);
        }

        $user = $request->user();
        $user->email = $request->email;
        $user->email_verified_at = null;

        if ($user->save()) {

            return response()->json([
                'success' => true,
                'message' => 'Email updated Susseccifully.'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to update email.'
        ], 500);
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'currentpassword' => 'required|string',
            'newpassword' => 'required|string|min:8',
            'confirmpassword' => 'required|string'
        ],);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Verify current password
        if (!Hash::check($request->currentpassword, auth()->user()->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Current password is incorrect'
            ], 401);
        }

        // Update password
        $user = $request->user();
        $user->password = Hash::make($request->newpassword);

        if ($user->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Password updated successfully!'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to update password'
        ], 500);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => 'required|string'
        ]);

        if (!Hash::check($request->password, Auth::user()->password)) {
            return response()->json([
                'success' => false,
                'message' => 'The provided password is incorrect.'
            ], 401);
        }

        try {
            $user = $request->user();
            Auth::logout();
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'Account deleted successfully.',
                'redirect' => url('/')
            ]);
        } catch (\Exception $e) {
            Log::error('Account deletion failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete account. Please try again.'
            ], 500);
        }
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
        $profile = Auth::user();

        return view('profile.profile_bill', compact('profile'));
    }
}
