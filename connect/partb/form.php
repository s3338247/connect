<?php
  require_once('db.php');
  $connection = mysql_connect(DB_HOST, DB_USER, DB_PW);

/*  require_once('db.php');

  // (1) Open the database connection
  $connection = mysql_connect(DB_HOST, DB_USER, DB_PW);
  mysql_select_db("winestore", $connection);

  // (2) Run the query on the winestore through the connection
  $query = "SELECT * FROM wine";
  $result = mysql_query($query, $connection);

  // Start the HTML body, and output preformatted text
  echo "<pre>\n";

  // (3) While there are still rows in the result set
  while ($row = mysql_fetch_row($result)) {
   for ($i = 0; $i < mysql_num_fields($result); $i++) {
      echo $row[$i] . " ";
   }
   // Print a carriage return to neaten the output
   echo "\n";
  }

  // Finish the HTML document
  echo "</pre>";

  // (4) Close the database connection
  mysql_close($connection);*/
?> 
<html>
<body>
<form action="query.php" method="GET">
<br>
<br>
<br>
Wine Name: <input type="text" name="wine" /><br><br>
Winery name: <input type="text" name="winery" /><br><br>
Region:
<?php
  mysql_select_db("winestore", $connection);
  $query = "SELECT region_name FROM region";
  $result = mysql_query($query, $connection);
  echo "<select name=region>";
  while ($row = mysql_fetch_row($result)) {
  for ($i = 0; $i < mysql_num_fields($result); $i++) {
  echo "<option value=". $row[$i] .">" . $row[$i] . "</option>";
   }
  }
echo "</select>";
?>
<br>
<br>
Grape Variety: 
<?php
  mysql_select_db("winestore", $connection);
  $query = "SELECT variety FROM grape_variety";
  $result = mysql_query($query, $connection);
  echo "<select name=variety>";
  while ($row = mysql_fetch_row($result)) {
  for ($i = 0; $i < mysql_num_fields($result); $i++) {
  echo "<option value=". $row[$i] .">" . $row[$i] . "</option>";
   }
  }
echo "</select>";
?>
<br>
<br>
Range of Years:
Lower Bound:
<?php
  mysql_select_db("winestore", $connection);
  $query = "SELECT DISTINCT year FROM wine ORDER BY year ASC;";
  $result = mysql_query($query, $connection);
  echo "<select name=lower>";
  while ($row = mysql_fetch_row($result)) {
  for ($i = 0; $i < mysql_num_fields($result); $i++) {
  echo "<option value=". $row[$i] .">" . $row[$i] . "</option>";
   }
  }
echo "</select>";
?>
Upper Bound:
<?php
  mysql_select_db("winestore", $connection);
  $query = "SELECT DISTINCT year FROM wine ORDER BY year DESC;";
  $result = mysql_query($query, $connection);
  echo "<select name=upper>";
  while ($row = mysql_fetch_row($result)) {
  for ($i = 0; $i < mysql_num_fields($result); $i++) {
  echo "<option value=". $row[$i] .">" . $row[$i] . "</option>";
   }
  }
echo "</select>";
?>

<br>
<br>
Minimum Number of Wines in Stock: <input type="text" name="wstock" /><br><br>
Minimum Number of Wines Ordered: <input type="text" name="wordered" /><br><br>
Dollar Cost Range: Minimum Cost: <input type="text" name="min" />  Maximum Cost: <input type="text" name="max" /><br><br>
<input type="submit" value="Search" />
</form>
</body>
</html>




