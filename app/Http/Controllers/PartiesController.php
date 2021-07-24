<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Repository\PartiesRepository;
use App\Http\Requests\PartiesFormRequest;

class PartiesController extends Controller
{
	public function index(PartiesRepository $partiesRespository){
		$partiesList = $partiesRespository->getAllParties();
		return view('parties.view',compact('partiesList'));
	} 

	public function add(){
		return view("parties.add",['parties' => null]);
	}

	public function save(PartiesFormRequest $request,PartiesRepository $partiesRespository){
		
		$data = $request->validated();
		if($data){
			if ($request->hasFile('photo')) {
            	$extension = $request->file('photo')->getClientOriginalExtension();
            	if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg' ) {
            		$File = time() . '.' . $request->file('photo')->getClientOriginalExtension();
            		$destinationPath = 'parties';
                	$request->file('photo')->move($destinationPath, $File);
                	$documentFile = $destinationPath . '/' . $File;
					$data['photo']	= $File;
            	}
        	}
    		$parties = $partiesRespository->addParties($data);

    		if($parties){
    			return redirect()->route('parties.index');
    		}
    	}
	}

	public function edit( Request $request,PartiesRepository $partiesRespository){
		$parties = $partiesRespository->getParties($request->id);
		return view('parties.add',compact('parties'));
	}

	public function saveEdit(Request $request,PartiesRepository $partiesRespository){

		$data = $request->all();
		if ($request->hasFile('photo')) {
        	$extension = $request->file('photo')->getClientOriginalExtension();
        	if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg' ) {
        		$File = time() . '.' . $request->file('photo')->getClientOriginalExtension();
        		$destinationPath = 'parties';
            	$request->file('photo')->move($destinationPath, $File);
            	$documentFile = $destinationPath . '/' . $File;
				$data['photo']	= $File;
        	}
        }
		$parties = $partiesRespository->saveEdit($data);
		if($parties){
    		return redirect()->route('parties.index');
    	}
	}

	public function delete( Request $request,PartiesRepository $partiesRespository){

		$parties = $partiesRespository->delParties($request->id);
		if($parties == 1){
			return redirect()->route('parties.index');
		}
	}


	public function searchParties(Request $request,PartiesRepository $partiesRespository){

		if($request->ajax()){
			$partiesList = $partiesRespository->searchParties($request->keyword);
			return view('parties.search_result',compact('partiesList'));
		}

	}
}
