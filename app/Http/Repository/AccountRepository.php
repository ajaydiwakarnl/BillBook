<?php

namespace App\Http\Repository;

use App\Models\Account;
use Illuminate\Support\Facades\Auth;

class AccountRepository extends Account{

	public function getAccountsList($keyword){

		if($keyword != null){

			$keyword = "%".$keyword ."%";
			$accountList = Account::leftjoin('parties','parties.id','account.parties_id')
							->where('parties.firm_name','like', $keyword)
							->orwhere('parties.owner_name','like',$keyword)
							->get();		
			
		}else{

			$accountList = Account::with(['parties'])->get();
		}

		return $accountList;
	}

	public  function addAccount($partiesId,$status){

		$check   =  Account::where('parties_id',$partiesId)->count();

		if($check > 0){

			$account = new Account;
			$account->parties_id = $partiesId;
			$account->status = $status;
			$account->save();
		}else{

			$account = 0;
		}
			

		return $account;
	}

}


}