<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Message;
use App\Models\GuestMessage;
use Pusher\Pusher;
use DB;

class MessengerController extends Controller
{

    public function user_messenger()
    {

        $admin = DB::table('users')->leftJoin('messages', function ($q) {
                            $q->on('users.id', '=', 'messages.from')
                                ->where('messages.is_read', '=', 0);
                        })
                        ->where('account_type', "admin")
                        ->where('isMain', 1)
                        ->select('users.id','users.username','users.email', DB::raw("count(is_read) as unread"))
                        ->groupBy('users.id','users.username','users.email')
                        ->first();


        return view('frontend.messenger.messenger', compact('admin'));

    }

    public function user_message($admin_id)
    {
          $my_id = Auth::user()->id;

           $admin_id;

           // Make read all unread message
         Message::where(['from' => $admin_id, 'to' => $my_id])->update(['is_read' => 1]);

           
         $messages = Message::where(function ($q) use ($admin_id, $my_id) {
                            $q->where('from', $admin_id)->where('to', $my_id);
                        })->orWhere(function ($q) use ($admin_id, $my_id) {
                            $q->where('from', $my_id)->where('to', $admin_id);
                        })->get();

   

            return view('frontend.messenger.messages', compact('messages') );
        

    
        

        
        
    }


    public function user_send_message(Request $request)
    {
        if (Auth::check()) {


            $user_id = Auth::user()->id;
            
            $from = $user_id;
            $to = $request->partner_id;
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
            $pusher->trigger('new-channel-name', 'new-event-name', $data);
            
        }
        
       


    }

    public function send_guest_message(Request $request)
    {
        $name = $request->name;
        $message = $request->message;

        $data['name'] = $name;
        $data['message'] = $message;
        $data['status'] = 1;
        $data['is_read'] = 0;

        GuestMessage::create($data);

        $response = [
            'message' => "Message sent successfully",
        ];

        return response($response);

    }
}
