@extends('layoutes.master')

@section('MyContent')
<div class="genarle-report">
    <div class="row">

        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 animation">
            <div class="content-r">
                <i class="fa fa-level-down"></i>
                <span>المشتريات</span>
                <hr>
                <span class="count"> {{$buys_price}} SD</span>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 animation">
            <div class="content-r">
                <i class="fa fa-male"></i>
                <span>الويتر</span>
                <hr>
                <span class="count">{{$weaters_count}}</span>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 animation">
            <div class="content-r">
                <i class="fa fa-truck">
                    <p class="span animation2"></p>
                    <p class="span2 animation2"></p>
                </i>
                <span>الموردين</span>
                <hr>
                <span class="count">{{$suppliers_count}}</span>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 animation">
            <div class="content-r">
                <i class="fa fa-level-up"></i>
                <span>المبيعات</span>
                <hr>
                <span class="count">{{$sales_count}}</span>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 animation">
            <div class="content-r">
                <i class="fa fa-list-ul"></i>
                <span>الأصناف</span>
                <hr>
                <span class="count">{{$types_count}}</span>
            </div>
        </div>

        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 animation">
            <div class="content-r">
                <i class="fa fa-money"></i>
                <span>رصيدالخذنة</span>
                <hr>
                <span class="count"> {{$resets_price }} SD</span>
            </div>

        </div>
    </div>
    <div class="order-report">
        {{-- نسبه الطلبات --}}


    </div>


    <!--Load the AJAX API-->
    <script type="text/javascript" src="./charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          ['Mushrooms', 3],
          ['Onions', 1],
          ['Olives', 1],
          ['Zucchini', 1],
          ['Pepperoni', 2]
        ]);

        // Set chart options
        var options = {'title':'How Much Pizza I Ate Last Night',
                       'width':400,
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
</div>
@endsection
