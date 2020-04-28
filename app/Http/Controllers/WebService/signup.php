<?php

namespace App\Http\Controllers\WebService;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;

class signup extends Controller
{

    private $rules = array(
      'name'            => 'required|max:255',
      'password'            => 'required|max:255',
       'mobile'           => 'required|unique:users',
    );


    public function signup(Request $request)
    {
      $successMessage = __("apiMessages.signupSuccessMessage");
      $messages = [
        'name.required'           => __("apiMessages.name_required"),
        'password.required'           => __("apiMessages.password_required"),
        'name.max'                => __("apiMessages.name_max"),
        'mobile.required'          => __("apiMessages.phone_required"),
        'mobile.unique'            => __("apiMessages.phone_unique"),
      ];

      Validator::extend('without_spaces', function($attr, $value){
        return preg_match('/^\S*$/u', $value);
      });
      $validator = Validator::make($request->all(), $this->rules, $messages);
      $errors = $this->formatErrors($validator->errors());
      if($validator->fails()) {return $this->errorResponse($errors);}


      $user = new User();
      $user->api_token = $this->generateToken();
      $user->name = $request->name;
      $user->type = 2;
      $user->password = bcrypt($request->password);
      $user->mobile = $request->mobile;
      $user->save();

      return $this->successResponse($user, $successMessage);


    }
}
