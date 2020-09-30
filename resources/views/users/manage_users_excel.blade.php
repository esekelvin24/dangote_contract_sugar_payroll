<html>
<tr>
  <td colspan="4" style="background-color: #a0bdf2; text-align: center;">Unitwise Concrete Supplied Report from 26-07-2017 to 07-09-2017</td>
</tr>
<thead>
 <tr>
                  <th>S/No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                </tr>
                </thead>
                  
                   @foreach ($role_users as $a => $role_user)  
                <tr>
                  <td>{{$a + 1}}</td>
                  <td>{{$role_user->name}}</td>
                  <td>{{$role_user->email}}</td>
                  <td>{{$role_user->role_display_name}}</td>
                </tr>
                 @endforeach
</html>