<?php

if (isset($_POST['submit']))
{

	require "../config.php";
	require "../common.php";

	try
	{
		$connection = new PDO($dsn, $username, $password, $options);

		$new_user = array(
			"firstname" => $_POST['firstname'],
			"lastname"  => $_POST['lastname'],
			"phone" => $_POST['phone'],
			"address"  => $_POST['address'],
			"email"     => $_POST['email'],
			"id_type" => $_POST['id_type'],
			"id_number" => $_POST['id_number'],
		);

		$sql = sprintf(
				"INSERT INTO %s (%s) values (%s)",
				"users",
				implode(", ", array_keys($new_user)),
				":" . implode(", :", array_keys($new_user))
		);

		$statement = $connection->prepare($sql);
		$statement->execute($new_user);
	}

	catch(PDOException $error)
	{
		echo $sql . "<br>" . $error->getMessage();
	}

}
?>

<?php require "templates/header.php"; ?>

<?php
if (isset($_POST['submit']) && $statement)
{ ?>
	<blockquote><?php echo $_POST['firstname']; ?> successfully added.</blockquote>
<?php
} ?>

<h2>Add a user</h2>

<form method="post">
	<label for="firstname">First Name</label>
	<input type="text" name="firstname" id="firstname">
	<br>
	<br>
	<label for="lastname">Last Name</label>
	<input type="text" name="lastname" id="lastname">
	<br>
	<br>
	<label for="phone">Phone</label>
	<input type="text" name="phone" id="phone">
	<br>
	<br>
	<label for="address">Address</label>
	<input type="text" name="address" id="address">
	<br>
	<br>
	<label for="email">Email Address</label>
	<input type="text" name="email" id="email">
	<br>
	<br>
	<label for="id_type">ID Type</label>
	<input type="text" name="id_type" id="id_type">
	<br>
	<br>
	<label for="id_number">ID Number</label>
	<input type="text" name="id_number" id="id_number">
	<br>
	<br>
	<input type="submit" name="submit" value="Submit">
</form>

<br>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>
