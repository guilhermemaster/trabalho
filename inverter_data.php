
﻿
<?php
function troca_data($data){
	$str = $data;
	$arr1 = str_split($str);
	$aux=$arr1[0];
	$arr1[0]=$arr1[8];
	$arr1[8]=$aux;
	$aux=$arr1[1];
	$arr1[1]=$arr1[9];
	$arr1[9]=$aux;
	$aux=$arr1[2];
	$arr1[2]=$arr1[7];
	$arr1[7]=$aux;
	$aux=$arr1[3];
	$arr1[3]=$arr1[5];
	$arr1[5]=$aux;
	$aux=$arr1[4];
	$arr1[4]=$arr1[6];
	$arr1[6]=$aux;
	$aux=$arr1[5];
	$arr1[5]=$arr1[6];
	$arr1[6]=$aux;
	$aux=$arr1[6];
	$arr1[6]=$arr1[9];
	$arr1[9]=$aux;
	$aux=$arr1[6];
	$arr1[6]=$arr1[8];
	$arr1[8]=$aux;
	$aux=$arr1[7];
	$arr1[7]=$arr1[8];
	$arr1[8]=$aux;
	$segun = implode("", $arr1);
	//print $segun;
	return $segun;
}

?>