<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0"/ />

  <title>Fake stock market for fake companies</title>
  <link rel="stylesheet" type="text/css" href="../css/market.css"/>
</head>

<body>

<div id="stocks">
	<div id="grid"></div>
</div>
		<form action="market.php" method="post" enctype="multipart/form-data">
		<input placeholder="Password" name="password" type="password" autofocus>
		<input name="submit" type="submit" value="Clock In">
		</form>
	<?php
	session_start();
	include_once("db2.php");
	require_once("nbbc/nbbc.php");
	date_default_timezone_set('America/Chicago');
	
	$sql = "SELECT * FROM companies ORDER BY id DESC";
	$sql2 = "SELECT * FROM aitrading";
	
	$res = mysqli_query($db, $sql) or die(mysqli_error());
	$res2 = mysqli_query($db, $sql2) or die(mysqli_error());
	
	$row2 = mysqli_fetch_assoc($res2);

	
	$posts = "";
		global $sql, $db, $sql2, $res2, $res, $row, $row2, $lastAI;
		$lastAI_time = $row2['last_AI'];
		$lastAI = strtotime($lastAI_time);
		$now = time();
		$i = $now - $lastAI;

	
	if(mysqli_num_rows($res) > 0) {

		while($row = mysqli_fetch_assoc($res)) {
			$last_updated_time = $row['last_updated'];
			$last_updated_time = strtotime($last_updated_time);
			$last_updated = date( 'M-d, g:ia', $last_updated_time);
			$id = $row['id'];
			$symbol = $row['symbol'];
			$name = $row['name'];
			$price = round($row['price'],2);
			$company_value = $row['company_value'];


			$lastAI = $row2['last_AI'];
			$lastAI = strtotime($lastAI_time);
				if ($i > 900) {
				$lastAI = $row2['last_AI'];
				$lastAI = strtotime($lastAI);
					while ($i > 900) {
						
						$rand = mt_rand(-150,150);
						$rand2 = mt_rand(0,2);
						$rand3 = mt_rand(1,10);
						
						$oldPrice = $row['price'];
						$companyValue = $row['company_value'];
						$maxShares = $companyValue / $price;

						$newPrice = round($oldPrice + (($rand/$companyValue) * ($rand2 / $rand3) * 3),6);
						$newCompanyValue = $maxShares * $newPrice;
						$i -= 900;
					}
					$i = $now - $lastAI;

					mysqli_query($db, "UPDATE companies SET price='$newPrice', company_value='$newCompanyValue' WHERE id = $id LIMIT 1; ");
		$lastAI = floor(time() / (15 * 60)) * (15 * 60);
		$lastAI = date('Y-m-d H:i:s', $lastAI);

					mysqli_query($db, "UPDATE companies SET last_updated='$lastAI'; ");
					$last_updated = floor(time() / (15 * 60)) * (15 * 60);
					$last_updated = date( 'M-d, g:ia', $last_updated);
				}


				if(isset($_SESSION['broker']) && $_SESSION['broker'] == 1) {
				$broker = "<td class='trade'><form action='trade.php?pid=$id' method='post'><input type='number' placeholder='trade' name='trade'><input name='tradesubmit' type='submit' value='Trade'></form></td>";
					if(isset($_POST['trade'])) {
					$bbcode = new BBCode;
					$trade = strip_tags($_POST['trade']);
					
					$trade = stripslashes($trade);
					}
				} else {
					$broker = "";
				}

		$lastAI = floor(time() / (15 * 60)) * (15 * 60);
		$lastAI = date('Y-m-d H:i:s', $lastAI);
		$lastAI = strtotime($lastAI);
		$lastAI = date('Y-m-d H:i:s', $lastAI);
		mysqli_query($db, "UPDATE aitrading SET last_AI='$lastAI'; ");

			$posts .= "<tr class='company'><td class='symbol'>$symbol</td><td class='name'>$name</td><td class='price'>$price</td><td class='lastUpdated'> $last_updated</td>$broker</tr>";
			
		}
	$lastAI = floor(time() / (15 * 60)) * (15 * 60);
	$lastAI = date('M-d, g:ia', $lastAI);

	echo "<p id='robots'>Robots last traded at $lastAI</p>";
	echo "<table id='table'>$posts</table>";
	} else {
		echo "<div class='ticker'>There are no stocks to display! $postblog</div>";
	}
	if(isset($_POST['password'])) {
	$bbcode = new BBCode;
	$password = strip_tags($_POST['password']);
	
	$password = stripslashes($password);

	if($password == '123') {
			$_SESSION['broker'] = 1;
		header("Location: /market.php");
		} else {
		echo "<p id='form-error'>Wrong code!</p>";
		}
	}

?>
<script src="../js2/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../js2/index.js" type="text/javascript"></script>
</body>
</html>