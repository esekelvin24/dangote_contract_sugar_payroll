 
 <!-- bootstrap-select CSS -->
 <link href="{{asset('vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css"/>
 
 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

 <!--alerts CSS -->
 <link href="{{asset('vendors/bower_components/sweetalert/dist/sweetalert.css')}}" rel="stylesheet" type="text/css">
		



<table border="0" style="width:100%">
    <tr>
        <td>
                <img height="100" width="150" class="brand-img" src="{{asset('img/logo.png')}}" alt="brand"/>
        </td>
        <td align="center">
                <h2>Nassarawa Sugar Company Limited BIP</h2>
        </td>
        <td>
            <table cellpadding="5"  border="2">
                <tr>
                    <td width="140" >
                        <strong>Department </strong>
                    </td>
                    <td width="220">
                     {{$department_name}}
                    </td>
                </tr>
                <tr>
                    <td width="140" >
                        <strong>Section </strong>
                    </td>
                    <td width="220">
                     {{$section}}
                    </td>
                </tr>
                <tr>
                    <td>
                     <strong> Job Allocation</strong>
                    </td>
                    <td>
                            
                    </td>
                </tr>
                <tr>
                    <td>
                      <strong>Expiration Date </strong>
                    </td>
                    <td>
                          {{$expiration_date}}  
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
            <td colspan="3"></td>
    </tr>
    <tr>
        <td></td>
        <td align="center"> <strong>Time Sheet</strong></td>
        <td></td>
    </tr>

    <tr>
        <td colspan="3">
            <table cellpadding="5" style="width:100%" border="0">
                <tr>
                   <td colspan="2" width="200" align="right"><strong>Date:</strong></td>
                   
                   @if(count($date_list) > 0)
                     @for($i = 0; $i < count($date_list); $i++)
                        <td style="border: 2px solid;" align="center">{{$date_list[$i]}}</td>
                     @endfor
                   @endif
                   <td colspan="2"></td>
                   

                </tr>
                <tr>
                  <td style="border: 2px solid;" align="left"><strong>STAFF ID</strong></td>
                  <td style="border: 2px solid;" align="left"><strong>NAME</strong></td>
                  
                @if(count($day_list) > 0)
                  @for($i = 0; $i < count($day_list); $i++)
                        <td style="border: 2px solid;" align="center"><strong>{{$day_list[$i]}}</strong></td> 
                  @endfor
                @endif

                        <td style="border: 2px solid;" width="100" align="center"><strong>OT</strong></td>
                        <td style="border: 2px solid;" width="100" align="center"><strong>Days</strong></td>
     
                 </tr>

                 @if(count($staff_list) > 0)
                   @foreach($staff_list as $staff)
                    
                        <tr>
                                <td style="border: 2px solid;" align="left"><strong>{{$staff->staff_id}}</strong></td>
                                <td style="border: 2px solid;" align="left"><strong>{{$staff->first_name." ".$staff->othername." ".$staff->last_name}}</strong></td>
                                

                        @if(count($date_list) > 0)
                            @for($i = 0; $i < count($date_list); $i++)
                                <td style="border: 2px solid;" align="center"></td>
                            @endfor
                        @endif 
                                <td style="border: 2px solid;" align="center"></td>
                                <td style="border: 2px solid;" align="center"></td>
                        </tr>
                     
                    @endforeach
                 @endif
            </table>
            



            <table style="position:relative; margin-top:200px;  bottom: 0px;">
                <tr>
                   <td>
                       _______________________________________<br/> Authorized Signature and Date
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                </tr>
            </table>


        </td>
    </tr>
</table>





 
 
 
 
 <!-- jQuery -->
 <script src="{{asset('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>
	
 <!-- Bootstrap Core JavaScript -->
 <script src="{{asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
 
<!-- Sweet-Alert   -->

<script src="{{asset('dist/js/sweetalert.min.js')}}"></script>

 <script>
     $(document ).ready(function() {

            if ({{$code}} == "200")
            {
                  swal({ 
                        title: "Successful",   
                        icon: "success", 
                        text: "Your time sheet is ready for printing, kindly ensure your device is connected to a printer",
                        confirmButtonColor: "#469408",   
                      }).then((value) => {

                        window.print();

                    });

                
            }else if ({{$code}} == "113")
            {
                swal({ 
                        title: "{{$message}}",   
                        icon: "warning", 
                        text: "If problem presist, kindly contact the system admin",
                        confirmButtonColor: "#469408",   
                      }).then((value) => {

                         closeMe();

                    });

            }else
            {

                swal({ 
                        title: "{{$message}}",   
                        icon: "warning", 
                        text: "If problem presist, kindly contact the system admin",
                        confirmButtonColor: "#469408",   
                      }).then((value) => {

                         closeMe();

                    });

                      
                        
                

            }
          
           

           });

            //closeMe();
            function closeMe()
            {
                window.opener = self;
                window.close();
            }
    //

                            
 </script>
 
  
 
 
 
 
 
 
 
 
 
 
 
    