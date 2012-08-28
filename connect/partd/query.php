<?php
  define("USER_HOME_DIR", "/home/stud/s3338247"); // CHANGE HERE
  require(USER_HOME_DIR . "/Smarty-3.1.11/libs/Smarty.class.php");
  include 'testpdo.php';
  $smarty = new Smarty();
  $smarty->template_dir = USER_HOME_DIR . "/Smarty-Work-Dir/templates";
  $smarty->compile_dir = USER_HOME_DIR . "/Smarty-Work-Dir/templates_c";
  $smarty->cache_dir = USER_HOME_DIR . "/Smarty-Work-Dir/cache";
  $smarty->config_dir = USER_HOME_DIR . "/Smarty-Work-Dir/configs";
  $wine = $_GET['wine'];
  $region = $_GET['region'];
  $variety = $_GET['variety'];
  $lower = $_GET['lower'];
  $upper = $_GET['upper'];
  $wstock = $_GET['wstock'];
  $wordered = $_GET['wordered'];
  $min = $_GET['min'];
  $max = $_GET['max'];   
  $query= "SELECT DISTINCT wine_name,variety,year,winery_name,region_name,cost,on_hand,SUM(qty),qty*price FROM wine JOIN winery ON 
  wine.winery_id = winery.winery_id JOIN region ON region.region_id = winery.region_id JOIN wine_variety ON wine_variety.wine_id = wine.wine_id JOIN grape_variety 
  ON grape_variety.variety_id = wine_variety.variety_id JOIN inventory ON inventory.wine_id = wine.wine_id JOIN items ON items.wine_id = wine.wine_id WHERE 
  winery.region_id = region.region_id AND wine.winery_id = winery.winery_id";

if($lower>=$upper)
     {
       echo "invalid year";
     }
if($min>$max)
     {
       echo "Invaid Dollar Cost Range";
     }

else{
$i=0;

if (isset($wine) && $wine !="") {
   $query .= " AND wine_name = '{$wine}'";
   }
if (isset($region) && $region != "All" && $region !="") {
   $query .= " AND region_name = '{$region}'";
    }
if (isset($variety)) {
   $query .= " AND variety = '{$variety}'";
    }
if (isset($lower) && isset($upper)) {
   $query .= " AND year BETWEEN '{$lower}' AND '{$upper}'";
    }
if (isset($wstock) && $wstock !="") {
   $query .= " AND on_hand >= '{$wstock}'";
    }
if (isset($min) && isset($max))  {
   $query .= " AND cost BETWEEN '{$min}' AND '{$max}'";
    }
if (isset($wordered) && $wordered !="") {
    $query .= " AND qty >= '{$wordered}'";
    } 

$query .= " GROUP BY wine_name HAVING SUM(qty) >= '$wordered'" ;

foreach ($db->query($query) as $row)
{
$temp[] = $row;
$i++;
}
$smarty->assign('array', $temp);
}
$smarty->display('home2.tpl');
?>






