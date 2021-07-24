<div>
   
 <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Manage Accounts </h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="box-main">
        <div class="box-main-table">
        	<div class="row">
            <div class="col-lg-4">
              <label for="owner_name" class="lableClass">Select Parties</label>
              <select class="form-control" 
              wire:change="changeEvent($event.target.value)" wire:model="partiesId">
                <option value="">Select Parties</option>
                @foreach($partiesList as $list)
                  <option value="{{ $list->id }}"> {{ $list->firm_name }}</option>
                @endforeach()
              </select>
            </div>
            <div class="col-lg-4">
              <label for="owner_name" class="lableClass">Owner Name</label>
              <input type="text"  class="form-control" value="{{ $ownerName ? $ownerName : 'No owner found'}}" 
              disabled="disabled">
            </div>
            <div class="col-lg-4" style="margin-top: 30px;">
              <button class="btn btn-primary" wire:click.prevent="store()">Open Account</button>
            </div>
          </div>  
          <div style="margin-top: 30px;">
            <livewire:account.account-view />
          </div>  
        </div>
      </div>
    </div>
  </section>


</div>
