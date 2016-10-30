<?php

while (list($key,$val)=each($_GET)){
  ${'get_'.$key}=$val;
}
while (list($key,$val)=each($_POST)){
  ${'post_'.$key}=$val;
}

function redirect($url){
	header('location:'.$url);
}
?>
