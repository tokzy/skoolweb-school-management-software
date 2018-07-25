
<?php
function randstrgen($len){
$result = "";
$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ012345678900019abcdef";	
$chararray = str_split($chars);
for($i=0;$i<$len;$i++){
$randitem = array_rand($chararray);
$result .= "".$chararray[$randitem];	
}		
return $result;
}



     $rand = randstrgen(20);
	 echo $rand;












?>