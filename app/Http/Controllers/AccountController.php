<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\PartiesRepository;

class AccountController extends Controller
{
	public function index(){
		return view('account.view');
	}
}
