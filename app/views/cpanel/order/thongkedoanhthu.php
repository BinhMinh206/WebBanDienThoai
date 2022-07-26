<html>

<head>

</head>

<body>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Tháng', ''],
                <?php
                foreach ($doanhthu as $key) {
                    echo "['" . $key['thang'] . "'," . $key['tongban'] . "],";
                }
                ?>
            ]);

            var options = {
                chart: {
                    title: 'Thống kê doanh thu',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>
    <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
</body>

</html>