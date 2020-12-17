<?php

require_once('connect.php');

/*$money = array();
$sql1 = "SELECT id, title, start, end, content FROM account";
$req1 = $bdd->prepare($sql1);
$req1 ->execute();

$events1 = $req1->fetchAll();*/

/*$sql2 = "SELECT id, title, start, end, content FROM diary";
$req2 = $bdd->prepare($sql2);
$req2 ->execute();

$events2 = $req2->fetchAll();*/

$event = array();
$sql3 = "SELECT id, title, start, end, content FROM todolist";
$req3 = $bdd->prepare($sql3);
$req3 ->execute();

$events3 = $req3->fetchAll();

/*foreach($events1 as $row){
    $money[] = array(
    'id' =>$row["id"],
    'price'=>$row["title"],
    'start'=>$row["start"],
    'end'=>$row["end"],
    'content'=>$row["content"]);
}*/


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
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
      <title>Account</title>
    <link rel="shortcut icon" type="image/x-icon" href="SO.png">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
   
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

      <link rel="stylesheet" href="weatherstyle.css">
      
    <style>
        body {
                background-color: #effad3;
                font-family: 'Open Sans', Arial, Helvetica, sans-serif;
                padding: 10px 20px;
            }
        
        #visual{ 
            margin: 15px auto; 
            text-align: left;
            padding: 10px 30px;
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
        #app{
            left:50px;
            top:20px;
            width:350px;
            height:200px;
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
      
      <!--시각화-->
      <div id = "visual">
          <h2>Graph</h2>
         <div id="app">
            <div >	  
                <p class="my-header">오늘 총 지출금액: {{expense}}  </p>
                <p>
                  소득: <input type="text" v-model.number="income" v-on:keyup.enter="fixIncome" placeholder="50000">
                  <button v-on:click="fixIncome">입력</button> 
                </p>
                <p>
                  지출: <input type="text" v-model.trim="addText" placeholder="내용" id="cont">
                  <input type="text" v-model.number="addPrice" v-on:keyup.enter="addList" placeholder="금액">
                  <button v-on:click="addList">입력</button><button v-on:click="deleteAll">초기화</button>
                 </p>
            </div>
            <div id="array" v-for="(item, index) in myArray" >
                <ul>
                    <li><b>항목</b>: {{item.content}} <b>금액</b>:{{item.price}}
                    <button v-on:click="removeList(index)">삭제</button></li>
                </ul>
            </div>


           <div id="barchart_material" style="width:200px; height: 300px;"></div>

        </div>
          <div style="left:10px;bottom:0px;">
     <div id="chart_div" style="width:360px;height:150px;"></div></div>
   
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      </div>
      
      <!--날씨
      <div id = "weather">
          <div class="weather-container">
	    
	      <link rel="stylesheet" href="Rimouski.css">
	     <div class="weather-icon"><img id="wicon" src="unknown.png" alt="weather icon" width="80" height="80"></div>
		 <div class="temperature-value"><p>-°<span>C</span></p></div>
		 <div class="1">
		 <span class="temperature-description"><p> -</p></span>
		 <span class="specification"><p></p></span>
		 </div>
		  <div class="location"><p>-</p></div>
	 </div>
	 <script src="weatherapp.js"></script>
      </div>-->
      
      
      
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
      <script type="text/javascript">
   //-----graph js code-----
     //여기부터 그래프

        //bar그래프 데이터 저장
        var orgdata = [

            ['', '수입', '지출', '이윤']
        ];
		
		//line 그래프 데이터 저장
		//var ammout=['날짜','지난달','이번달'];

        
		//bar그래프 차트함수

        google.charts.load('current', { 'packages': ['bar'] });
        google.charts.setOnLoadCallback(drawChart);
		
          
		function drawChart() {
            var data = google.visualization.arrayToDataTable(orgdata);

            var options = {
                chart: {
                    title: '오늘 총 가계부',
                    subtitle: '수입/지출/이윤'
                },
                bars: 'horizontal', // Required for Material Bar Charts.
                width: 350,
                height: 200  
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
          
          /*function today_account(){
            var accounts = <?php echo json_encode($money)?>;
            var today = new Date();
              setList(accounts.filter(account => {
                    return account.start===today;
          }));*/
       
          
        var app = new Vue({
            el: '#app',
            data: {
                totalPrice: 0,
                addText:'',
                addPrice:0,
                myArray:[
                    
                ],
                chartArray:orgdata,
				income: 20000,

            },
			
            computed:{
                expense: function(){
                    var s = 0;
                    for(var i=0; i<this.myArray.length; i++){
                        s += this.myArray[i].price;
						
                    }
					
                    return s;
                },
                profit: function(){
                    return this.income-this.expense;
                }
            },
            methods:{
                addList: function(){
                    if(isNaN(this.addPrice)){
                        alert("숫자를 입력하세요.");
                        return;
                    }
                    this.myArray.push({content:this.addText, price:this.addPrice});
                    this.addText = '';
                    this.addPrice = 0;
                    document.getElementById('cont').focus();

                    this.chartRefresh();
                    
                },
                removeList: function(idx){
                    this.myArray.splice(idx,1);
                },
                fixIncome: function(){
                    this.chartRefresh();
                },
                deleteAll:function(){
				
				 
				this.myArray.splice(0);
				
				},
                chartRefresh: function(){
                    //초기화
                     this.chartArray.splice(1,1);
					 
                    //차트 그리기
                    var ch = ['Today',this.income, this.expense, this.profit];
					
                    this.chartArray.push(ch);
					
                    drawChart();
					
                   document.getElementById('barchart_material').style.display = "block";
					// document.getElementById('chart_div').style.display = "block";
					
                }
            }
        })
  </script>

  </body>
</html>