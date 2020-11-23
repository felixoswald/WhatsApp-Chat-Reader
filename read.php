<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
	/*
	WhatsApp-Chat-Reader
	Version 1.2
	© 23.11.2020 https://github.com/felixoswald
	*/

	// Chat-Config ---------------------------------
	$file = 'test.txt';
	$leftname  = 'user1';
	$rightname = 'user2';
	// ---------------------------------------------
?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>WhatsApp-Chat-Reader</title>
		<style>
			html {
				font-family: 'Helvetica', 'Arial', sans-serif;
				font-weight: 500;
				background-color: #090e11;
				height: 100%;
				background-position: bottom;
				background-repeat: no-repeat;
				background-size: cover;
				background-attachment: fixed;
				max-width: 700px;
				float: center;
				margin: auto;
				padding: 5px;
			}
			p {
				font-size: 13pt;
				width: 70%;
				max-width: 400px;
				border: 0px;
				border-radius: 5px;
				padding: 5px 10px;
				margin: 5px;
			}
			.right {
				right: 0px;
				text-align: right;
				background-color: #054740;
				color: white;
				float: right;
			}
			.left {
				text-align: left;
				background-color: #262d31;
				color: white;
				left: 0px;
				float: left;
			}
			.hidden {
				display: none;
			}
		</style>
	</head>
	<body>
		<?php
			$myfile = fopen($file, "r") or die("Unable to open file!");
			echo "<p>". preg_replace("/([0-9][0-9].[0-9][0-9].[0-9][0-9], [0-9][0-9]:[0-9][0-9] - )/", "</p><p class='hidden'>",
						preg_replace("/([0-9][0-9].[0-9][0-9].[0-9][0-9], [0-9][0-9]:[0-9][0-9] - ".$leftname.":)/", "</p><p class='left'>",
						preg_replace("/([0-9][0-9].[0-9][0-9].[0-9][0-9], [0-9][0-9]:[0-9][0-9] - ".$rightname.":)/", "</p><p class='right'>",
						str_replace("\r\n", "<br>", fread($myfile,filesize($file))))));
			fclose($myfile);

		?>
	</body>
</html>
