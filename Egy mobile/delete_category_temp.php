<?php 
require 'categories.php';
$id = $_SERVER["QUERY_STRING"];
$category = new categories();
$result = $category->delete_category('category_id',$id);
header("location: adminhome.php");
 ?>