<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1.0">
  <title>Furum-audi</title>
  <link rel="stylesheet" href="css/standardize.css">
  <link rel="stylesheet" href="css/audi_page-grid.css">
  <link rel="stylesheet" href="css/audi_page.css">
  <link rel="icon" href="images/logo.ico" type="image/x-icon"> 
</head>
<body class="body audi_page clearfix">
  <div class="topic clearfix">
    <div class="embed-wrapper"><body>

<p><font size="16" color="White" face="Helvetica">

<script type="text/javascript">
var d = new Date();
document.write (d.toDateString());
</script>

<br>

<span id=tick2>
</span>

<script>
<!--

function show2(){
if (!document.all&&!document.getElementById)
return
thelement=document.getElementById? document.getElementById("tick2"): document.all.tick2
var Digital=new Date()
var hours=Digital.getHours()
var minutes=Digital.getMinutes()
var seconds=Digital.getSeconds()
var dn="PM"
if (hours<12)
dn="AM"
if (hours>12)
hours=hours-12
if (hours==0)
hours=12
if (minutes<=9)
minutes="0"+minutes
if (seconds<=9)
seconds="0"+seconds
var ctime=hours+":"+minutes+":"+seconds+" "+dn
thelement.innerHTML="<b style='font-size:16;color:white;'>"+ctime+"</b>"
setTimeout("show2()",1000)
}
window.onload=show2
//-->
</script>


</font>
</body>
</html></div>
    <button onClick="window.location='index.php';" class="_button">
      <p>Forum</p>
      <p><br></p>
      <p></p>
      <p></p>
    </button>
  </div>
  <div class="tems clearfix">
    <button onClick="window.location='index1.php';" class="audi">
      <p>Audi</p>
      <p></p>
      <p></p>
    </button>
    <button onClick="window.location='index2.php';" class="volvo">
      <p>Volvo</p>
      <p><br></p>
      <p></p>
    </button>
    <button onClick="window.location='index3.php';" class="volkswagen">
      <p>Volkswagen</p>
      <p><br></p>
    </button>
  </div>
  <div class="mainwind clearfix">
    <div id="in_.out.ent" class="embed-wrapper"><html>
<head>

</head>
<body>

<div id="chat">
        <?php include_once 'chat_audi.php' ?>
</div>

</body>
</html></div>
  </div>
</body>	