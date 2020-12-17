<?php

require_once('connect.php');


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
    <style>
        body {
                background-color: #effad3;
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
        })
      </script>
      

  </body>
</html>