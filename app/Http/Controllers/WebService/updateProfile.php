<?php

namespace App\Http\Controllers\WebService;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
use App\User;

class updateProfile extends Controller
{
    private $rules = [
      'name'            => 'nullable',
      'email'        => 'nullable',
      'mobile'           => 'nullable',
      'photo'           => 'nullable',
      'photo_extension' => 'nullable',
    ];

    private $messages = [
    ];

    public function updateProfile(Request $request)
    {
      $user = User::where('api_token', $request->api_token)->first();
      $this->rules['mobile'] = 'nullable|unique:users,mobile,'. $user->id;
      $this->rules['email'] = 'nullable|unique:users,email,'. $user->id;
      $validator = Validator::make($request->all(), $this->rules, $this->messages);
      $errors = $this->formatErrors($validator->errors());
      if($validator->fails()) {return $this->errorResponse($errors);}

      if(isset($request->photo) && $request->photo_extension == NULL){
        return $this->errorResponse('photo_extension is required');
      }

      if(isset($request->photo)){
        $request->merge(['photo' => $this->uploadBase64($request->photo, $request->photo_extension, 'users')]);
      }

      $user->update($request->all());

      $user->photo = asset($user->photo);

      return $this->successResponse($user);
    }
}
