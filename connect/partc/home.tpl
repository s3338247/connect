<html>
<body>
<form action="query.php" method="GET">
<br>
<br>
<br>
Wine Name: <input type="text" name="wine" /><br><br>
Winery name: <input type="text" name="winery" /><br><br>
Region:
<select name=region>

{foreach from=$arr1 item=foo1}
<option>
{$foo1}
</option>
{/foreach}

</select>


<br>
<br>
Grape Variety:
<select name=variety>

{foreach from=$arr2 item=foo2}
<option>
{$foo2}
</option>

{/foreach}
</select>




<br>
<br>
Range of Years:
Lower Bound:
<select name=lower>
{foreach from=$arr3 item=foo3}
<option>
{$foo3}
</option>
{/foreach}

</select>

Upper Bound:
<select name=upper>
{foreach from=$arr4 item=foo4}
<option>
{$foo4}
</option>
{/foreach}
</select>




<br>
<br>
Minimum Number of Wines in Stock: <input type="text" name="wstock" /><br><br>
Minimum Number of Wines Ordered: <input type="text" name="wordered" /><br><br>
Dollar Cost Range: Minimum Cost: <input type="text" name="min" />  
Maximum Cost: <input type="text" name="max" /><br><br>
<input type="submit" value="Search" />
</form>
</body>
</html>

