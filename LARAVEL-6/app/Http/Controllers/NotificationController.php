<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification as NotificationFacade;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::all();
        return view('notifications.index', compact('notifications'));
    }

    public function create()
    {
        return view('notifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'email' => 'required|email',
        ]);

        $notification = Notification::create($request->all());

        // SendEmailNotification::dispatch($notification);


        $details = [
            'title' => $request->title,
            'message' => $request->message,
        ];

        NotificationFacade::route('mail', $request->email)->notify(new UserNotification($details));

        return redirect()->route('notifications.index')->with('success', 'Notification created and email sent.');
    }
}
