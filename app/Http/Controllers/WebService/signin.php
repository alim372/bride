<?php

namespace App\Http\Controllers\WebService;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\User;

class signin extends Controller
{
    private $rules = [
      'mobile' => 'required|exists:users',
      'password' => 'required',
     ];



    public function signin(Request $request)
    {
        $messages = [
            'mobile.required' => __("apiMessages.phone_required"),
            'password.required' => __("apiMessages.password_required"),
            'mobile.exists'   => __("apiMessages.phone_exists"),
         ];

        $validator = Validator::make($request->all(), $this->rules, $messages);
        $errors = $this->formatErrors($validator->errors());
        if($validator->fails()) {return $this->errorResponse($errors);}

        $user = User::select('*')
            ->where('mobile',$request->mobile)
             ->first();
        if ($user && Hash::check($request->password, $user->password)) {
            // here you know data is valid
            $user->type = (integer) $user->type;

         return $this->successResponse($user);
        }
        else{
            return $this->errorResponse('خطأ فى رقم الهاتف او كلمة المرور');
        }
    }
}
