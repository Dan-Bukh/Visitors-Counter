<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stats</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawMultSeries);

        function drawMultSeries() {
            var data = google.visualization.arrayToDataTable([
                ['Hour', 'Посетители'],
                @for($i = 1; $i < 23; $i++) 
                    ["{{$array[$i][0]}}:00", {{$array[$i][1] ?? 0}}],
                @endfor
            ]);
            var options = {
                title: 'Количество посетителей за день',
                chartArea: {width: '50%'},
                hAxis: {
                title: 'Посетители',
                minValue: 0
                },
                vAxis: {
                title: 'Часы'
                }
            };
            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
            @for($i = 0; $i < count($array2[0]); $i++) 
                    ["{{$array2[0][$i]}}", {{$array2[1][$array2[0][$i]]}}],
            @endfor
        ]);
        var options = {
          title: 'Статистика посетителей по городам'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <a class="btn btn-sm btn-outline-primary mx-3 mt-3" href="{{ route('home') }}">Вернуться на главную</a>
    <p class="text-center text-muted mt-1">Время может отличаться из-за смены часовых поясов</p>
    <div class="row">
        <div class="col-sm-12 col-md-7">
            <div id="chart_div" style="width: 800px; height: 500px;"></div>
        </div>
        <div class="col-sm-12 col-md-5">
        <div id="piechart" style="width: 500px; height: 500px;"></div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>