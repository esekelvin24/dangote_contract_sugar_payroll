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

  
 <script>
     <script src="{{asset("highcharts/highcharts.js")}}"></script>
    <script src="{{asset("highcharts/modules/exporting.js")}}"></script>
    <script src="{{asset("highcharts/modules/export-data.js")}}"></script>
    <script src="{{asset("highcharts/highcharts-3d.js")}}"></script>
 $(document).ready(function(){
   // Create the chart
        Highcharts.chart('temporary', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Temporary Overtime for January, 2020'
            },
            subtitle: {
                text: 'The barchart below shows the overtime on each department for January, 2020'
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
                                y: {{$to->overtime}},
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
                text: 'Casual Overtime for January, 2020'
            },
            subtitle: {
                text: 'The barchart below shows the overtime on each department for January, 2020'
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
                                y: {{$to->overtime}},
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
                text: 'Casual staff monthly Net Salary for January, 2020'
            },
            subtitle: {
                text: 'The barchart below shows the monthly Net Salary on each department for January, 2020'
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
                                y: {{$to->monthly_net}},
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
                text: 'Temporary staff monthly Net Salary for January, 2020'
            },
            subtitle: {
                text: 'The barchart below shows the monthly net salary on each department for January, 2020'
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
                                y: {{$to->monthly_net}},
                                drilldown: null
                            },
                        @endforeach
                    ]
                }
            ]
            
        });

});
    </script>