<?php
  include "data/db-connect.php";
  include "function/function.php";

  $rows = R::find('pkl',"GROUP BY lokasi");
  $col=array();
  $nilai1=array();
  $nilai2=array();
  foreach ($rows as $row) {
    $col[]='"'.$row->lokasi.'"';
    $hitung1=R::count('pkl',"lokasi='$row->lokasi' AND status='OJT'");
    $hitung2=R::count('pkl',"lokasi='$row->lokasi' AND status='PKL'");
    $nilai1[]=$hitung1;
    $nilai2[]=$hitung2;
  }
  $kol=implode(",",$col);
  $kol=substr($kol,1,-1);

  $val1=implode(",",$nilai1);
  $val2=implode(",",$nilai2);

  echo $kol;
  echo $val1;
  echo $val2;


?>
