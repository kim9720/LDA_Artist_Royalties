<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ComplaintController extends Controller
{
    public function complaintListPage()
    {
        $complaints_inbox_count = Complaint::when(Auth::user()->role_id != 1, function ($q) {
            $q->where('user_id', Auth::user()->id);
        })
            ->with('user')
            ->select(['id', 'user_id', 'subject', 'content', 'status', 'created_at'])
            ->where('status', 1)->count();
        return view('complaints.complaints_list', compact('complaints_inbox_count'));
    }
    public function complaintComposePage()
    {
        $complaints_inbox_count = Complaint::when(Auth::user()->role_id != 1, function ($q) {
            $q->where('user_id', Auth::user()->id);
        })
            ->with('user')
            ->select(['id', 'user_id', 'subject', 'content', 'status', 'created_at'])
            ->where('status', 1)->count();
        return view('complaints.complaint_compose', compact('complaints_inbox_count'));
    }
    public function complaintMarkedPage()
    {
        $complaints_inbox_count = Complaint::when(Auth::user()->role_id != 1, function ($q) {
            $q->where('user_id', Auth::user()->id);
        })
            ->with('user')
            ->select(['id', 'user_id', 'subject', 'content', 'status', 'created_at'])
            ->where('status', 1)->count();
        return view('complaints.complaint_marked_list', compact('complaints_inbox_count'));
    }

    public function complaintStore(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            'attachments.*' => 'file|max:2048',
        ]);

        $complaint = Complaint::create([
            'user_id' => auth()->id(),
            'subject' => $validated['subject'],
            'content' => $validated['content'],
            'status' => 'submitted',
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $complaint->addAttachment($file);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Complaint submitted successfully',
            'data' => $complaint
        ]);
    }

    public function getComplaints()
    {
        $complaints = Complaint::when(Auth::user()->role_id != 1, function ($q) {
            $q->where('user_id', Auth::user()->id);
        })
            ->with('user')
            ->select(['id', 'user_id', 'subject', 'content', 'status', 'created_at']);
        return DataTables::of($complaints)
            ->addColumn('user', function ($complaint) {
                return [
                    'id' => $complaint->user->id,
                    'name' => $complaint->user->name,
                    'avatar' => $complaint->user->profile_picture ? asset('storage/profile_pictures/' . $complaint->user->profile_picture) : null,
                    'initials' => strtoupper(substr($complaint->user->name, 0, 1)),
                    'initials_color' => ['primary', 'success', 'info', 'warning', 'danger'][rand(0, 4)]
                ];
            })
            ->rawColumns(['user'])
            ->make(true);
    }

    public function show($id)
    {
        $complaints_inbox_count = Complaint::when(Auth::user()->role_id != 1, function ($q) {
            $q->where('user_id', Auth::user()->id);
        })
            ->with('user')
            ->select(['id', 'user_id', 'subject', 'content', 'status', 'created_at'])
            ->where('status', 1)->count();
        $complaint = Complaint::find($id);
        return view('complaints.user_compliant_show', compact('complaint', 'complaints_inbox_count'));
    }

    public function markReaded($id)
    {
        try {
            $complaint = Complaint::findOrFail($id);
            $complaint->status = 2;

            if ($complaint->save()) {
                return back()->with('swal', [
                    'type' => 'success',
                    'title' => 'Success!',
                    'text' => 'Complaint marked as read successfully!'
                ]);
            }

            return back()->with('swal', [
                'type' => 'error',
                'title' => 'Failed!',
                'text' => 'Failed to update complaint status.'
            ]);
        } catch (\Exception $e) {
            return back()->with('swal', [
                'type' => 'error',
                'title' => 'Error!',
                'text' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }

    public function getMarkedComplaints()
    {
        $complaints = Complaint::when(Auth::user()->role_id != 1, function ($q) {
            $q->where('user_id', Auth::user()->id);
        })
            ->with('user')
            ->select(['id', 'user_id', 'subject', 'content', 'status', 'created_at'])
            ->where('status', 2);
        return DataTables::of($complaints)
            ->addColumn('user', function ($complaint) {
                return [
                    'id' => $complaint->user->id,
                    'name' => $complaint->user->name,
                    'avatar' => $complaint->user->profile_picture ? asset('storage/profile_pictures/' . $complaint->user->profile_picture) : null,
                    'initials' => strtoupper(substr($complaint->user->name, 0, 1)),
                    'initials_color' => ['primary', 'success', 'info', 'warning', 'danger'][rand(0, 4)]
                ];
            })
            ->rawColumns(['user'])
            ->make(true);
    }

    public function deleteComplaints(Request $request)
    {
        $validated = $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:complaints,id'
        ]);

        try {
            Complaint::whereIn('id', $validated['ids'])->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete complaints: ' . $e->getMessage()
            ], 500);
        }
    }
}
