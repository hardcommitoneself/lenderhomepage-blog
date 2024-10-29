<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class FollowerController extends Controller
{
    /**
     * Follow a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id  ID of the user to follow
     * @return \Illuminate\Http\RedirectResponse
     */
    public function follow(Request $request, User $user)
    {
        $currentUser = Auth::user();
        
        if (!$currentUser->followings()->where('followed_id', $user->id)->exists()) {
            $currentUser->followings()->attach($user->id);
        }

        return redirect()->back()->with('message', 'User followed successfully!');
    }

    /**
     * Unfollow a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id  ID of the user to unfollow
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unfollow(Request $request, User $user)
    {
        $currentUser = Auth::user();

        $currentUser->followings()->detach($user->id);

        return redirect()->back()->with('message', 'User unfollowed successfully!');
    }
}
