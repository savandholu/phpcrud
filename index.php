<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>CRUD Simple PHP Master</title>
</head>

<body>
<br>
<h1 style="text-align:center"> CRUD Simple PHP Master Operation </h1>
<div class="container_hole">
<a href="add.html"><img border="0" title="Add New Data" alt="Go back" src="./image/add.jpg" width="70" height="70">&nbsp;&nbsp;Add New Data</a><br/><br/>

	<table width='80%' border=0 style="text-align:center">

	<tr class="head-tr">
		<td>Name</td>
		<td>Age</td>
		<td>Email</td>
		<td>Update/Delete</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr class='data-tr'>";
		echo "<td>".$res['name']."</td>";
		echo "<td>".$res['age']."</td>";
		echo "<td>".$res['email']."</td>";	
		echo "<td class='edit-update'><a href=\"edit.php?id=$res[id]\" title='Edit Record'>Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete this record ?')\" title='Delete Record'>Delete</a></td>";		
	}
	?>
	</table>
	</div>
	<p>&copy; 2017 Savan Patel<p>
</body>
</html>
<style>
.head-tr{
	background-color: #4CAF50;
    color: #fff;
	font-size: 20px;
    font-weight: 600;
	height:30px;
}
.edit-update a{
    background-color: #4CAF50;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
}
.edit-update a:hover, .edit-update a:active {
    background-color: red;
}
.data-tr > td{
	border-bottom:1px solid #ddd;
	padding:11px 0 10px;
}
</style>
