


@for($i = 1; $i < $count_rotation + 1; $i++)


    <tr class="even pointer">
        <th scope="row" bgcolor="#F5F7FA">Rotation {{$i}}:</th>
        <td class="pull-xs-left col-sm-9 col-xs-8">
           <label>
               Department
           </label>
            <select class="form-control" name="" id="">
                <option>-- Select Department --</option>
                <option>IT</option>
                <option>HR</option>
                <option>ADMIN</option>
                <option>XCMG</option>
                <option>HSE</option>
            </select>

            @if ($errors->has('phone_number'))
                <span class="help-block">
                <font color="red"><strong>{{ $errors->first('phone_number') }}</strong></font>
                </span>
            @endif
            <label style="margin-top:10px">
                Start Date
            </label>
                <input class="form-control" id="start_date" name="" >

            @if ($errors->has('phone_number'))
                <span class="help-block">
                <font color="red"><strong>{{ $errors->first('phone_number') }}</strong></font>
                </span>
            @endif

            <label style="margin-top:10px">
                End Date
            </label>
                    <input class="form-control" id="start_date" name="" >


                @if ($errors->has('phone_number'))
                    <span class="help-block">
                    <font color="red"><strong>{{ $errors->first('phone_number') }}</strong></font>
                    </span>
                @endif
                <br/>
                <br/>
                </td>
        </tr>


@endfor