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
		
		$('#calendar').fullCalendar({
			header: {
				left:'prev,next',
                //center:'title',
                right: 'listDay, listWeek, month'
			},

			views: {
                //to do list 외에는 그냥 버튼, 나중에 php파일과 연결하던가 해야함
				listDay: { buttonText: 'To do list' },
                listWeek: { buttonText: 'Diary' },
                month: { buttonText: 'Account' }
			},

			defaultView: 'listDay',
            //일단 날짜 고정으로 해뒀는데 js 와 연결...해봐야
			defaultDate: '2020-12-10',
			navLinks: true,
			editable: true,
			eventLimit: true,
			//임의로 추가, 나중에 db와 연결해서 가져와야
            //json?
            events: [
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
			]
		});
		
	});

  </script>
    </head>
    <style>

  body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
 <body>
     <br />
  <div class="container">
      <div id="selected_day"></div>
      
   <div id="calendar"></div>
      <!--search-->
      <div class = "input-group">
        <div class = "input-group-text" id="basic-addon1">
         <span class = "search"></span>
         </div>
         <!--search input-->
         <input autofocus placeholder="search" class="form-control" type="text" autocomplete="off" name="search" id="search"/>
      </div>
       
  </div>
     
     <ul class="list-group" id="list"></ul>
     <!--JS file-->
     <script src="./todo.js"></script>
     
 </body>
</html>