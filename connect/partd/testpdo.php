<?php
  define('DB_HOST', 'yallara.cs.rmit.edu.au');
  define('DB_PORT', '51005'); // CHANGE THIS
  define('DB_NAME', 'winestore');
  define('DB_USER', 'root'); // CHANGE THIS
  define('DB_PW',   'wordpass'); // CHANGE THIS
    $db = new PDO(
      "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME,
      DB_USER,
      DB_PW
    );
    $query1 = "SELECT region_name FROM region";
    $query2 = "SELECT variety FROM grape_variety";
    $query3 = "SELECT DISTINCT year FROM wine ORDER BY year ASC;";
    $query4 = "SELECT DISTINCT year FROM wine ORDER BY year DESC;";



?>
