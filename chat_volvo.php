<?

$border="1";        //// - чтобы убрать рамку поменяйте значение 1 на 0
$colortime="White";  //// - цвет времени
$colornick="red";   //// - цвет ника
$bgcolor="Grey";   //// - цвет фона
$colormsg = Blue;  //// - цвет сообщений чата
$width="1435px";       //// - ширина окна чата
$height="750px";      //// - длина окна чата
$num="100"; 	    //// - Кол-во сообщений после которого произойдет полная очистка чата
$msg2="0";	    //// - 0 = показывать ссылки , 1 = удалять ссылки



$cook = $_COOKIE["chat_nick"]  ;
if($_POST)
{
	setcookie("chat_nick",$_POST["nick"]);
	header("Location: {$_SERVER['PHP_SELF']}"); 
	header("Location: {$_SERVER['HTTP_REFERER']}");   
}
?>
<script type="text/javascript"> 

function stopRKey(evt) { 
  var evt = (evt) ? evt : ((event) ? event : null); 
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
} 

document.onkeypress = stopRKey; 

</script>
<?
date_default_timezone_set( 'Europe/Moscow' );
$date=date("F j, Y, g:i a");
$file_msg = fopen("msg-volvo.db","a+");
$file_msg_read = file("msg-volvo.db");

$count=count($file_msg_read);
if ($count>$num)
{
for ($i=($count-$num); $i<$count; $i++)
 {
 $str = $str.$file_msg_read[$i];
 $str=ereg_replace("rn","n",$str);
 }
$fp=fopen("msg-volvo.db","w");
fwrite($fp,$str);
}

$revers_file=array_reverse($file_msg_read);

echo ("<table border='$border' cellspacing=0 cellpadding=0>
<tr bgcolor='$bgcolor'>
<td><div style ='width:$width; height:$height; overflow-y:scroll; word-wrap:break-word; word-break:break-all; white-space:pre-wrap;'>");


if(!$file_msg_read)
{
	echo("No message");
}
else
{
	for($i=0; $i < count($revers_file); $i++)
{
	printf("<font color='$colormsg'>%s", $revers_file[$i]);
}
}


echo("<tr><td><br>

<left><form name=formtext action=chat_volvo.php method=POST >
	<input type=text style=width:300px name=nick value=$cook ><br>
	<input type=text class=message name=msg  value=Message  onblur=if(this.value=='')this.value='Message' onfocus=if(this.value=='Message')this.value='' overflow-y:auto ><br>
</left>
<left>
	<input id='mybutton'    style=width:100px type=submit value=Input disabled=true  >
</left>
</form>

<script>

var c=5;
   fc();

   function fc(){

     if(c>0){

        document.getElementById('mybutton').value = 'Wait ' + c;
        c=c-1;
        setTimeout('fc()', 1000);
      } else {
        document.getElementById('mybutton').disabled = false;
        document.getElementById('mybutton').value = ' Input ';
     }

       }

</script> </table>");



$nick=$_POST["nick"];
$msg=$_POST["msg"];

$nick = strip_tags($nick);
$msg = strip_tags($msg);


if($msg=="Сообщение")
{
echo('<p>фигня</p>');
}
else
{
if(!empty($msg)&&!empty($nick))
{
if($msg2==1)
{
$msg = eregi_replace("[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*","" ,$msg);
$msg = eregi_replace("^http://([^ ,\r\n]*)","", $msg);
$msg = eregi_replace("([ \r\n])http://([^ ,\r\n]*)","",$msg);
$msg = eregi_replace("([ \r\n])www\\.([^ ,\r\n]*)","",$msg);
$msg = eregi_replace("^www\\.([^ ,\r\n]*)","",$msg);

fwrite($file_msg,("<font color=$colortime> ($date) <font color=$colornick><br> $nick: </font></font>$msg<br><hr>\r\n"));
fclose($file_msg);
}
else
{
$msg = eregi_replace("[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*","<a href=\"mailto:\\0\" target=_blank>\\0</a>",$msg);
$msg = eregi_replace("^http://([^ ,\r\n]*)","<a href='http://\\1' target=_blank>http://\\1</a>", $msg);
$msg = eregi_replace("([ \r\n])http://([^ ,\r\n]*)","\\1<a href='http://\\2' target=_blank>http://\\2</a>",$msg);
$msg = eregi_replace("([ \r\n])www\\.([^ ,\r\n]*)","\\1<a href='http://www.\\2'target=_blank>http://www.\\2</a>",$msg);
$msg = eregi_replace("^www\\.([^ ,\r\n]*)","<a href='http://www.\\1' target=_blank>http://www.\\1</a>",$msg);

fwrite($file_msg,("<font color=$colortime> ($date) <font color=$colornick><br> $nick: </font></font>$msg<br><hr>\r\n"));
fclose($file_msg);
}}}
echo($result);
?>
