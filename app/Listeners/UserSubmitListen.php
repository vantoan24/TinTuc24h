<?php

namespace App\Listeners;

use App\Events\UserSubmitEvent;
use App\Models\SystemLog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class UserSubmitListen
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserSubmitEvent  $event
     * @return void
     */
    public function handle(UserSubmitEvent $event)
    {
        $user = Auth::user();

        $data = '';
        $username = $user->id . '-' . $user->name;
        $nameUser = $event->user->id . '-' .  $event->user->name;

        switch ($event->user->active) {
            case 'update':
                $data =  $username . ' đã cập nhật nhân viên: ' . $nameUser;
                break;
            case 'store':
                $data =  $username . ' đã thêm nhân viên: ' . $nameUser;
                break;
            case 'destroy':
                $data =  $username . ' đã xóa nhân viên: ' . $nameUser;
                break;
            default:
                # code...
                break;
        }
        $user = new SystemLog();
        $user->type = 'UserSubmitEvent';
        $user->data = $data;
        $user->user_id = $event->user->id;


        // dd($event);
        $user->save();
    }
}
