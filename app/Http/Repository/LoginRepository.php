<?php

namespace App\Http\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginRepository extends User{

	public function doLogin($email,$password){

		Auth::attempt(['email' => $email, 'password' => $password]);
        return Auth::user() ?? 0;

	}

}
