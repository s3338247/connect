<?php
  {
  require_once('db.php');
  $connection = mysql_connect(DB_HOST, DB_USER, DB_PW);
  mysql_select_db("winestore", $connection);
  $wine = $_GET['wine'];
  $region = $_GET['region'];
  $variety = $_GET['variety'];
  $lower = $_GET['lower'];
  $upper = $_GET['upper'];
  $wstock = $_GET['wstock'];
  $wordered = $_GET['wordered'];
  $min = $_GET['min'];
  $max = $_GET['max'];


  $query = "SELECT wine_name,variety,year,winery_name,region_name,cost,price,SUM(qty),qty*price 
  FROM wine JOIN winery ON wine.winery_id = winery.winery_id  
  JOIN region ON region.region_id = winery.region_id 
  JOIN wine_variety ON wine_variety.wine_id = wine.wine_id 
  JOIN grape_variety ON grape_variety.variety_id = wine_variety.variety_id 
  JOIN inventory ON inventory.wine_id = wine.wine_id 
  JOIN items ON items.wine_id = wine.wine_id 
  WHERE winery.region_id = region.region_id
  AND wine.winery_id = winery.winery_id";
 
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

    echo "<table border = '2'>
    <tr>
    <th>Wine Name</th>
    <th>Grape variety</th>
    <th>Year</th>
    <th>Winery</th>
    <th>Region</th>
    <th>Cost</th>
    <th>Bottles At Any Price</th>
    <th>Total Stock Sold</th>
    <th>Total Sales Revenue</th>
 
    </tr>";
    $result = mysql_query($query, $connection);
    while ($row = mysql_fetch_array($result))
   {
      echo "<tr>";
      echo "<td>" . $row['wine_name'] . "</td>";
      echo "<td>" . $row['variety'] . "</td>";
      echo "<td>" . $row['year'] . "</td>";
      echo "<td>" . $row['winery_name'] . "</td>";
      echo "<td>" . $row['region_name'] . "</td>";
      echo "<td>" . $row['cost'] . "</td>";
      echo "<td>" . $row['price'] . "</td>";
      echo "<td>" . $row['SUM(qty)'] . "</td>";
      echo "<td>" . $row['qty*price'] . "</td>";
   }
   }
?>

