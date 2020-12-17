<?php
require_once('connect.php');


$sql1 = "SELECT month(start), sum(title) FROM account GROUP BY MONTH(start)";
$req1 = $bdd->prepare($sql1);
$req1 ->execute();

$events1 = $req1->fetchAll();

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Calendar</title>
  <meta charset="UTF-8">
   <title>Weather app -javascript</title>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account</title>
  <link rel="shortcut icon" type="image/x-icon" href="SO.png">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


   <link rel="stylesheet" href="weatherstyle.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
	google.charts.load('current', {packages: ['corechart', 'line']});
    google.charts.setOnLoadCallback(drawLineColors);

    function drawLineColors() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', '월');

      <?php foreach($events1 as $event):
					$month = $event['month(start)'];
					$cost = $event['sum(title)'];
			?>

      data.addRows([
        [<?php echo $month; ?>, <?php echo $cost; ?>]
      ]);

      <?php endforeach; ?>

      var options = {
        title: '월별 지출',
        colors: ['#097138']
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }

  </script>
 </head>
 <body>

 <div id="chart_div" style="width:500px;height:300px;"></div>

 </body>
</html>
