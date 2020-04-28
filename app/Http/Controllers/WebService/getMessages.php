<?php

namespace App\Http\Controllers\WebService;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use Hash;
use Flashy;
use Validator;
use App\User;
use App\Message;
use Illuminate\Support\Facades\Auth;

class getMessages extends Controller
{
    
    public function sendMessage(Request $request)
    {
        $user = Auth::user();
        
        $message = new Message();
        $message->user_id = $user->id;
        $message->sender_id = $user->id;
        $message->message = $request->message;
        $message->save();
                 return $this->successResponse(null, 'تم الارسال');

    }
    public function getMessages(Request $request)
    {
        $user = Auth::user();
         $data['messages'] = App\Message::select('messages.*','users.name as user_name')
            ->join('users','messages.user_id','users.id')
            ->where('user_id',$user->id)->get();
            
            foreach($data['messages'] as $message){
                if($message->sender_id == null){
                    $message->sender_id = 0;
                    $message->user_id = (integer) $message->user_id;
                }else{
                    $message->sender_id = (integer) $message->sender_id;
                    $message->user_id = (integer) $message->user_id;

                }
            }
         return $this->successResponse($data);

    }

}
