<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;
use App\Http\Repository\PartiesRepository;
use App\Http\Repository\AccountRepository;

class AccountComponent extends Component
{

	public $partiesList,$ownerName,$partiesId,$status;

    public function render(PartiesRepository $partiesRespository)
    {
    	$this->partiesList = $partiesRespository->getAllPartiesWithoutPagination();
        return view('livewire.account.account-component');
    }

    public function changeEvent($value,PartiesRepository $partiesRespository)
    {
    	if($value!=null ){		
	    	$parties = $partiesRespository->getParties($value);
	    	$this->ownerName = $parties->owner_name;	
    	
    	}else{
    		$this->ownerName = "No owner found";	
    	}
    }

    public function store(AccountRepository $accountRepository)
    {
        $this->status = "open";
        $account = $accountRepository->addAccount($this->partiesId,$this->status);
        if($account == 0){

        }


    }

}
