<div>

	<div class="text-right">
		<div class="box-serch-field " >
	        <input type="text" class="box-serch-input" id="search" name="search" placeholder="Search"
	        wire:model="keyword">
	        <i class="fa fa-search" aria-hidden="true"></i>
	   	</div>
	</div>	
	<div style="margin-top: 20px;">
		<table id="example2" class="table table-bordered admin-table">
	      <thead>
	        <tr>
	          <th>S.No.</th>
	          <th>Firm Name</th>
	          <th>Owner Name</th>
	          <th>Status</th>
	          <th>Date</th>
	          <th>Action</th>
	        </tr>
	      </thead>
	      <tbody>
	      	@forelse($accountList as $key => $list)
	      		<tr>
	      			<td>{{ $key + 1 }}</td>
	      			<td>{{ $list->parties->firm_name }}</td>
	      			<td>{{ $list->parties->owner_name }}</td>
	      			<td class="text-success">
	      				<strong>{{ $list->status }}</strong>
	      			</td>
	      			<td>
	      				{{ date('d M,Y',strtotime($list->created_at)) }}
	      			</td>
	      			<td>
	      				<a href=""><i class="fa fa-eye" aria-hidden="true"></i></a>
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
