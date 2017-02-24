<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$age = mysqli_real_escape_string($mysqli, $_POST['age']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);	
	
	// checking empty fields
	if(empty($name) || empty($age) || empty($email)) {	
			
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($email)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$age = $res['age'];
	$email = $res['email'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php" class="go-back" src=""><img border="0" title="Go Back View All Data" alt="Go back" src="./image/back.png" width="60" height="50">&nbsp;&nbsp;Go Back</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0" class="add-data" width="25%">
			<tr> 
				<td>Name:</td>
				<td><input type="text" name="name" required value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Age:</td>
				<td><input type="text" name="age" required value="<?php echo $age;?>"></td>
			</tr>
			<tr> 
				<td>Email:</td>
				<td><input type="email" name="email" required value="<?php echo $email;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input class="add-new" type="submit" name="update" value="Update Data" placeholder="Update Data"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<style>
.add-new {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
	margin-top:10px;
}
table.add-data {
    color: #6ea435;
    font-size: 18px;
	font-weight:600;
}

input {
    padding: 5px;
    width: 100%;
}
</style>