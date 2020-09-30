@extends('layouts.datatable-adminlte2-4-0')
@section('title') Account Email History Details @endsection
@section('content')

      <section class="content-header">
          
        <section class="content-header">
          <h1>
            Account Email Creation Details
       
        </h1>
      
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"><i class="fa fa-users" style="color: blue;"></i> Trainee Schedule</li>
      </ol>
    </section>
   
<!-- /////////////////////////////////////////////////////////////////////// -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">



          

            <div class="box-header">
            
            
            
       </div>   

       <div style="margin-left: -2px;" class="row">
        <br/>
    

@if(count($batch_record) > 0 )

          
          </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive">
             <table id="example1" class="table table-borderless table-striped">
                <thead>
               <tr style="background-color: #a0bdf2">
                  <th class="exportable">S/No</th>
                  <th class="exportable">SAP</th>
                  <th class="exportable">Name</th>
                  <th class="exportable">Email</th>
                  <th class="exportable">Status</th>
                  <th class="exportable">Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                  $count = 0;
                @endphp
                    @foreach ($batch_record as $val)  
                        <tr>
                              <td>{{ $count += 1}}</td>
                              <td>{{$val->sap_no}}</td>
                              <td>{{$val->name}}</td>
                              <td>{{$val->email}}</td>
                              @if ($val->sent == 1)
                                <td class="text-green"><i class="fa fa-check"></i> Sent</td>
                              @else
                                <td class="text-red"><i class="fa fa-close"></i> Not Sent</td>
                              @endif
                              <td>{{$val->created_at}}</td>
                            
                            @if ($val->sent == 1)
                              <td> </td>
                            @else
                              <td>
                                <a href="javascript:ajax_email('{{$val->sap_no}}','{{$val->name}}','{{$val->phone}}','{{$val->email}}','{{$val->batch_id}}')" ><button type="button" class="btn btn-default btn-sm btn-flat" title="Schedule Info"><span class="btn-label"><i class="fa fa-gear"></i> Retry</span></button></a>
                              </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
@else
<br/><br/>
        <p style="padding-left:10px;">{{"  ----No Record Found ----"}}</p>
@endif

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>


  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    
     <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-body">
                <form onsubmit="submitForm()" role="form" method="POST" action="{{url('/store_individual_email_account_creation')}}">
                  @csrf
                    <input type="hidden" name="batch_id" id="batch_id" value="">
                    <div class="form-group">
                        <label class="control-label">SAP</label>
                        <div>
                            <input required readonly type="text" class="form-control input-lg" name="sap" id="sap" value="">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="control-label">Name</label>
                        <div>
                            <input required type="text" class="form-control input-lg" name="name" id="name" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Phone</label>
                        <div>
                            <input required type="text" class="form-control input-lg" name="phone" id="phone" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <div>
                            <input required type="email" class="form-control input-lg" name="email" id="email" value="">
                        </div>
                    </div>

                     @php
                       $user = Auth::user();
                     @endphp

                     @if ($user->can('new-user-email-with-map-user-in-group'))
                      <div class="form-group">
                        <label class="control-label">HR Business Partner Group</label>
                           <select required class="form-control" name="group_id" id="group_id">
                               <option value="">Select Group</option>
                                 @foreach($hr_groups as $val)

                                    <option value="{{$val->group_id}}">{{$val->group_name}}</option>
                                  @endforeach
                            </select>
                      </div>
                    @endif
                    
                    <div class="form-group">
                        <div align="center">
                            <button type="submit" class="btn btn-success">
                                Resend Email
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->


</div>


    
    <script>

      
@if(Session::get('success'))

swal("Successful", "{{Session::get('success')}}", "success");
		
@endif




@if(Session::get('error'))

swal("Failed", "{{Session::get('error')}}", "error");

@endif

function ajax_email(sap, name, phone, email,batch_id)
{
  $("#batch_id").val(batch_id);
  $("#sap").val(sap);
  $("#name").val(name);
  $("#phone").val(phone);
  $("#email").val(email);
  $('#myModal').modal('show');

         

}

function submitForm()
{
  $('#myModal').modal('hide');
   $.blockUI({ message: '<h3 style="background:#f1f2f3"><img width="50" height="50" src="{{asset('img/loading.gif')}}" /> Please wait...</h3>' });
  
}


</script>
@endsection

{{-- //////datatable script start here////////////////// --}}
@section('datatableissuesfixed')
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#example1').removeAttr('width').DataTable( {
      
// the export starts here
        
        dom: 'Bfrtip',
        order: [3, 'asc'],
        buttons: [

      {
         extend: 'excel',
         text: 'Save as Excel',
        exportOptions: {
            columns: ':visible.exportable'
        }
      },
      
]

    
    } );
} );
</script>



@endsection
{{-- //////datatable script ends here////////////////// --}}