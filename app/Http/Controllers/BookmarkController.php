<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function save($jobId)
    {
        $user = Auth::user();
        
        // Check if already bookmarked
        if ($user->bookmarks()->where('job_id', $jobId)->exists()) {
            return redirect()->back()->with('info', 'Job already bookmarked.');
        }

        // Save bookmark
        Bookmark::create([
            'user_id' => $user->id,
            'job_id' => $jobId,
        ]);

        return redirect()->back()->with('success', 'Job saved to bookmarks!');
    }

    public function remove($jobId)
    {
        $user = Auth::user();
        $user->bookmarks()->where('job_id', $jobId)->delete();

        return redirect()->back()->with('success', 'Bookmark removed.');
    }
}
