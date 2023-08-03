<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>people data</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<?php
	if (file_exists('data.json')) {
		$filename = "data.json";
		$data = file_get_contents($filename); //data read from json file;
		$users = json_decode($data); //decode a data
	} else {
		echo "<script type='text/javascript'>alert('File does not Exist');</script>";
	} ?>
	<div class="container my-5">
		<div class="row ">
			<form method="post">
				<span class="title"> PEOPLE DATA</span>
				<?php
				$length = 1;
				if (isset($_POST["button1"])) {
					if (sizeof($users) >= $_POST["button1"] + 1) {
						$length = $_POST["button1"] + 1;
					} else {
						$length = $_POST["button1"];
						echo "<script type='text/javascript'>alert('No more people!');</script>";
					}
				}
				echo '<button type="submit" class="btn float-right" id="update" name="button1" value=' . $length . ' >NEXT PERSON</button>';
				?>
			</form>
		</div>
		<?php
		for ($counter = 0; $counter < $length; $counter++) { ?>
			<div class="tablerounededCorner">
				<table class="table table-bordered table-striped roundedTable">
					<tbody>
						<tr>
							<td rowspan='2' class="counter"><?= $counter + 1 ?></td>
							<td class="item1"><span> Name: </span><?= $users[$counter]->name ?></td>
						</tr>
						<tr>
							<td class="item2"><span> Location: </span><?= $users[$counter]->location ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		<?php } ?>
		<span class="d-flex justify-content-center align-items-center footer"> CURRENTLY <?= $length ?> PEOPLE SHOWING </span>
	</div>
</body>
<script type="text/javascript">
	function jsFunction() {
		alert('Execute Javascript Function Through PHP');
	}
</script>

</html>