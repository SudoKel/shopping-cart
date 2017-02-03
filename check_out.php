<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>A Small Shopping Site - Check Out</title>
		<style>
			body{
				background: #F2F2F2;
				font-family: arial, serif;
			}
			th{
				color: #fff;
				background: #0179ff;
				text-align: left;
				padding: 10px;
			}
			td{
				background: #bfdff6;
				text-align: justify;
				padding: 10px;
				vertical-align: top;
			}
			.header{
				text-align: center;
				color: #0179ff;
			}
			.link{
				font-size: 1.2em;
				margin-left: 44%;
				background: #0179ff;
				padding: 10px 20px 10px 20px;
				text-align: center;
				text-decoration: none;
				color: #fff;
				-webkit-border-radius: 30;
				-moz-border-radius: 30;
				border-radius: 30px;
			}
			.link:hover{
				background: #489eff;
		</style>
	</head>

	<body>
		<h1 class="header">Check Out</h1>

		<?php
			echo "<table width=\"500px\" align=\"center\">";
			echo "<tr>";
			echo "<th>Item</th>";
			echo "<th>Quantity</th>";
			echo "<th>Price</th>";
			echo "<th>Amount</th>";
			echo "</tr>";

			while(list($key,$value) = each($_SESSION))
			{
				list($title,$price,$qty) = $value;
				$amount = $price * $qty;
				
				echo "<tr>";
				echo "<td>$title</td>";
				echo "<td>$qty</td>";
				echo "<td>\$$price</td>";
				echo "<td>\$$amount</td>";
				echo "</tr>";
			}

			echo "</table>";

			session_destroy();
		?>
		<br /><br /><br />
		<a href="index.php" class="link">Back to Home</a>
	</body>
</html>