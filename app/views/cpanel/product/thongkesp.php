<html>

<head>
    <form action="<?php echo BASE_URL ?>/product/thongkesp" method="POST">
        <label for="month">Chọn tháng:</label>
        <select name="month">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
        <button type="submit" value="Lọc">Lọc</button>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['title_product', 'tongban'],
                    <?php
                    foreach ($product as $key) {
                        echo "['" . $key['title_product'] . "'," . $key['tongban'] . "],";
                    }
                    ?>
                ]);

                var options = {
                    title: "Thống kê sản phẩm bán chạy tháng <?php echo $_POST['month'] ?>",
                };

                var chart = new google.visualization.PieChart(
                    document.getElementById("piechart")
                );

                chart.draw(data, options);
            }
        </script>
    </form>
</head>

<body>
    <div id="piechart" style="width: 900px; height: 500px"></div>
</body>

</html>