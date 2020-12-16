<!--php: db연결 - 필요x
<?php
    $connect = mysqli_connect("localhost", "test09", "test09", "test09");
    if(!$connect)
        die("DB 접속 실패: ".mysql_error());
    //$db_selected = mysql_select_db("test09", $connect);
    //if(!$db_selected)
      //  die("DB 접속 실패: ".mysql_error());

    $sql = "select * from todo;";
    $result = mysqli_query($connect, $sql);
?>-->

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="todo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">      
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>

    $(document).ready(function() {
		

		var calendar = $('#calendar').fullCalendar({
			header: {
				left:'prev,next',
                center:'title',
                //right: 'listDay, listWeek, month'
			},

			/*views: {
                //to do list 외에는 그냥 버튼, 나중에 php파일과 연결하던가 해야함
				listDay: { buttonText: 'To do list' },
                listWeek: { buttonText: 'Diary' },
                month: { buttonText: 'Account' }
			},*/

			defaultView: 'listDay',
            //날짜 오늘 날짜 받아옴
			defaultDate: new Date(),
			navLinks: true,
			editable: false,
			eventLimit: true,
			//php와 연결
            events: 'load.php',
            //events:
            /*[
				{
					title: 'All Day Event',
					start: '2020-12-10'
				},
				{
					title: 'Long Event',
					start: '2020-12-10',
					end: '2020-12-11'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2020-12-10T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2017-05-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2020-12-2',
					end: '2020-12-10'
				},
				{
					title: 'Meeting',
					start: '2020-12-10T10:30:00',
					end: '2020-12-10T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2020-12-10T12:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2017-05-28'
				}
			]*/
		});
		
	});

  </script>
    </head>
    <style>
</style>
 <body>
     <br />
     
     <!--<h2>mysql 테스트</h2> - db에서 받아오기 테스트, 필요x
     <?php
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            echo "번호 ".$row['idTodo']."<br>";
        }
    }else{
        echo "none";
    }
    mysqli_close($connect);   
?>-->
      
     
  <div class="container">    
      <div id="selected_day"></div> 
      <!--search-->
      <div class = "input-group">
        <div class = "input-group-text" id="basic-addon1">
         <span class = "search"></span>
         </div>
         <!--search input-->
         <input autofocus placeholder="search" class="form-control" type="text" autocomplete="off" name="search" id="search"/>
      </div>
      <ul class="list-group" id="list"></ul>
      <div id="calendar"></div>  
  </div>
     
     
     
     <!--JS file-->    
     <script src="./todo.js"></script>
     
 </body>
</html>