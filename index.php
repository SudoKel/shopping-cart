<?php
	session_start();

	if(!empty($_GET))
	{
		$title = $_GET["title"];
		$price = $_GET["price"];
		$qty   = $_GET["qty"];

		if(strcmp($title,"Web Applications") == 0)
			$_SESSION["item1"] = array($title, $price, $qty);
		if(strcmp($title,"JavaScript") == 0)
			$_SESSION["item2"] = array($title, $price, $qty);
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>A Small Shopping Site - Home</title>
		<style>
			body{
				background: #F2F2F2;
				font-family: arial, serif;
			}
			td{
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
				margin-left: 45%;
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
			}
		</style>
	</head>

	<body>
		<h1 class="header">Small Shopping Site</h1>
		
		<table width="800px" align="center">
			<tr>
				<td width="150px"><b>Title</b></td>
				<td width="270px"><b>Description</b></td>
				<td width="72px"><b>Price</b></td>
				<td width="75px"><b>Qty</b></td>
				<td width="150px"></td>
			</tr>
		</table>

		<?php
			$books = array(
				"Web Applications"=>array(95=>"This book provides an in-depth examination of the basic concepts and general principles associated with Web application development."),
				"JavaScript"=>array(130=>"This is both an example-driven programmers guide and a keep-on-your-desk reference, with new chapters that explain everything you need to know to get the most out of JavaScript."));

			reset($books);

			while(list($title,$info) = each($books))
			{
				list($price,$desc) = each($info);
				echo "<form method=\"GET\" action=\"index.php\">";
				echo "<input type=\"hidden\" name=\"price\" value=\"$price\" />";
				echo "<input type=\"hidden\" name=\"title\" value=\"$title\" />";
				echo "<table width=\"800px\" align=\"center\">";
				echo "<tr>";
				echo "<td width=\"150px\">$title</td>";
				echo "<td width=\"300px\">$desc</td>";
				echo "<td width=\"80px\">\$$price</td>";
				echo "<td width=\"80px\"><input type=\"number\" name=\"qty\" min=\"0\" max=\"100\" step=\"1\" value=\"0\" style=\"width: 40px\" /></td>";
				echo "<td width=\"150px\"><input type=\"submit\" value=\"Add to Cart\" /></td>";
				echo "</tr>";
				echo "</table>";
				echo "</form>";
				echo "<br />";
			}
		?>
		<br />
		<a href="check_out.php" class="link">Check Out</a>
	</body>
</html>