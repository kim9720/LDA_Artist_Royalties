<?php

namespace App\Http\Controllers;

use App\Models\AudioFile;
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
        $users = User::with('audioFiles')
        // select(['id', 'name', 'email', 'phone', 'role_id'])
       ->whereNot('id', Auth::user()->id);
        // dd($users->get());
        return DataTables::of($users)
            ->addColumn('audio_count', function($users){
                $audio_count = $users->audioFiles->count();
                return $audio_count;
            })
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
            $profile = User::with('audioFiles')->find($id);

             return view('profile.show_profile', compact('profile'));


    }
    public function userSongPage($id){
        $profile = User::with('audioFiles')->find($id);

        return view('profile.user_song', compact('profile'));
    }

    public function userSongGet($id){
        $query = AudioFile::where('user_id', $id)
            ->select(['audio_files.*']);

        return DataTables::of($query)
            // ->addColumn('artist', function ($file) {
            //     return $file->user->artist_name ?? 'N/A';
            // })
            ->addColumn('song_name', function ($file) {
                return pathinfo($file->original_name, PATHINFO_FILENAME);
            })
            ->addColumn('upload_date', function ($file) {
                return $file->created_at->format('M d, Y');
            })
            ->addColumn('audio_player', function ($file) {
                $url = asset('storage/' . str_replace('public/', '', $file->path));
                return '
                    <audio controls style="width: 300px; height: 30px;">
                        <source src="' . $url . '" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                ';
            })
            ->addColumn('status', function ($file) {
                if (auth()->user()->role_id == 1) {


                    $status = $file->approve_status == 1 ? 'Approved' : 'Pending';
                    $color = $status === 'Approved' ? 'success' : 'danger';

                    return '<span class="badge-light-' . e($color) . '">' . e(ucfirst($status)) . '</span>';
                }
            })
            ->addColumn('action', function ($file) {
                $buttons = '<div class="d-flex justify-content-end">';

                if (auth()->user()->role_id == 2) {
                    $audioUrl = asset('storage/' . str_replace('public/', '', $file->path));
                    $url = 'audio_files_edit';

                    $buttons .= '
                        <button class="btn btn-icon btn-bg-light btn-active-color-info btn-sm edit-btn"
                            data-id="' . $file->id . '"
                            onclick="editFunction(' . $file->id . ', \'' . addslashes($file->original_name) . '\', \'' . addslashes($file->isrc_code) . '\', \'' . $url . '\', \'' . $audioUrl . '\')"
                            data-name="' . e(pathinfo($file->original_name, PATHINFO_FILENAME)) . '"
                            data-isrc="' . e($file->isrc_code ?? '') . '"
                            data-mode="edit"
                            data-url="' . route('audio_files.edit', $file->id) . '">
                            <i class="fas fa-edit"></i>
                        </button>


                        <button class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm delete-btn"
                                data-id="' . $file->id . '"
                                data-name="' . e(pathinfo($file->original_name, PATHINFO_FILENAME)) . '"
                                data-url="' . route('audio_files.destroy', $file->id) . '">
                            <i class="fas fa-trash"></i>
                        </button>
                    ';
                }
                if (auth()->user()->role_id == 1) {
                    $buttons .= '
                      <button class="btn  btn-bg-success btn-active-color-white btn-sm approve-btn"
                                data-id="' . $file->id . '"
                                data-name="' . e(pathinfo($file->original_name, PATHINFO_FILENAME)) . '"
                                data-url="' . route('audio_files.aprove_song', $file->id) . '">
                           Aprove
                        </button>
                ';
                }
                $buttons .= '</div>';
                return $buttons;
            })
            ->addIndexColumn()
            ->rawColumns(['audio_player', 'action', 'status'])
            ->make(true);
    }
}
