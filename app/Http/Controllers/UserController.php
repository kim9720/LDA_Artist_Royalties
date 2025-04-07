<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        $users =  User::get();
        //    dd($users);

        return view('admin.manage_users');
    }

    public function getUsers()
    {
        $users = User::select(['id', 'name', 'email', 'phone', 'role_id'])
        // ->whereNot('id', Auth::user()->id)
        ;

        return DataTables::of($users)
            ->addIndexColumn()
            ->make(true);
    }



    public function userDelete($id)
    {
        try {
            $user = User::findOrFail($id);

            if ($user->id === auth()->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'You cannot delete your own account'
                ], 403);
            }

            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully',
                'data' => [
                    'id' => $user->id
                ]
            ]);

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Deletion failed: ' . $e->getMessage()
            ], 500);
        }
    }
    public function userProfileShow($id)
    {
        // dd($id);
            $profile = User::find($id);

             return view('profile.show_profile', compact('profile'));


    }
}
