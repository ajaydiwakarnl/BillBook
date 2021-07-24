@extends('layout.app')
@section('content') 
 <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">{{  $parties ? "Edit Parties" : "Add Parties"}} </h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="box-main">
        <div class="box-main-table">
	        <div class="container-fluid">
	        	{!! Form::open(['url'=> $parties ? route('parties.saveEdit') : route('parties.save'), 'method'=>'post', 'id'=>'add_parties_form','enctype' => 'multipart/form-data' ]) !!}

	        		<input type="hidden" name="id" value="{{ $parties ? $parties->id : '' }}">
		          	<div class="form-group">
		          		<label for="firm_name" class="lableClass">Firm Name</label>
		          		<input type="text" name="firm_name" id="firm_name" placeholder="Enter Firm Name" class="form-control" value="{{ $parties ? $parties->firm_name : '' }}">
		          		<span class="text-danger"><small>{{ $errors->first('firm_name') }}</small></span>
		          	</div>
		          	<div class="row">
		          		<div class="col-lg-6">
				          	<div class="form-group">
				        		<label for="owner_name" class="lableClass">Owner Name</label>
		          				<input type="text" name="owner_name" id="owner_name" placeholder="Enter Owner Name" class="form-control" value="{{ $parties ? $parties->owner_name : '' }}">

		          				<span class="text-danger">
		          					<small>{{ $errors->first('owner_name') }}</small></span>
				          	</div>	
				        </div>
				        <div class="col-lg-6">
				          	<div class="form-group">
				        		<label for="phone_mobile" class="lableClass">Phone Mobile</label>
		          				<input type="text" name="phone_number" id="phone_number" placeholder="Enter Phone Mobile" class="form-control"
		          				value="{{ $parties ? $parties->phone_number : '' }}">

		          				<span class="text-danger">
		          					<small>{{ $errors->first('phone_number') }}</small></span>
				          	</div>	
				        </div>  	
			        </div> 
			        <div class="form-group">
		          		<label for="address" class="lableClass">Address</label>
		          		<textarea name="address" id="address" placeholder="Enter Address"
		          		class="form-control">{{ $parties ? $parties->address : '' }}</textarea> 
		          		<span class="text-danger">
		          			<small>{{ $errors->first('address') }}</small></span>
		          	</div>

		          	<div class="form-group">
		          		<label for="photo" class="lableClass">Photo</label>
		          		<input type="file" name="photo" id="photo"  class="form-control">
		          	</div>
		          	@if($parties != null)
			          	<span class="profile-img">
			          		@if($parties->photo != null)
		                		<img src="{{URL('parties')}}/{{$parties->photo}} " alt="">
		                	@else
		                		<img src="{{URL('avatar.png')}}" alt="">
		                	@endif	
		                </span>
		            @endif()  
		          	<div class="text-right">
		          		<button type="submit" class="btn btn-primary">Save</button>
		          	</div>
		        {!!Form::close()!!}  		
	        </div>	
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <script type="text/javascript">
  	 $("#add_parties_form").validate({
        rules: {
            firm_name: {
                required: true,
            },

            owner_name: {
                required: true,

            },

            phone_number: {
                required: true,
                maxlength: 10,
            },

            address: {
                required: true,

            },
        },
        messages: {

            firm_name: {
                required: "Please enter firm name",
            },

            owner_name: {
                required: "Please enter owner name",
            },

            country_code: {
                required: "Please enter country code",
            },

            phone_number: {
                required: "Please enter mobile number",
            },

            address: {
                required: "Please valid address",
            }
        },
    })
  </script>

@stop
