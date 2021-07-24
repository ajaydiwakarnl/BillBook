<?php

namespace App\Http\Repository;

use App\Models\Parties;
use Illuminate\Support\Facades\Auth;

class PartiesRepository extends Parties{

	public function getAllParties(){

		$partiesList = Parties::Paginate(10);
		return $partiesList;
	}

	public function addParties($data){

		$parties = new Parties;
		$parties->firm_name 	= $data['firm_name']; 
		$parties->owner_name 	= $data['owner_name']; 
		$parties->address 		= $data['address']; 
		$parties->phone_number 	= $data['phone_number']; 
		$parties->photo 		= @$data['photo'] ?? null; 
		$parties->save(); 

		return $parties ?? 0;
	}


	public function getParties($id){

		$parties = Parties::find($id);
		return $parties;
	}

	public function saveEdit($data){

		$parties = Parties::find($data['id']);
		$parties->firm_name 	= $data['firm_name']; 
		$parties->owner_name 	= $data['owner_name']; 
		$parties->address 		= $data['address']; 
		$parties->phone_number 	= $data['phone_number']; 
		$parties->photo 		= @$data['photo'] ?? $parties->photo; 
		$parties->save(); 

		return $parties ?? 0;
	}

	public function delParties($id){

		$parties = Parties::find($id)->delete();
		return 1;
	}


	public function searchParties($keyword){

		$parties = Parties::where('firm_name','like', "%".$keyword ."%")
					->orwhere('owner_name','like',"%".$keyword ."%")
					->orwhere('phone_number','like',"%".$keyword ."%")->Paginate(10);

		return $parties;
	}

	public function getAllPartiesWithoutPagination(){

		$partiesList = Parties::get();
		return $partiesList;
	}


	

}
