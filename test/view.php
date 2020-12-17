<?php
require_once('connect.php');


$sql1 = "SELECT month(start), sum(title) FROM account GROUP BY MONTH(start)";
$req1 = $bdd->prepare($sql1);
$req1 ->execute();

$events1 = $req1->fetchAll();

//-----search-----
$event = array();
$sql3 = "SELECT id, title, start, end, content FROM todolist";
$req3 = $bdd->prepare($sql3);
$req3 ->execute();

$events3 = $req3->fetchAll();

foreach($events3 as $row){
    $event[] = array(
    'id' =>$row["id"],
    'title'=>$row["title"],
    'start'=>$row["start"],
    'end'=>$row["end"],
    'content'=>$row["content"]);
}


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
      <style>
        body {
                font-family: 'Open Sans', Arial, Helvetica, sans-serif;
                padding: 10px 20px;
            }        
        #search{
            background: #a8dda8; 
            margin: 15px auto; 
            text-align: left;
            padding: 10px 30px;
        }
        #list li{
            padding: 5px 0px 5px 5px;
            margin-bottom: 5px;
            border-bottom: 1px solid #32b871;
            font-size: 13px;
        }
      </style>
 </head>
 <body>
<!--서치-->
     <div id="chart_div" style="width:500px;height:300px;"></div>
      <div id="search">    
          <div id="title">
              <h2>Search Schedule</h2>
              </div> 
              <!--search-->
          <div class = "input-group">
            <div class = "input-group-text" id="basic-addon1">
             <span class = "search"></span>
             </div>
             <!--search input-->
             <input placeholder="search" class="form-control" type="text" autocomplete="off" name="search" id="search"/>
          </div>
          <ul class="list-group" id="list"></ul>
      </div>      
 

     <script>
         //-----search js code-----
         var events = <?php echo json_encode($event)?>;
         
         const list= document.getElementById('list');

        function setList(group){
            clearList();            
            for(const event of group){
                const item= document.createElement('li');
                item.classList.add('list-group-item');
                const st_date = formatDate(event.start);
                const en_date = formatDate(event.end);
                const text = document.createTextNode(event.title+"\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0start: "+st_date+"\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0\u00a0end: "+en_date);
                item.appendChild(text);
                list.appendChild(item);
            }
            if(group.length === 0){
                setNoResult();
            }
        }
         
         function formatDate(date) { 
             var d = new Date(date), 
                 month = '' + (d.getMonth() + 1), 
                 day = '' + d.getDate(), 
                 year = d.getFullYear(); 
             if (month.length < 2) 
                 month = '0' + month; 
             if (day.length < 2) 
                 day = '0' + day; 
             return [year, month, day].join('-'); 
         }
         

        function clearList(){
            while(list.hasChildNodes()){
                list.removeChild(list.firstChild);
            }
        }

        function setNoResult(){
            const item = document.createElement('li');
            item.classList.add('list-group-item');
            const text = document.createTextNode('No reults found');
            item.appendChild(text);
            list.appendChild(item);
        }

        function computeRelevancy(title, searchTerm){
            let value = title.trim().toLowerCase();
            if(value === searchTerm){
                return 2;
            }else if(value.startsWith(searchTerm)){
                return 1;
            }else if(value.includes(searchTerm)){
                return 0;
            }else{
                return -1;
            }
        }

        const searchInput = document.getElementById('search')
        searchInput.addEventListener('input', (event)=>{
            let value = event.target.value;
            if(value && value.trim().length > 0){
                value = value.trim().toLowerCase();
                setList(events.filter(event => {
                    return event.title.toLowerCase().includes(value);
                }).sort((event1, event2) => {
                    return computeRelevancy(event2.title, value) -computeRelevancy(event1.title, value);
                }));
            }else{
                clearList();
            }
        });
      </script>
 </body>
</html>
