<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ComplaintController extends Controller
{
    public function complaintListPage(){
        return view('complaints.complaints_list');
    }
    public function complaintComposePage(){
        return view('complaints.complaint_compose');
    }

    public function complaintStore(Request $request){
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
        $complaints = Complaint::with('user')
            ->select(['id', 'user_id', 'subject', 'content', 'status', 'created_at']);
// dd($complaints->get());
        return DataTables::of($complaints)
            ->addColumn('user', function($complaint) {
                return [
                    'id' => $complaint->user->id,
                    'name' => $complaint->user->name,
                    'avatar' => $complaint->user->profile_picture? asset('storage/profile_pictures/' . $complaint->user->profile_picture) : null,
                    'initials' => strtoupper(substr($complaint->user->name, 0, 1)),
                    'initials_color' => ['primary', 'success', 'info', 'warning', 'danger'][rand(0, 4)]
                ];
            })
            ->rawColumns(['user'])
            ->make(true);
    }

    public function show(Complaint $complaint) // Using Route Model Binding
{
    // Returns a view with the complaint data
    return view('complaints.show', compact('complaint'));

    // Or for APIs:
    // return response()->json($complaint);
}
}
