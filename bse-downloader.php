<font size="4"><b>BSE KEMENDIKBUD - SIMPLE GET DOWNLOAD</b> (Dibuat oleh <a href="https://github.com/AlHikamWolf/bse_downloader" target="_blank">AlHikamWolf</a>)</font><br>
<form method='post'>
<textarea name='sites' cols='100' rows='3'></textarea><br><input type='submit' name='go' value=' OK '>
</form>
<?php 

function findit($mytext,$starttag,$endtag) {
 $posLeft  = stripos($mytext,$starttag)+strlen($starttag);
 $posRight = stripos($mytext,$endtag,$posLeft+1);
 return  substr($mytext,$posLeft,$posRight-$posLeft);
}
error_reporting(0);
set_time_limit(0);
$ya=$_POST['go'];
$co=$_POST['sites'];

if($ya){
 $e=explode("\r\n",$co);
 foreach($e as $uri){
	//echo '<br>'.$uri;
	$file=@file_get_contents($uri);
	if(eregi('docs.google.com',$file) ){
	echo "<b>Nama</b>: ".findit($file,'class="text-primary">',"</span>")."</b><br>";
	echo '<b>Download</b>: <a href="'.findit($file,"gview?url=","&embedded").'" target="_blank">'.findit($file,"gview?url=","&embedded").'</a><br><br>';
}else{
	echo "FAILED -_-";}
} 
}

?>