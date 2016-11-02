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

function authorize($page, $rolemenu, $page_key, $key, $include){
  if ($page == $page_key) {
    if (key_exists($key,$rolemenu))
      include $include;
    else
      include "./not-authorize.php";
  }
}
?>
