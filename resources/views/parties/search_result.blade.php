
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
