@extends('layout.app')
@section('content')

 <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Manage Parties </h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="box-main">
        <div class="box-main-top">
          <div class="box-main-title">Parties List</div>
          <div class="box-main-top-right">
            <div class="box-serch-field">
              <input type="text" class="box-serch-input" id="search" name="search" placeholder="Search" onkeyup="doSearch()" >
              <i class="fa fa-search" aria-hidden="true"></i>
            </div>
			       <a href="{{ route('parties.add') }}"><button class="btn btn-primary">Add</button></a>
          </div>
        </div>
        <div class="box-main-table">
          <div class="table-responsive">
            <table  id="example2" class="table table-bordered admin-table">
              <thead>
                <tr>
                  <th>S. No.</th>
                  <th>Photo</th>
                  <th>Firm Name</th>
                  <th>Owner Name</th>
                  <th>Phone Number</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
	              	@forelse($partiesList as $no => $parties)
		                <tr>
		                  <td >{{ $no + 1 }}</td>
		                  <td>
                        <span class="profile-img">
                          @if($parties->photo != null )
                            <img src="{{URL('parties')}}/{{$parties->photo}}" alt="">
                          @else
                            <img src="{{URL('avatar.png') }}" alt="">
                          @endif
                        </span>
                      </td>
		                  <td>{{ $parties->firm_name }}</td>
		                  <td>{{ $parties->owner_name }}</td>
		                  <td>{{ $parties->phone_number }}</td>	
		                  <td>
                        <a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
                        &nbsp;&nbsp;
                        <a href="{{route('parties.edit',$parties->id) }}"><i class="fas fa-edit"  aria-hidden="true"></i></a>
                        &nbsp;&nbsp;
                        <a href="{{route('parties.delete',$parties->id) }}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      </td>
		                </tr>
  		            @empty
                    <tr class="text-center">
                      <td colspan="6">No record found </td>
                    </tr> 
                  @endforelse     
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <script type="text/javascript">
    
    function doSearch(){

      var query=$("#search").val();
      $.ajax({
          url: "{{ route('parties.searchParties')}}",
          type: 'GET',
          data: {
            keyword:query,
          },
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },

          success: function (data) {
            $('tbody').html(data);
          }
      });

    }
</script>
@stop