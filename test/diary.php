<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>log</title>
  </head>
  <body>
    <h2><?php $date = date('Y-m-d');
    echo "$date" ?></h2>

    <form action="diaryresult.php" name="diary" method="GET">
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
        <textarea name="content" rows="8" style="width:100%; height:300px">내용을 입력하세요
        </textarea><br>
        <input type="submit" value="submit">
        <input type="reset" value="reset">
      </fieldset>
    </form>

  </body>
</html>
