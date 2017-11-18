<?php

if (isset($_POST['submit']))
{

	try
	{

		require "../config.php";
		require "../common.php";

		$connection = new PDO($dsn, $username, $password, $options);

		$sql = "UPDATE users SET lastname = :newlastname WHERE firstname = :firstname";

		$firstname = $_POST['firstname'];
    $newlastname = $_POST['newlastname'];

		$statement = $connection->prepare($sql);
    $statement->bindParam(':newlastname', $newlastname, PDO::PARAM_STR);
    $statement->bindParam(':firstname', $firstname, PDO::PARAM_STR);
		$statement->execute();

	}

	catch(PDOException $error)
	{
		echo $sql . "<br>" . $error->getMessage();
	}
}
?>
<?php require "templates/header.php"; ?>
<?php
if (isset($_POST['submit']))
{ ?>
		<h2>Last name updated</h2>
  	<?php
}?>
<h2>Update user's last name based on First Name</h2>

<form method="post">
	<label for="firstname">First Name</label>
  <input type="text" id="firstname" name="firstname">
  <br>
  <br>
  <label for="newlastname">Last Name</label>
	<input type="text" id="newlastname" name="newlastname">
  <br>
	<input type="submit" name="submit" value="View Results">
</form>
<br>
<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
