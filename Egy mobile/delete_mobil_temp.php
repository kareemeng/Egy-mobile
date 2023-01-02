<?php 
require 'mobiles.php';

$ids = $_SERVER["QUERY_STRING"];
$id = explode("?", $ids); /////0->id mobil    1-> id category
$mobil = new mobiles();
$result = $mobil->delete_mobiles('mobiles_id',$id[0]);
header("location: adminhome2.php?$id[1]");
 ?>