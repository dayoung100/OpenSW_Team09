<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Account</title>
   <link rel="stylesheet" href="accountstyle.css">
</head>  
<script>

function addrow(){

 var row;
 row=document.all["addtable"].insertRow();
 
 var content1=row.insertCell();
 content1.innerHTML="<input type='text' id='row_id1' name='row_id1' value=''/>";

 var content2=row.insertCell();
 content2.innerHTML="<input type='text' id='row_id2' name='row_id1' value=''/>";




}
</script>


<body>

<input type="submit" name="btn1" value="TO DO LIST">&nbsp&nbsp&nbsp&nbsp
<input type="submit" name="btn2" value="DIARY">&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="submit" name="btn3" value="ACCOUNT"><pre></pre>
<div>
<div class="box">ACCOUNT</div><button>🔎</button><input type="text"placeholder=""></div>
</div>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 20px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 20px;word-break:normal;}
.tg .tg-73a0{border-color:inherit;font-size:12px;text-align:center;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
</style>
<table class="tg" width="500">
<thead>
  <tr>
    <th class="tg-73a0">내역</th>
    <th class="tg-0pky">비용</th>
  </tr>
</thead>

  <tr>
    <td class="tg-0pky"><input type="button" name="plus" value="+" onclick="addrow()"></td>
    <td class="tg-0pky"></td>
  
  </tr>
<tbody id="addtable">
</tbody>
</table>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Account</title>
   <link rel="stylesheet" href="accountstyle.css">
</head>  
<script>

function addrow(){

 var row;
 row=document.all["addtable"].insertRow();
 
 var content1=row.insertCell();
 content1.innerHTML="<input type='text' id='row_id1' name='row_id1' value=''/>";

 var content2=row.insertCell();
 content2.innerHTML="<input type='text' id='row_id2' name='row_id1' value=''/>";




}
</script>


<body>

<input type="submit" name="btn1" value="TO DO LIST">&nbsp&nbsp&nbsp&nbsp
<input type="submit" name="btn2" value="DIARY">&nbsp&nbsp&nbsp&nbsp&nbsp
<input type="submit" name="btn3" value="ACCOUNT"><pre></pre>
<div>
<div class="box">ACCOUNT</div><button>🔎</button><input type="text"placeholder=""></div>
</div>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 20px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 20px;word-break:normal;}
.tg .tg-73a0{border-color:inherit;font-size:12px;text-align:center;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
</style>
<table class="tg" width="500">
<thead>
  <tr>
    <th class="tg-73a0">내역</th>
    <th class="tg-0pky">비용</th>
  </tr>
</thead>

  <tr>
    <td class="tg-0pky"><input type="button" name="plus" value="+" onclick="addrow()"></td>
    <td class="tg-0pky"></td>
  
  </tr>
<tbody id="addtable">
</tbody>
</table>
 <input type="submit" value="저장하기">
<input type="submit" name="btn4" value="GRAPH"><pre></pre>


</body>
</html>
<input type="submit" name="btn4" value="GRAPH"><pre></pre>


</body>
</html>