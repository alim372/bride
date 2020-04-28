<?php

namespace App\Http\Controllers\WebService;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;
use Illuminate\Support\Facades\Hash;

class changePassword extends Controller
{
    private $rules = [
        'password' => 'nullable',
        'old_password' => 'nullable',

    ];

    private $messages = [
    ];

    public function changePassword(Request $request)
    {

        


        $validator = Validator::make($request->all(), $this->rules, $this->messages);
        $errors = $this->formatErrors($validator->errors());
        if ($validator->fails()) {
            return $this->errorResponse($errors);
        }
     $user = User::where('api_token', $request->api_token)->first();

        if ($user && Hash::check($request->old_password, $user->password)) {
            $user->password = bcrypt($request->password);
            $user->save();
        }else{
                      return $this->errorResponse("old Password not match");
 
        }
        
        

        $user->photo = asset($user->photo);

        return $this->successResponse($user);
    }

}
