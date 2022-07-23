<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\models\Message;
use Pusher\Pusher;
use DB;

class MessengerController extends Controller
{
    public function messenger()
    {
        $admin_id = Auth::user()->id;
        $users = User::get();


        $users = DB::table('users')->leftJoin('messages', function ($q) {
                            $q->on('users.id', '=', 'messages.from')
                                ->where('messages.is_read', '=', 0);
                        })
                        ->where('account_type', "user")
                        ->where('isMain', 0)
                        ->select('users.id','users.username','users.email', DB::raw("count(is_read) as unread"))
                        ->groupBy('users.id','users.username','users.email')
                        ->get();


        return view('admin.messenger.messenger', compact('users'));

    }

    public function message($user_id)
    {

        $user_id;

        $my_id = Auth::user()->id;

        $sender = User::findOrFail($user_id);

        
        // Make read all unread message
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        // Get all message from selected user
        $messages = Message::where(function ($q) use ($user_id, $my_id) {
                                $q->where('from', $user_id)->where('to', $my_id);
                            })->get(); 

        return view('admin.messenger.messages.messages', compact('my_id','messages', 'sender'));
        
    }


    public function send_message(Request $request)
    {
        
            $admin_id = Auth::user()->id;

            $from = $admin_id;
            $to = $request->receiver_id;
            $message = $request->message;
    
            $data = new Message();
            $data->from = $from;
            $data->to = $to;
            $data->message = $message;
            $data->is_read = 0; // message will be unread when sending message
            $data->save();



            $options = [
                'cluster' => 'ap2',
                'useTLS' => true
            ];


            $pusher = new Pusher(
                env('PUSHER_APP_KEY'),
                env('PUSHER_APP_SECRET'),
                env('PUSHER_APP_ID'),
                $options
            );


            $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
            $pusher->trigger('my-channel', 'my-event', $data);


    }


}
