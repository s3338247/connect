<html> 
<title> RESULTS</title> 
<body> <table border='1'>
    <tr>
      <th>Wine Name</th>
      <th>Grape Variety</th>
      <th>Year</th>
      <th>Winery</th>
      <th>Region</th>
      <th>Cost</th>
      <th>Bottles At Any Price</th>
      <th>Total Stock Sold</th>
      <th>Total Sales Revenue</th>
    </tr>
    {foreach from=$array item=f}
    <tr>
    <td>{$f[0]}</td>
    <td>{$f[1]}</td>
    <td>{$f[2]}</td>
    <td>{$f[3]}</td>
    <td>{$f[4]}</td>
    <td>{$f[5]}</td>
    <td>{$f[6]}</td>
    <td>{$f[7]}</td>
    <td>{$f[8]}</td>
   
    </tr>
     {/foreach}
     
     </table> </body>
</html>
