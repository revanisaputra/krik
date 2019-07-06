<html>
<head>
  <!--Load the AJAX API-->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

  //Visualisasi 1------------------------------------------------------------------------------------------1
  var PieChartData = ' <?php echo $PieChartData; ?>';
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows(JSON.parse(PieChartData));

        // Set chart options
        var options = {'title':'<?php echo $PieChartTitle; ?>',
        'width':0,
        'height':0};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('1'));
        chart.draw(data, options);

  //Visualisasi 2------------------------------------------------------------------------------------------2
  var PieChartData2 = ' <?php echo $PieChartData2; ?>';
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows(JSON.parse(PieChartData2));

        // Set chart options
        var options = {'title':'<?php echo $PieChartTitle2; ?>',
        'width':0,
        'height':0};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('2'));
        chart.draw(data, options);

  //Visualisasi 3------------------------------------------------------------------------------------------3
  var ColumnChartData='<?php echo $BarChartData; ?>';
  var column_data = google.visualization.arrayToDataTable(JSON.parse(ColumnChartData));

  var column_options = {
    title: '<?php echo $BarChartTitle; ?>',
    legend: { position: 'bottom' }
  };

  var column_chart = new google.visualization.ColumnChart(document.getElementById('3'));
  column_chart.draw(column_data, column_options);

  //Visualisasi 3------------------------------------------------------------------------------------------4
  var ColumnChartData7='<?php echo $BarChartData7; ?>';
  var column_data7 = google.visualization.arrayToDataTable(JSON.parse(ColumnChartData7));

  var column_options7 = {
    title: '<?php echo $BarChartTitle7; ?>',
    legend: { position: 'bottom' }
  };

  var column_chart7 = new google.visualization.ColumnChart(document.getElementById('4'));
  column_chart7.draw(column_data7, column_options7);

  //Visualisasi 5------------------------------------------------------------------------------------------5
  var AkhirChartData='<?php echo $AkhirChartData; ?>';
  var akhir_data = google.visualization.arrayToDataTable(JSON.parse(AkhirChartData));

  var akhir_options = {
    title: '<?php echo $AkhirChartTitle ?>',
    legend: { position: 'center' }
  };

  var akhir_chart = new google.visualization.LineChart(document.getElementById('5'));
  akhir_chart.draw(akhir_data, akhir_options);

}
</script>
</head>
<body>

 <center><h2>Visualisai Pengelolan Darah pada Kota Magelang</h2></center>
 <table border="0">
  <tr>
    <td width="900px"><div id="1"></div></td>
    <td width="900px"><div id="2"></div></td>
  </tr>
  <tr>
    <td width="900px"><div id="3"></div></td>
    <td width="900px"><div id="4"></div></td>
  </tr>
  <tr>
    <td width="900px" colspan="2"><div id="5"></div></td>
  </tr>
</table>
</body>
</html>