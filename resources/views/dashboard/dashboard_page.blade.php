
@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')

<style>
.dash_bg{
    background: #e4e3e2 !important;
}

.myred
{
    color:#337ab7 !important;
}

.myblue
{
    color: #1f1d5e !important;
}

#container {
    height: 400px;
}

.highcharts-figure, .highcharts-data-table table {
    min-width: 310px;
    max-width: 800px;
    margin: 1em auto;
}

#datatable {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #EBEBEB;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}
#datatable caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
#datatable th {
	font-weight: 600;
    padding: 0.5em;
}
#datatable td, #datatable th, #datatable caption {
    padding: 0.5em;
}
#datatable thead tr, #datatable tr:nth-child(even) {
    background: #f8f8f8;
}
#datatable tr:hover {
    background: #f1f7ff;
}

</style>


            <div class="container-fluid pt-25">
                
                    
                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="panel panel-default card-view pa-0">
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body pa-0">
                                        <div class="sm-data-box dash_bg">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                        <span class="myblue txt-light block counter"><span class="counter-anim">{{$temporary_staff}}</span></span>
                                                        <span class="myblue weight-500 uppercase-font txt-light block font-13">Temporary Staff</span>
                                                    </div>
                                                    <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                        <i class="myred zmdi zmdi-male-female txt-light data-right-rep-icon"></i>
                                                    </div>
                                                </div>	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="panel panel-default card-view pa-0">
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body pa-0">
                                        <div class="sm-data-box dash_bg">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                        <span class="myblue txt-light block counter"><span class="counter-anim">{{$casual_staff}}</span></span>
                                                        <span class="myblue weight-500 uppercase-font txt-light block">Casual Staff</span>
                                                    </div>
                                                    <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                            <i class="myred zmdi zmdi-male-female txt-light data-right-rep-icon"></i>
                                                    </div>
                                                </div>	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                            <div class="panel panel-default card-view pa-0">
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body pa-0">
                                        <div class="sm-data-box dash_bg">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                        <span class="myblue txt-light block counter"><span class="counter-anim">{{$department}}</span></span>
                                                        <span class="myblue weight-500 uppercase-font txt-light block">Department</span>
                                                    </div>
                                                    <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                        <i class="myred zmdi zmdi-file txt-light data-right-rep-icon"></i>
                                                    </div>
                                                </div>	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="panel panel-default card-view pa-0">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body pa-0">
                                            <div class="sm-data-box dash_bg">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                            <span class="myblue txt-light block counter"><span class="counter-anim">{{$job_category}}</span></span>
                                                            <span class="myblue weight-500 uppercase-font txt-light block">Job Category</span>
                                                        </div>
                                                        <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                            <i class="myred zmdi zmdi-file txt-light data-right-rep-icon"></i>
                                                        </div>
                                                    </div>	
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                         </div>
                         <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                                <div class="panel panel-default card-view pa-0">
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body pa-0">
                                            <div class="sm-data-box dash_bg">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                            <span class="myblue txt-light block counter"><span class="counter-anim">{{$designation}}</span></span>
                                                            <span class="myblue weight-500 uppercase-font txt-light block">Position</span>
                                                        </div>
                                                        <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                            <i class="myred zmdi zmdi-file txt-light data-right-rep-icon"></i>
                                                        </div>
                                                    </div>	
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- /Row -->
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                            <input autocomplete="off" class="form-control" id="new_date" name="new_date" value="" placeholder="Select a date" />
                        <br/>
                        </div>
                    </div>
                    <div id="page" class="row">
                    
    
                        <div class="col-lg-4 col-md-6 col-sm-7 col-xs-12">
                            <div class="panel panel-default card-view panel-refresh relative">
                                <div class="refresh-container">
                                    <div class="la-anim-1"></div>
                                </div>
                               
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <div id="temporary-monthly"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-lg-4 col-md-6 col-sm-7 col-xs-12">
                            <div class="panel panel-default card-view panel-refresh relative">
                                <div class="refresh-container">
                                    <div class="la-anim-1"></div>
                                </div>
                               
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <div id="casual-monthly"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
    
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-7 col-xs-12">
                                <div class="panel panel-default card-view panel-refresh relative">
                                    <div class="refresh-container">
                                        <div class="la-anim-1"></div>
                                    </div>
                                   
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div id="temporary"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-7 col-xs-12">
                                <div class="panel panel-default card-view panel-refresh relative">
                                    <div class="refresh-container">
                                        <div class="la-anim-1"></div>
                                    </div>
                                   
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div id="casual"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                    </div>
                    
                        

                        
                        
                    </div>
                    
                   
                </div>
                
                <!-- Footer -->
	  <footer class="footer container-fluid pl-30 pr-30">
		<div class="row">
			<div class="col-sm-12">
				<p>@php
					echo date('Y');
				@endphp &copy; Dangote Nassarawa Sugar Company Limited BIP</p>
			</div>
		</div>
    </footer>
    
    <script src="{{asset('highcharts/modules//highcharts.js')}}"></script>
    <script src="{{asset('highcharts/modules/exporting.js')}}"></script>
    <script src="{{asset('highcharts/modules/export-data.js')}}"></script>
    <script src="{{asset('highcharts/modules//highcharts-3d.js')}}"></script>

    <script>
 $(document).ready(function(){
   // Create the chart
        Highcharts.chart('temporary', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Temporary Overtime for {{$graph_date}}'
            },
            subtitle: {
                text: 'The barchart below shows the overtime on each department for {{$graph_date}}'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category',
                title: {
                    text: 'Department'
                }
            },
            yAxis: {
                title: {
                    text: 'Overtime Hours'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:1f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:1f}</b> of total<br/>'
            },

            series: [
                {
                    name: "Overtime Hours",
                    colorByPoint: true,
                    data: [
                        @foreach( $temporary_ot as $to)
                            {
                                name: "{{$to->department_name}}",
                                y: {{$to->overtime==""?0:$to->overtime}},
                                drilldown: null
                            },
                        @endforeach
                    ]
                }
            ]
            
        });

        Highcharts.chart('casual', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Casual Overtime for {{$graph_date}}'
            },
            subtitle: {
                text: 'The barchart below shows the overtime on each department for {{$graph_date}}'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category',
                title: {
                    text: 'Department'
                }
                
            },
            yAxis: {
                title: {
                    text: 'Overtime Hours'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:1f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:1f}</b> of total<br/>'
            },

            series: [
                {
                    name: "Overtime Hours",
                    colorByPoint: true,
                    data: [
                        @foreach( $casual_ot as $to)
                            {
                                name: "{{$to->department_name}}",
                                y: {{$to->overtime==""?0:$to->overtime}},
                                drilldown: null
                            },
                        @endforeach
                    ]
                }
            ]
            
        });

        Highcharts.chart('casual-monthly', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Casual staff monthly Net Salary for {{$graph_date}}'
            },
            subtitle: {
                text: 'The barchart below shows the monthly Net Salary on each department for {{$graph_date}}'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category',
                title: {
                    text: 'Department'
                }
            },
            yAxis: {
                title: {
                    text: 'Salary'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                       
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:1f}</b> of total<br/>'
            },

            series: [
                {
                    name: "Salary",
                    colorByPoint: true,
                    data: [
                        @foreach( $casual_monthly_net as $to)
                            {
                                name: "{{$to->department_name}}",
                                y: {{$to->monthly_net==""?0:$to->monthly_net}},
                                drilldown: null
                            },
                        @endforeach
                    ]
                }
            ]
            
        });


        Highcharts.chart('temporary-monthly', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Temporary staff monthly Net Salary for {{$graph_date}}'
            },
            subtitle: {
                text: 'The barchart below shows the monthly net salary on each department for {{$graph_date}}'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category',
                title: {
                    text: 'Department'
                }
            },
            yAxis: {
                title: {
                    text: 'Salary'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:1f}</b> of total<br/>'
            },

            series: [
                {
                    name: "Salary",
                    colorByPoint: true,
                    data: [
                        @foreach( $temporary_monthly_net as $to)
                            {
                                name: "{{$to->department_name}}",
                                y: {{$to->monthly_net==""?0:$to->monthly_net}},
                                drilldown: null
                            },
                        @endforeach
                    ]
                }
            ]
            
        });

});


$( document ).ready(function() {
    var SITEURL = '{{URL::to('')}}';
    var myCalendar;
       myCalendar = new dhtmlXCalendarObject(["new_date"]);
       myCalendar.showWeekNumbers();
      // myCalendar.hideWeekNumbers();
      
      

       $.ajaxSetup({
               headers: {
                   'X-CSRF-TOKEN': $('meta2[name="csrf-token"]').attr('content')
               }
           });

          myCalendar.attachEvent("onClick", function(date){
         
            
                
                  window.location = SITEURL + "/dashboard?date="+ $('#new_date').val();
        
             });


           });
    </script>


                
@endsection         