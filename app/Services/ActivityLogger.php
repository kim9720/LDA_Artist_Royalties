<?php

namespace App\Services;

use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogger
{
    public static function log($user, $action, $description = null, $metadata = [])
    {
        $request = app(Request::class);

        return ActivityLog::create([
            'user_id' => $user->id,
            'action' => $action,
            'description' => $description ?? $action,
            'metadata' => $metadata,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);
    }
}
