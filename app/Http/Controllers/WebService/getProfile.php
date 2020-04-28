<?php

namespace App\Http\Controllers\WebService;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;
use App\Post;

class getProfile extends Controller
{
    private $rules = [
      'user_id' => 'required|exists:users,id',
    ];


    public function getProfile(Request $request)
    {

      $messages = [
        'user_id.required' => __("apiMessages.user_id_required"),
        'user_id.exists'   => __("apiMessages.user_id_exists"),
      ];

      $validator = Validator::make($request->all(), $this->rules, $messages);
      $errors = $this->formatErrors($validator->errors());
      if($validator->fails()) {return $this->errorResponse($errors);}

      $auth = User::where('api_token', $request->api_token)->first();

      $user = User::select('id', 'name', 'profile', DB::raw("CONCAT('".url('')."/', photo) AS photo"))->where('id', $request->user_id)->first();

      $data = array(
          'profile'       => $user
       );

      return $this->successResponse($data);

    }
}
