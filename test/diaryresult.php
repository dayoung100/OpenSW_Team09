<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>diaryresult</title>
  </head>
  <body>
    <?php
    $title=$_POST['title'];
    $condition=$_POST['condition'];
    $weight=$_POST['weight'];
    $content=$_POST['content'];
    $date = date('Y-m-d');
    $count=1;

    $mysqli=mysqli_connect("localhost","team09","team09","team09");
    if(mysqli_connect_errno()){
      printf("Connect failed: %s\n", mysqli_connect_errno());
      exit();
    }

    else{
      $sql="insert into logs
      values('$count','$title','$date','$content','1')";

      $res=mysqli_query($mysqli,$sql);
      if ($res === TRUE ) {
          echo "<script>alert(\"diary가 입력되었습니다.\");</script>";
      } else {
          printf("<p>Could not insert record: %s\n</p>",mysqli_error($mysqli));
        }
    }

    mysqli_close($mysqli);


    ?>
    <fieldset style="width:100">
      <legend>DIARY</legend>

      제목: <input type="text" name="title" size="30"required/><br><br>
      기분: <select name="condition">
        <option value="좋음">좋음</option>
        <option value="보통">보통</option>
        <option value="좋지않음">좋지않음</option>
      </select>

      체중: <input type="text" name="weight" size="10"><br><br>
      내용<br>
      <textarea name="content" rows="8" style="width:100%; height:300px">
        <?php $ccontent ?>
      </textarea><br>
      <input type="reset" value="reset">
    </fieldset>
  </body>
</html>
