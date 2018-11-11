<div class="border">
    <div class="form-group row">
        <div class="col-md-8">
        <form action="{{route('admin.approve')}}" method="post">
            {{csrf_field()}}
            <table>
            <tr>
            <td>
            <select name="user_type">
               <option value="Admin">Admin</option>			
			   <option value="Moderator">Moderator</option>	
               <option value="User">User</option>		
			</select>
            </td>
            <td><input type="submit" class="btn btn-block btn-primary p-lg-left-right" value="Approve"></td>
            </tr>
            </table>
            <input type="hidden" value="{{$user->user_id }}" name="user_id">
        </form> 
        </div>
        <div class="col-md-4">
        <form action="{{route('admin.block')}}" method="post">
            {{csrf_field()}}
            <input type="submit" class="btn btn-block btn-primary p-lg-left-right" value="Block">
            <input type="hidden" value="{{$user->user_id }}" name="user_id">
        </form>     
        </div>
    </div>   
</div>