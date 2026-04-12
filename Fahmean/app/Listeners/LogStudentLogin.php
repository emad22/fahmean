<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\LoginActivity;
use Illuminate\Http\Request;

class LogStudentLogin
{
    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    public $request;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;

        // Check if user is a student (has 'student' role or check specific logic)
        // Here I will log for everyone, but we can filter if needed. The request says "student enters", but usually good to log all.
        // If strict requirement: if ($user->hasRole('student'))
        
        if ($user->hasRole('student')) {
            LoginActivity::create([
                'user_id' => $user->id,
                'ip_address' => $this->request->ip(),
                'user_agent' => $this->request->userAgent(),
            ]);
        }
    }
}
