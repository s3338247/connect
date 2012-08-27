<?php

define("USER_HOME_DIR", "/home/stud/s3338247"); // CHANGE HERE
require(USER_HOME_DIR . "/Smarty-3.1.11/libs/Smarty.class.php");
$smarty = new Smarty();
include 'testpdo.php';
$smarty->template_dir = USER_HOME_DIR . "/Smarty-Work-Dir/templates";
$smarty->compile_dir = USER_HOME_DIR . "/Smarty-Work-Dir/templates_c";
$smarty->cache_dir = USER_HOME_DIR . "/Smarty-Work-Dir/cache";
$smarty->config_dir = USER_HOME_DIR . "/Smarty-Work-Dir/configs";


foreach ($db->query($query1) as $row) 
 {
  $temp1[] = $row[0];
  }
$smarty->assign('arr1', $temp1);



foreach ($db->query($query2) as $row)  
 {
  
$temp2[] = $row[variety];

  }
$smarty->assign('arr2', $temp2);

  foreach ($db->query($query3) as $row) {
  $temp3[] = $row[year];

  }
  $smarty->assign('arr3', $temp3);

  foreach ($db->query($query4) as $row)  {
  $temp4[] = $row[year];

  }
  $smarty->assign('arr4', $temp4);


$smarty->display('home.tpl');

$db = null; 

?>




