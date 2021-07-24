<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginFormRequest;
use App\Http\Repository\LoginRepository;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller{
   
    public  function login(Request $request){

   		return view('login');
    }


    public function doLogin(LoginFormRequest $request, LoginRepository $loginRepository ){
    	
        if($request->validated()){
    		
    		$userCredential =  $loginRepository->doLogin($request->email,$request->password);
    		if($userCredential){
    			return redirect()->route('dashboard')->with('success', 'Login successful');
    		}else{
    			return redirect()->back()->with('error', 'Invalid email or password');
    		}

    	} 
    }

    public function Logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
