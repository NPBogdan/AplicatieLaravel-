<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NotificationController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Notification::class, 'notifications');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Notification::class);
        //Get all notifications from current auth user
        $user = Auth::user();
        if($user->isAdministrator()){
            $notifications = Notification::all()->sortByDesc('created_at');
        }
        else{
            $notifications = Notification::where('notifiable_id', $user->id)->orderByDesc('created_at')->get();
        }

        //Mark all notifications as read
        $user->unreadNotifications()->update(['read_at' => now()]);
        return view('notification',compact('notifications'));
    }
}
