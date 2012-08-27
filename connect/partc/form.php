<?php

define("USER_HOME_DIR", "/home/stud/s3338247"); // CHANGE HERE
require(USER_HOME_DIR . "/Smarty-3.1.11/libs/Smarty.class.php");
$smarty = new Smarty();
$smarty->template_dir = USER_HOME_DIR . "/Smarty-Work-Dir/templates";
$smarty->compile_dir = USER_HOME_DIR . "/Smarty-Work-Dir/templates_c";
$smarty->cache_dir = USER_HOME_DIR . "/Smarty-Work-Dir/cache";
$smarty->config_dir = USER_HOME_DIR . "/Smarty-Work-Dir/configs";

  require_once('db.php');
  $connection = mysql_connect(DB_HOST, DB_USER, DB_PW);
  mysql_select_db("winestore", $connection);
  $query = "SELECT region_name FROM region";
  $result = mysql_query($query, $connection);
  while ($row = mysql_fetch_row($result)) {

  $temp1[] = $row[0];
  }
$smarty->assign('arr1', $temp1);

  mysql_select_db("winestore", $connection);
  $query = "SELECT variety FROM grape_variety";
  $result = mysql_query($query, $connection);
  while ($row = mysql_fetch_array($result)) {
  
$temp2[] = $row[variety];

  }
$smarty->assign('arr2', $temp2);

  mysql_select_db("winestore", $connection);
  $query = "SELECT DISTINCT year FROM wine ORDER BY year ASC;";
  $result = mysql_query($query, $connection);
  while ($row = mysql_fetch_array($result)) {
  $temp3[] = $row[year];

  }
  $smarty->assign('arr3', $temp3);

  mysql_select_db("winestore", $connection);
  $query = "SELECT DISTINCT year FROM wine ORDER BY year DESC;";
  $result = mysql_query($query, $connection);

  while ($row = mysql_fetch_array($result)) {
  $temp4[] = $row[year];

  }
  $smarty->assign('arr4', $temp4);


$smarty->display('home.tpl');



?>




