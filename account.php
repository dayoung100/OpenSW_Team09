<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="shortcut icon" type="image/x-icon" href="SO.png">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
   
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
    <div id="app">
        <p class="my-header">오늘 총 지출금액: {{expense}}  </p>
        <p>
            소득: <input type="text" v-model.number="income" v-on:keyup.enter="fixIncome" placeholder="50000">
            <button v-on:click="fixIncome">입력</button>
        </p>
        <p>
            지출: <input type="text" v-model.trim="addText" placeholder="내용" id="cont">
            <input type="text" v-model.number="addPrice" v-on:keyup.enter="addList" placeholder="금액">
            <button v-on:click="addList">입력</button>
        </p>
        <hr>
        <div id="array" v-for="(item, index) in myArray">
            <ul>
                <li><b>항목</b>: {{item.content}} <b>금액</b>:{{item.price}}
                <button v-on:click="removeList(index)">삭제</button></li>
            </ul>
        </div>
    </div>
	

    <hr>
	 
	 <div id="accountshow1">
       <div id="barchart_material" style="width: 700px; height: 300px;"></div></div>
     <div id="accountshow2"> 
	   <div id="chart_div" style="width:700px;height:300px;"></div></div>
   
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
   
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
                width: 700,
                height: 200  
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
       
        var app = new Vue({
            el: '#app',
            data: {
                totalPrice: 0,
                addText:'',
                addPrice:0,
                myArray:[
                    {
                        "content":"해먹",
                        "price":40000
                    },
                    {
                        "content":"털빗",
                        "price":9000
                    },
                    {
                        "content":"캣닢",
                        "price":13500
                    },
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
		/* 꺾은선그래프
		 var app2 = new Vue({
            el: '#app2',
            data: {
                totalPrice: 0,
                addText:'',
                addPrice:0,
                myArray:[
                    {
                        "content":"해먹",
                        "price":40000
                    },
                    {
                        "content":"털빗",
                        "price":9000
                    },
                    {
                        "content":"캣닢",
                        "price":13500
                    },
                ],
                chartArray:ammout,
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
                chartRefresh: function(){
                    //초기화
                     this.chartArray.splice(1,1);
					
                    //차트 그리기
                    
					var ch=[17,5000,this.expense];
                    this.chartArray.push(ch);
					
                    drawLineColors()
					//document.getElementById('chart_div').style.display = "block";
					
                }
            }
        })
		
		
		/*꺾은선그래프    
	google.charts.load('current', {packages: ['corechart', 'line']});
    google.charts.setOnLoadCallback(drawLineColors);

    function drawLineColors() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'X');
      data.addColumn('number', '지난달');
      data.addColumn('number', '이번달');

      data.addRows([
        [0, 0, 1000],    [1, 1000, 0],   [2, 2300, 0],  [3, 1700, 0],   [4, 1800, 0],  [5, 9000,0],
        [6, 10001, 0],   [7, 27000, 0],  [8, 33000, 0],  [9, 40000, 0],  [10, 32000, 0], [11, 35000,0],
        [12, 30000,0], [13, 40000,0], [14, 42000, 0], [15, 47000,0], [16, 50000,0], [17, 48000, 62500],
        [18, 5200, 0], [19, 5400,0], [20, 4200, 0], [21, 5500, 0], [22, 5600, 0], [23, 5700, 0],
        [24, 6000,0], [25, 5000, 0], [26, 5200, 0], [27, 5100, 0], [28, 4900, 0], [29, 5300,0],
        [30, 5500, 0], [31, 6000, 0]
      ]);

      var options = {
        title: '지난달 대비 이번달 지출',
        colors: ['#999999', '#097138']
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }
	*/

    </script>

</body>
</html>
