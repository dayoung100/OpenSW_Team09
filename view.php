<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">

    <title>expenditure</title>
    <link rel="shortcut icon" type="image/x-icon" href="SO.png">
   <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
  </head>
  <body>

    <?php
    $mysqli=mysqli_connect("localhost","root","","testing");
    if(mysqli_connect_errno()){
      printf("Connect failed: %s\n", mysqli_connect_errno());
      exit();
    }

    else{
      $sql="select title, content
      from account
      where MONTH(start)='12'";

      $res=mysqli_query($mysqli,$sql);

      if($res){
      while ($row=mysqli_fetch_array($res)){
        echo $row[0]." ".$row[1];
      }
      echo $row[0]." ".$row[1];
    }
    else{
      printf("Could not select rows: %s\n", mysqli_error($mysqli));
    }

    mysqli_close($mysqli);
    }

     ?>

  </body>
</html>
