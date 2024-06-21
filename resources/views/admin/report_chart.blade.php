<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['ห้องเรียน', 'จำนวน'],
            @foreach ($chart_1 as $key => $for)
                ['{{ $for->room_name }} (ชั้น {{ $for->room_floor }})', {{ $count_chart_1[$key] }}],
            @endforeach
        ]);

        var options = {
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_1'));
        chart.draw(data, options);
    }
</script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['ประเภทผู้ประเมิน', 'จำนวน'],
            @for ($i = 0; $i < 2; $i++)
                @if ($i == 0)
                    @php($user = 'นักศึกษา')
                @else
                    @php($user = 'อาจารย์')
                @endif
                ['{{ $user }}', {{ $count_chart_2[$i] }}],
            @endfor
        ]);

        var options = {
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_2'));
        chart.draw(data, options);
    }
</script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['ห้องเรียน', 'จำนวน'],
            @foreach ($chart_1 as $key => $for)
                ['{{ $for->room_name }} (ชั้น {{ $for->room_floor }})', {{ $count_chart_3[$key] }}],
            @endforeach
        ]);

        var options = {
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('chart_3'));
        chart.draw(data, options);
    }
</script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['ห้องเรียน', 'น้อยที่สุด', 'น้อย', 'ปานกลาง', 'มาก', 'มากที่สุด'],
            @foreach ($chart_1 as $key => $for)
                ['{{ $for->room_name }} (ชั้น {{ $for->room_floor }})', {{ $count_chart_4_1[$key] }}, {{ $count_chart_4_2[$key] }},
                    {{ $count_chart_4_3[$key] }}, {{ $count_chart_4_4[$key] }}, {{ $count_chart_4_5[$key] }}
                ],
            @endforeach
        ]);

        var options = {
            chart: {
            }
        };

        var chart = new google.charts.Bar(document.getElementById('chart_4'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>
