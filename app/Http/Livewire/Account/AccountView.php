<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;
use App\Http\Repository\AccountRepository;

class AccountView extends Component
{
	public $accountList,$keyword;
    
    public function render(AccountRepository $accountRepository)
    {
    	if($this->keyword != null){
    		
    		$keyword = $this->keyword;
    	
    	}else{
    		$keyword = null;
    	}
    	$this->accountList = $accountRepository->getAccountsList($keyword);
        return view('livewire.account.account-view');
    }
}
